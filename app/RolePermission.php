<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles_permissions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
//    public $timestamps = false;
    protected $fillable = ['*'];

    /*public function getPermission()
    {
        return $this->belongsTo(Permission::class,'permission_id');
    }*/

    public function getPermission()
    {
        return $this->belongsTo(Permission::class,'permission_id', 'id');
    }

}
