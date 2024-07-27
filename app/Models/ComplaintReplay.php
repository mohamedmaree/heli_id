<?php

namespace App\Models;

class ComplaintReplay extends BaseModel
{

    protected $fillable = ['replay','replayer_id','replayer_type' , 'complaint_id'];

    public function replayer()
    {
        return $this->morphTo();
    }
    
    public function complaint()
    {
        return $this->belongsTo(Complaint::class, 'complaint_id', 'id');
    }
}
