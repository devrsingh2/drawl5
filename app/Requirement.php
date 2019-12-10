<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'requirements';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
//    public $timestamps = false;
    protected $fillable = ['user_id', 'category_id', 'description', 'quantity', 'product_id','title'];

//    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, 'requirement_id', 'id')->select('id', 'user_id', 'requirement_id', 'description', 'amount', 'status', 'created_at');
    }

    public function requirementAdditional()
    {
        return $this->hasOne(RequirementAdditional::class,'requirement_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function acceptedBid()
    {
        $id = auth()->user()->id;
        return $this->hasOne(Bid::class, 'requirement_id', 'id')->select('user_id', 'requirement_id', 'amount')->where('user_id', $id);
    }

    public function scopeFilterBid($query, $user_id)
    {
        return $query->whereHas('bids', function($q) use ($user_id) {
            $q->where('user_id', '=' , $user_id);
            $q->having('id', '>' , 0);
        });
    }


}
