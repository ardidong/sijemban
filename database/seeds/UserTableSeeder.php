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
            'password' => '$2y$10$Gprgyd6wNPH1rROd.Y3gL.4mqXv8RCoJbyG5Ds9w3vlh/b5w3KJcu',
            'alamat' => 'sleman',
            'no_telepon'=> '086142648',
            'remember_token' => 'o93o'
        ]);
    }
}
