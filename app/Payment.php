<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function bid()
    {
        return $this->belongsTo(Bid::class,'bid_id');
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirement_id');
    }

}
