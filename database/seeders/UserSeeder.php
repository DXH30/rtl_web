<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'id' => (String) Str::uuid(),
                'name' => 'admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('password123'),
                'valid' => true,
                'no_hp' => "1234",
                'group_id' => 1
            ],
            [
                'id' => (String) Str::uuid(),
                'name' => 'driver',
                'email' => 'driver@email.com',
                'password' => Hash::make('password123'),
                'valid' => true,
                'no_hp' => "1235",
                'group_id' => 2
            ],
            [
                'id' => (String) Str::uuid(),
                'name' => 'customer',
                'email' => 'customer@email.com',
                'password' => Hash::make('password123'),
                'valid' => true,
                'no_hp' => "1236",
                'group_id' => 3
            ],
        );
        User::insert($data);
    }
}
