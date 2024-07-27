<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Enums\OrderStatus;
use App\Enums\OrderType;
use App\Enums\OrderPayType;
use App\Enums\OrderPayStatus;

class Order extends Model {
  use UploadTrait;

  protected $fillable = [
    'order_num', // auto with creating in this boot method
    'type',
    'user_id',
    'provider_id',
    'coupon_id',
    'coupon_num',
    'coupon_type',
    'coupon_value',
    'vat_per',

    'total_products',
    'coupon_amount',
    'vat_amount',
    'deliver_price',
    'final_total',

    'admin_commission_per',
    'admin_commission',

    'status',

    'pay_type',
    'pay_status',
    'pay_data',

    'lat',
    'lng',
    'map_desc',
    'notes',

    'user_delete',
    'provider_delete',
    // 'delegate_delete',
    'admin_delete',
  ];

  protected $casts = [
    'pay_data' => 'array',
    'lat'      => 'decimal:8',
    'lng'      => 'decimal:8',
  ];

  public function getQrCodeAttribute() {
    /**
     * generate image file and store with order id
     * composer require simplesoftwareio/simple-qrcode "~4"
     * https://www.simplesoftware.io/#/docs/simple-qrcode
     */
    if (!Storage::exists("images/qrcodes/$this->id")) {
      QrCode::format('png')->generate("$this->id", base_path() . "/storage/app/public/images/qrcodes/$this->id.png");
    }

    return dashboard_url("storage/images/qrcodes/$this->id.png");
  }

  public function getTypeTextAttribute() {
    return trans('order.types_' . OrderType::slug($this->type));
  }

  public function getStatusTextAttribute() {
    return trans('order.status_' . OrderStatus::slug($this->status));
  }

  public function getPayTypeTextAttribute() {
    return trans('order.pay_type_' . OrderPayType::slug($this->pay_type));
  }

  public function getPayStatusTextAttribute() {
    return trans('order.pay_status_' . OrderPayStatus::slug($this->pay_status));
  }

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function statusHistory() {
    return $this->hasMany(OrderStatusHistory::class);
  }

  public function offers() {
    //return $this->hasMany(Offer::class);
  }

  public function acceptedOffer() {
    //return $this->belongsTo(Offer::class, 'accepted_offer_id');
  }

  public static function boot() {
    parent::boot();
    self::creating(function ($model) {
      $lastId = self::max('id') ?? 0;
      $model->order_num = date('Y') . ($lastId + 1);
    });
  }

}
