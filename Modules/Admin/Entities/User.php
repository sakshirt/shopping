<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    //--------------------------------------
    use SoftDelete;
    //--------------------------------------
    protected $fillable = [
        'name',
        'email',
        'firstname',
        'password',
        'lastname',
        'mobile',
        'thumbnail',
        'gender',
        'enable',
        'activation_code',
        'email_verified_at',
        'last_login',
        'api_token',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    //--------------------------------------

}
