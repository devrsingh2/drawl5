<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $table = 'notifications';
    protected $fillable = ['subject','message','category_id','from_user_id','to_user_id','requirement_id','status'];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirement_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
    }

}
