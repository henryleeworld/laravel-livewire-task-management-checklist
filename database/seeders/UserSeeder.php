<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name'     => '管理員',
                'email'    => 'admin@admin.com',
                'password' => Hash::make('password'),
                'is_admin' => 1
            ],
        );
        User::create(
            [
                'name'     => '使用者',
                'email'    => 'user@user.com',
                'password' => Hash::make('password'),
                'is_admin' => 0
            ],
        );
    }
}
