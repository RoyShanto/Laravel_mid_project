<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Feedback;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($username){
        // echo $username;
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
    public function report_seller($id){
        // $user = DB::table('product')->where('p_id', $id)->get();
        // print_r($user);
        return view('Buyer.report_seller', ['id' => $id]);
    }
    public function report_seller_submit(Request $req){
        // echo $req->message;
        // echo $req->id;


        $user = new Feedback();          //Buyer is a model name
        $user->product_id = $req->id;
        $user->report_message = $req->message;
        $user->save();

        $req->session()->flash('msg', 'Report send succesfull');
        return redirect('/abc.com');
    }
}
