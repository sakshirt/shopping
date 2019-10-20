<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->roles();
    }

    public function roles()
    {
        $roles = ['Admin', 'Customer', 'Vendor'];

        foreach ($roles as $role) {
            DB::table('roles')
            ->insert([
                'name' => $role,
                'slug' => Str::slug($role),
                'description' => ''
            ]);
        }
    }
}
