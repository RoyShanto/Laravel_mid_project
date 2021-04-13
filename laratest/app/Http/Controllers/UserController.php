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
        return view('Buyer.profile', ['user' => $user]);
    }

    public function profile($username){
        // echo $username;
        // echo date("Y-F-j");
        $user = DB::table('buyers')->where('user_name', $username)->get();
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

    }
    public function premium_membership(Request $req){
        $username = $req->session()->get('username');
        // echo $username;
        $user = DB::table('buyers')->where('user_name', $username)->get();
        // echo $user;
        foreach($user as $u){
            // echo $u->membership;
            if($u->membership == 'Premium'){
                $req->session()->flash('msg', 'You already get Premium Membership');
                return redirect('/abc.com');
            }
            else{
                return view('Buyer.premium_membership', ['user' => $user]);
            }
        }

    }
    public function confirm_premium_membership(Request $req){
        $username = $req->session()->get('username');
        $user = DB::table('buyers')
        ->where('user_name', $username)
        ->update([
            'membership' => "Premium"
            ]);
        $req->session()->flash('msg', 'Premium Membership is done');
        return redirect('/abc.com');
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

    public function contact_us(){
        return view('contact.contact_us');
    }
}
