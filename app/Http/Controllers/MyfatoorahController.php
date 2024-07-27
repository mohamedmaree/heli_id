<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Myfatoorah\PaymentMyfatoorahApiV2;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class MyfatoorahController extends Controller {
  use ResponseTrait;

  /*
  Route::get('myfatoorah/{type}', 'MyfatoorahController@myfatoorah');
  Route::get('transaction', 'MyfatoorahController@transaction');
  Route::get('fail-transaction', 'MyfatoorahController@failTransaction');
   */

  //live token will take from the client account and the testMode will be false
  private $token    = 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL';
  private $testMode = true;

  public function myfatoorah($type) {

    if ('user' == $type) {
      $priceDouble = 1; //the price the customer will pay
    } elseif ('prduct' == $type) {
      $priceDouble = 2; //the price the customer will pay
    }

    $pay = (new PaymentMyfatoorahApiV2($this->token, $this->testMode));

    $postFields = [
      'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
      'InvoiceValue'     => $priceDouble, //the price the customer will pay
      'CustomerName' => auth()->user()->name,
      'DisplayCurrencyIso' => 'SAR',
      'MobileCountryCode'  => '+966',
      'CustomerMobile'     => ltrim(auth()->user()->phone, '0'),
      'CallBackUrl'        => route('transaction'), //the route that will be redirected to in the success
      'ErrorUrl'         => route('fail_transaction'), //the route that will be redirected to in the fail
      'Language'     => 'ar',
      'CustomerReference'  => auth()->id(), // the refrence to the customer and wil be returned in the respone of the success
      'UserDefinedField' => $type, //(optional) extra key and wil be returned in the respone of the succes
    ];

    $data = $pay->getInvoiceURL($postFields);
    return redirect($data['invoiceURL']);
  }

  public function transaction() {
    $pay             = (new PaymentMyfatoorahApiV2($this->token, $this->testMode));
    $responseData    = $pay->getPaymentStatus(request('paymentId'), 'PaymentId');
    $responseDataArr = json_decode(json_encode($responseData), true);

    if ('Succss' == $responseDataArr['focusTransaction']['TransactionStatus']) {
      //check if the transaction is the success
      $user_id = $responseDataArr['CustomerReference']; //get the cutomer refrence
      $user    = User::findOrFail($user_id);
      if ('user' == $responseDataArr['UserDefinedField']) {
        //get the extra key

        // code

      } elseif ('product' == $responseDataArr['UserDefinedField']) {
        //code
      }
      return $this->successMsg(__('apis.success'));
    } else {
      return $this->failMsg(__('apis.fail'));
    }
  }

  public function failTransaction() {
    return $this->failMsg(__('apis.fail'));
  }
}
