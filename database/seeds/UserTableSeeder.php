<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Ardi',
            'email' => 'ardimail@gmail.com',
            'password' => Hash::make('123456'),
            'alamat' => 'sleman',
            'no_telepon'=> '086142648',
            'remember_token' => 'o93o'
        ]);
        User::create([
            'name'  => 'Ard0',
            'email' => 'ardomail@gmail.com',
            'password' => Hash::make('654321'),
            'alamat' => 'sleman',
            'no_telepon'=> '086142648',
            'remember_token' => 'o93o'
        ]);
    }
}
