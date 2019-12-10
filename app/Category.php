<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    protected $hidden = ['added_on'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
//    public $timestamps = false;
    protected $fillable = ['*'];
}
