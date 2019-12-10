<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'newsletters';
    protected $fillable = ['title','description','content','created_by'];
    public function User(){
       return $this->hasOne(User::class,'id','created_by');
    }
}
