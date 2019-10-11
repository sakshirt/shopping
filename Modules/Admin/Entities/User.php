<?php

namespace Modules\Admin\Entities;

use Cake\Network\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Entities\Role;

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
    //------------ Store User --------------
    //--------------------------------------
    public function userStore(Request $request){
//        $roles = Role::where('');

    }

}

$request = ['email' => 'sakshi@email.com', 'first_name' => 'Sakshi', 'enable' => 1];
$user = new User();
$user->storeUser($request);
