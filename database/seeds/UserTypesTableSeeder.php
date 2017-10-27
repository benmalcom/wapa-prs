<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_types = [
            array('name'=>'Developer', 'role_name'=>\App\UserType::DEVELOPER),
            array('name'=>'Admin', 'role_name'=>\App\UserType::ADMIN),
            array('name'=>'PRS', 'role_name'=>\App\UserType::PRS),
            array('name'=>'Poverty Alleviation', 'role_name'=>\App\UserType::POVERTY_ALLEVIATION),
            array('name'=>'Women Department', 'role_name'=>\App\UserType::WOMEN_DEPT),
            array('name'=>'Principal', 'role_name'=>\App\UserType::PRINCIPAL),
            array('name'=>'Skill Acquisition Development', 'role_name'=>\App\UserType::SKILL_ACQUISITION),
        ];

        foreach ($user_types as $item){
            $user_type = \App\UserType::create($item);
            Role::create(['name' => $user_type->role_name]);
        }
    }
}
