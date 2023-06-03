<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * write on terminal :
     * php artisan db:seed --class=CreateUser
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('admin1234'),
            ],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
