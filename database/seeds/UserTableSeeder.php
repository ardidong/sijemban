<?php

use Illuminate\Database\Seeder;
use JEMBATAN\User;
use JEMBATAN\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_donator = Role::where('name','donator')->first();
        $role_petugas = Role::where('name','petugas')->first();
        $role_admin = Role::where('name','admin')->first();
       
        $donator = new User();
        $donator->name = 'Ardi';
        $donator->email = 'ardimail@gmail.com';
        $donator->password = Hash::make('123456');
        $donator->alamat = 'Sleman';
        $donator->no_telepon = '0867287654881';
        $donator->remember_token = 'd2j3';
        $donator->save();
        $donator->roles()->attach($role_donator);

        $donator = new User();
        $donator->name = 'Dwi';
        $donator->email = 'dwimail@gmail.com';
        $donator->password = Hash::make('123456');
        $donator->alamat = 'Bantul';
        $donator->no_telepon = '085789223222';
        $donator->remember_token = 'd2j3';
        $donator->save();
        $donator->roles()->attach($role_donator);

        
        $donator = new User();
        $donator->name = 'Rifai';
        $donator->email = 'rifaimail@gmail.com';
        $donator->password = Hash::make('123456');
        $donator->alamat = 'Sleman';
        $donator->no_telepon = '085789223222';
        $donator->remember_token = 'd2j3';
        $donator->save();
        $donator->roles()->attach($role_donator);

        $petugas = new User();
        $petugas->name = 'petugas1';
        $petugas->email = 'petugas@lsm.com';
        $petugas->password = Hash::make('123456');
        $petugas->alamat = 'Mlati';
        $petugas->no_telepon = '084764754';
        $petugas->remember_token = 'ss7t';
        $petugas->save();
        $petugas->roles()->attach($role_petugas);

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@lsm.com';
        $admin->password = Hash::make('123456');
        $admin->alamat = 'Godean';
        $admin->no_telepon = '08647566';
        $admin->remember_token = 'a8s0';
        $admin->save();
        $admin->roles()->attach($role_admin);

    }
}
