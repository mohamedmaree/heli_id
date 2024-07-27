<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class Settlement extends BaseModel
{
    const IMAGEPATH = 'settlements' ;
    use UploadTrait;

    protected $fillable = [
        'transactionable_id',
        'transactionable_type',
        'amount' ,
        'status' ,
        'image'
    ];

    public function transactionable() {
        //? rel with users, admins, providers, delegates
        return $this->morphTo();
    }

    public function getImagePathAttribute() {
        $image = $this->getImage($this->attributes['image'], 'settlements');
        return $image;
    }

    public static function boot() {
        parent::boot();
        /* creating, created, updating, updated, deleting, deleted, forceDeleted, restored */

        static::deleted(function($model) {
            $model->deleteFile($model->attributes['image'], 'settlements');
        });

    }

}
