<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($username){
        echo $username;
        // echo date("Y-F-j");
        $user = DB::table('buyers')->where('user_name', $username)->get();
        // print_r($user);
        return view('Buyer.edit_profile', ['user' => $user]);
    }

    public function update_info($username, Request $req){
        $user = DB::table('buyers')
        ->where('user_name', $username)
        ->update([
            'full_name' => $req->name,
            'user_name' => $req->username,
            'email' => $req->email,
            'password' => $req->password,
            'address' => $req->address,
            'phone' => $req->phone,
            'city' => $req->city,
            'country' => $req->country,
            'last_updated' => date("j-F-Y")
            // 'last_updated' => date("Y-F-0j h:i:s A")
            ]);

        $user = DB::table('users')
        ->where('u_username', $username)
        ->update([
            'u_username' => $req->username,
            'u_email' => $req->email,
            'u_password' => $req->password,
            'u_type' => 'Buyer'
            ]);

        return redirect('/abc.com');

        // 2021-04-05 18:45:34
    }
}
