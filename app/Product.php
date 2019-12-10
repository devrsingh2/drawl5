<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productAdditional()
    {
        return $this->hasOne('App\ProductAdditional','product_id','id');
    }

    public function productCategories()
    {
        return $this->hasOne('App\Category','id','category_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
    }

}
