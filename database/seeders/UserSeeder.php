<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "user_owner_id" => null,
            'name' => 'Super Admin',
            'email' => 'super@gmail.com',
            'phone' => '0599916672',
            'photo' => '',
            'account_type' => 'superadmin',
            'account_status' => 'active',
            "permissions" => config('users.permissions.superadmin'),
            'password' => Hash::make('123456789'),
        ]);

        User::create([
            "user_owner_id" => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0599916673',
            'photo' => '',
            'account_type' => 'admin',
            'account_status' => 'active',
            "permissions" => config('users.permissions.admin'),
            'password' => Hash::make('123456789'),
        ]);

        User::create([
            "user_owner_id" => 1,
            'name' => 'Person',
            'email' => 'person@gmail.com',
            'phone' => '0599916674',
            'photo' => '',
            'account_type' => 'person',
            'account_status' => 'active',
            "permissions" => config('users.permissions.person'),
            'password' => Hash::make('123456789'),
        ]);


        User::create([
            "user_owner_id" => 1,
            'name' => 'Company',
            'email' => 'company@gmail.com',
            'phone' => '0599916675',
            'photo' => '',
            'account_type' => 'company',
            'account_status' => 'active',
            "permissions" => config('users.permissions.company'),
            'password' => Hash::make('123456789'),
        ]);

        User::create([
            "user_owner_id" => 1,
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'phone' => '0599916676',
            'photo' => '',
            'account_type' => 'employee',
            'account_status' => 'active',
            "permissions" => config('users.permissions.employee'),
            'password' => Hash::make('123456789'),
        ]);


        // $x = 1;

        // while ($x < 2) {

        //     User::create([
        //         'name' => 'Person-' . $x,
        //         'email' => 'person-' . $x . '@gmail.com',
        //         'phone' => '0599' . random_int(111111, 999999),
        //         'photo' => '',
        //         'account_type' => 'person',
        //         'account_status' => 'active',
        //         "permissions" => config('users.permissions.person'),
        //         'password' => Hash::make('123456789'),
        //     ]);

        //     $x = $x + 1;
        // }
    }
}
