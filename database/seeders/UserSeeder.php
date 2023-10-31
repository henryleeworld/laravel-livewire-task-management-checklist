<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
                'password' => 'password',
                'is_admin' => 1
            ],
        );
        User::create(
            [
                'name'     => '使用者',
                'email'    => 'user@user.com',
                'password' => 'password',
                'is_admin' => 0
            ],
        );
    }
}
