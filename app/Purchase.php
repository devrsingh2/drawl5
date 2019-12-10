<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'purchases';


    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirement_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
