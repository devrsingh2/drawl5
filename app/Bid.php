<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = ['user_id','requirement_id','description','amount', 'status'];

    public function User()
    {
    	return $this->hasOne('App\User','id','user_id');
    }

    public function bidAdditional()
    {
        return $this->hasOne(BidAdditional::class,'bid_id', 'id');
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirement_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
