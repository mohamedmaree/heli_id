<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Settlement;
use App\Models\User;

class TransactionService {

//  use NotifyTrait;
  public $onlinePayResponse = null;
  public $superAdmin;

  //todo: make order relation in model
  //todo: think about db transaction if need here or in controller
  //todo: make order model pay consts

  public function __construct() {
    # to use super admin wallet
    $this->superAdmin = Admin::find(1);
  }

  public function addToWalletOnlineSuccess($transactionable, $onlinePayResponse) {
    $type                    = 'addOnlineBalance';
    $amount                  = $onlinePayResponse['amount'];
    $this->onlinePayResponse = $onlinePayResponse;

    # record in super admin wallet
    $this->addToWallet($this->superAdmin, $amount, $type);

    # transfer from supert admin to $transactionable wallet
    $this->cutFromWallet($this->superAdmin, $amount, $type);
    $this->addToWallet($transactionable, $amount, $type);
  }

  public function adminAddtoUserWallet($transactionable, $amount) {
    $type                    = 'ReceiveBalanceFromAdmin';
    # transfer from supert admin to $transactionable wallet
    $this->cutFromWallet($this->superAdmin, $amount, $type);
    $this->addToWallet($transactionable, $amount, $type);
  }

  public function adminCutFromUserWallet($transactionable, $amount) {
    $type                    = 'CutBalanceByadmin';
    # transfer from supert admin to $transactionable wallet
    $this->cutFromWallet($transactionable, $amount, $type);
    $this->addToWallet($this->superAdmin, $amount, $type);
  }
  
  public function onlineOrderPaySuccess($order) {
    /**
     * with success pay
     * paid money with admin now - so put in admin wallet
     * with finish order transfer money to provider wallet and cut commission
     */

    $type = 'newOnlineOrderPaySuccess';

    # record getting money in admin wallet
    $this->addToWallet($this->superAdmin, $order->final_total, $type, $order);

    # update order
    //$order->update(['pay_type' => Order::PAY_TYPE_ONLINE, 'pay_status' => Order::PAY_STATUS_DONE]);

  }

  public function walletOrderPaySuccess($order) {
    /**
     * with success pay
     * cut money from user wallet
     * add money to admin wallet
     * with finish order transfer money to provider wallet and cut commission
     */

    $user = $order->user;
    $type = 'newWalletOrderPaySuccess';

    # cut from user wallet
    $this->cutFromWallet($user, $order->final_total, $type, $order);

    # record getting money in admin wallet untill finish order
    $this->addToWallet($this->superAdmin, $order->final_total, $type, $order);

    # update order
    //$order->update(['pay_type' => Order::PAY_TYPE_WALLET, 'pay_status' => Order::PAY_STATUS_DONE]);
  }

  public function finishOrder($order) {

    /**
     * convert money from admin wallet to provider wallet then cut app commission (online, wallet)
     * if pay type cash update pay status to done and cut commission only from wallet (cash)
     * check if there award for first order for referal code and who will win in both or one
     * if order coupon from admin cut coupon amount from admin wallet
     */

    $amountPaid      = $order->final_total;
    $orderCommission = $order->admin_commission;
    $type            = 'finishOrder';

    if ($amountPaid <= 0) {
      return false;
    }

    $provider = $order->provider;

    if (in_array($order->pay_type, [Order::PAY_TYPE_ONLINE, Order::PAY_TYPE_WALLET])
      && Order::PAY_STATUS_DONE == $order->pay_status) {

      $this->cutFromWallet($this->superAdmin, $amountPaid, $type, $order);
      $this->addToWallet($provider, $amountPaid, $type, $order);
      $this->cutFromWallet($provider, $orderCommission, $type, $order);
      $this->addToWallet($this->superAdmin, $orderCommission, $type, $order);

    } else if (Order::PAY_TYPE_CASH == $order->pay_type) {

      $this->cutFromWallet($provider, $orderCommission, $type, $order);
      $order->update(['pay_status' => Order::PAY_STATUS_DONE]);
    }

    # calc invite reward if there invite code and not used before
    $user = $order->user;
    if ($user->invite_code && !$user->invite_code_used) {

      // $giftAmount = settings('promo_disc') ?? 0;
      // if ($giftAmount <= 0) {
      //   $user->update(['invite_code_used' => true]);
      //   return false;
      // }

      //$enviteeUser = $this->userRepo->getUserByReferenceCode($user->invite_code);
      //$type        = 'promoCodeGift';

      // todo: add expire time
      // todo: where money come from credit side -> cut from admin
      //todo: cut gift from admin wallet as marketing expense

      // $giftRecipient = settings('promo_beneficiary');
      // switch ($giftRecipient) {
      // case 'invitee':
      //   $this->addToWallet($enviteeUser, $giftAmount, $type, $order);
      //   $this->cutFromWallet($this->superAdmin, $giftAmount, $type, $order);
      //   break;
      // case 'invited':
      //   $this->addToWallet($user, $giftAmount, $type, $order);
      //   $this->cutFromWallet($this->superAdmin, $giftAmount, $type, $order);
      //   break;
      // case 'both':
      //   $this->addToWallet($enviteeUser, $giftAmount, $type, $order->id);
      //   $this->addToWallet($user, $giftAmount, $type, $order->id);
      //   $this->cutFromWallet($this->superAdmin, $giftAmount * 2, $type, $order);
      //   break;
      // }

      // $user->update(['invite_code_used' => true]);
    }

  }

  public function refuseOrderSuccess($order) {
    /**
     * if paid money convert to user wallet from admin wallet
     */

    // $user       = $order->user;
    // $amountPaid = $order->final_total;
    // $type       = 'providerRefuseCancelOrder';

    // if ($amountPaid > 0 && Order::PAY_STATUS_PAID) {
    //   $this->cutFromWallet($this->superAdmin, $amountPaid, $type, $order);
    //   $this->addToWallet($user, $amountPaid, $type, $order);
    //   $order->update(['pay_status' => Order::PAY_STATUS_RETURNED]);
    // }

  }

  public function cancelOrderSuccess($order) {
    /**
     * if paid money convert to user wallet from admin wallet
     */

    // $user       = $order->user;
    // $amountPaid = $order->final_total;
    // $type       = 'userCancelOrder';

    // if ($amountPaid > 0 && Order::PAY_STATUS_PAID) {
    //   $this->cutFromWallet($this->superAdmin, $amountPaid, $type, $order);
    //   $this->addToWallet($user, $amountPaid, $type, $order);
    //   $order->update(['pay_status' => Order::PAY_STATUS_RETURNED]);
    // }

  }

    public function AcceptWithdraw($withdraw) {
        /**
         * decrease provider wallet with money given to him
         */

        $this->cutFromWallet($withdraw->transactionable, $withdraw->amount, 'cutWithdrawFromProvider',$withdraw);
    }

  public function cutFromWallet(
    Admin | User $transactionable,
    $amount,
    $type,
    Order | Settlement | null $forable = null
  ): void {

    $transactionable->transactions()->create([
      'dept'         => abs($amount),
      'type'         => $type,
      'forable_id'   => ($forable->id)??null,
      'forable_type' => ($forable)? \get_class($forable) : null,
    ]);

    $this->updateBalance($transactionable);
    //$this->sendNotify($transactionable, 'cutFromWallet', $amount, $order_id);
  }

  public function addToWallet(
    Admin | User $transactionable,
    $amount,
    $type,
    Order | null $forable = null
  ): void {
    $transactionable->transactions()->create([
      'credit'       => abs($amount),
      'type'         => $type,
      'forable_id'   => ($forable->id)??null,
      'forable_type' => ($forable)? \get_class($forable) : null,
      'pay_data'     => $this->onlinePayResponse? $this->onlinePayResponse : null,
    ]);

    $this->updateBalance($transactionable);
    //$this->sendNotify($transactionable, 'addToWallet', $amount, $order_id);
  }

  public function updateBalance($transactionable): void {
    $dept   = $transactionable->transactions()->sum('dept');
    $credit = $transactionable->transactions()->sum('credit');
    $transactionable->update(['wallet_balance' => $credit - $dept]);
    $transactionable->refresh();
  }
}