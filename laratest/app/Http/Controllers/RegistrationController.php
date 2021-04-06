<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buyer;
use App\Models\Users;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('Registration.index');
    }

    public function store_user(Request $req)
    {

        $rules = [
            'name' => 'required|min:3|max:30',
            'username' =>'required',
            'email' => 'required|email|min:10|max:50',
            'password' => 'required|min:5|max:20|alpha_num',
            'confirm_password' =>'required|required_with:password|same:password',
            'address' => '',
            'phone' => 'required|digits_between:11,15',
            'city' => 'min:3|max:20',
            'country' => 'min:3|max:20'
        ];
        $this->validate($req, $rules);

        // $user = Customer::where('email', $req->email)
        //     ->where('user_name', $req->username)
        //     ->get();
                        //    or
        $user = DB::table('users')
            ->where('u_email', $req->email)
            ->where('u_username', $req->username)
            ->get();
         if(count($user) > 0){
            $req->session()->flash('msg', 'User already registerd');
            return redirect('/registration');
        }
        else{
            echo "right";

            $user = new Buyer();          //Buyer is a model name
            $user->full_name = $req->name;
            $user->user_name = $req->username;
            $user->email = $req->email;
            $user->password = $req->password;
            $user->address = $req->address;
            $user->phone = $req->phone;
            $user->city = $req->city;
            $user->country = $req->country;
            $user->user_type = 'Buyer';
            $user->save();

            $user_log = new Users();   //Users is a model name
            $user_log->u_username = $req->username;
            $user_log->u_email = $req->email;
            $user_log->u_password = $req->password;
            $user_log->u_type = 'Buyer';
            $user_log->save();

            return redirect('/login');
        }


    }
}
