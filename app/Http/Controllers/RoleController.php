<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function addRoles(){
        $roles = array(
            'Admin',
            'Editor',
            'Manager',
            'Moderator',
            'Developer',
            'User',
        );

        foreach ($roles as $item) {
           $role = new Role();

           $role->name = $item;
           $role->save();

        }

        return "Roles Add Successfully";
    }

    public function addUser(){
        $user = new User();

        $user->name = 'mama';
        $user->email = 'ma@gmail.com';
        $user->password = Hash::make('12345678');

        $user->save();

        $user->roles()->attach([4,5]);
        return "user add succseefully";
    }

    public function getRolesByUser(){
        $roles = User::find(2)->roles;

        foreach ($roles as $role) {
            echo $role->name."<br>";
        }
    }

    public function getUserByRole(){
        $users = Role::find(4)->users;

        return $users;
    }
}
