<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(
            '\Modules\Admin\Entities\User',
            'user_roles', 'role_id', 'user_id'
        );
    }

    public static function getRoleIdUsingSlug(string $slug): int
    {
        $role = Role::where('slug', $slug)->first();

        if (!$role) {
            $role = new Role();
            $role->name = ucwords($slug);
            $role->slug = strval($slug);
            $role->save();
        }
        return $role->id;
    }
}
