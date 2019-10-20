<?php

namespace Modules\Admin\Entities;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Admin\Entities\Role;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    //--------------------------------------
    use SoftDeletes;
    //--------------------------------------
    protected $fillable = [
        'name',
        'email',
        'first_name',
        'password',
        'last_name',
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
    public function roles()
    {
        return $this->belongsToMany(
            '\Modules\Admin\Entities\Role',
            'user_roles', 'user_id', 'role_id'
        );
    }
    //------------ Store User --------------
    //--------------------------------------
    public static function store(Request $request){
        $user = User::where('email', $request->email)->first();
        $response = [];
        if ($user) {
            $response['status'] = 'failed';
            $response['errors'][] = 'Email already exists';
        }

        $user = new User();
        $user->fill($request->all());
        $user->password = \Hash::make($request->password);
        $user->save();

        $response['status'] = 'success';
        $response['data'] = $user;
        $response['messages'][] = 'User registered successfully';
        return $response;
    }
}
