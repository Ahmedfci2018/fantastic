<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=App\Models\User::create([
            'name'=>'Super Admin',
            'email'=>'super@eg.com',
            'group'=>'admin',
            'password'=>bcrypt('12345'),
            'api_token'=>hash('md5','user'),
        ]);
    } // end of run
} //end of seeder
