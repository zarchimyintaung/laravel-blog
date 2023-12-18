<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return User::find(1)->phone->phone;
    }

    public function store(){
        $phone = new Phone();
        $phone -> phone = "09793148428";

        $user = new User();
        $user->name = 'hms';
        $user->email = 'hms@gmail.com';
        $user->password = Hash::make('12345678');

        $user->save();

        $user->phone()->save($phone);

        return "User Create Successfully";
    }
}
