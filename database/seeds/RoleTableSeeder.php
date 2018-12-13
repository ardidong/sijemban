<?php

use Illuminate\Database\Seeder;
use JEMBATAN\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_donator = new Role();
        $role_donator->name ='donator';
        $role_donator->description ='A donator User';
        $role_donator->save();

        $role_donator = new Role();
        $role_donator->name ='petugas';
        $role_donator->description ='petugas';
        $role_donator->save();

        $role_donator = new Role();
        $role_donator->name ='admin';
        $role_donator->description ='administrator';
        $role_donator->save();

    }
}
