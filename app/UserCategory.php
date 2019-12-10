<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class UserCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_categories';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
//    public $timestamps = false;
    protected $fillable = ['*'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->select(['id']);
    }

    public function userInfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function userRequirement()
    {
        return $this->hasMany(Requirement::class, 'category_id', 'category_id')->where( 'created_at', Carbon::today());
    }

    public function userBid()
    {
        return $this->hasMany(Bid::class, 'category_id', 'category_id');
    }
}
