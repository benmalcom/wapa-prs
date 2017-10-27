<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = \App\User::create([
            'first_name'=>'Benjamin',
            'last_name' => 'Ikeji',
            'email' => 'benjaminikeji@gmail.com',
            'password' => bcrypt('password')
        ]);

        if(!is_null($user)){
            $userType = \App\UserType::where('role_name',\App\UserType::DEVELOPER)->first();
            if($userType && $userType->role_name){
                $user->assignRole($userType->role_name);
            }

        }

    }
}