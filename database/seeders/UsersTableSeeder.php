<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "firstname" => "Karlo",
            "lastname" => "Stjepanović",
            "username" => "karlo.stjepanovic",
            "password" => Hash::make("1234"),
            "initial_password" => false,
            "oib" => "66321597535",
            "email" => "karlo.stjepanovic3@gmail.com",
            "is_admin" => true
        ]);
    }
}
