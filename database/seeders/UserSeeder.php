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
        $user =[
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'role' => 'petugas',
                'alamat' => '',
                'password' => Hash::make('admin'),

            ],
        ];

        foreach ($user as $u){
            User::create($u);
        }   
    }
}
