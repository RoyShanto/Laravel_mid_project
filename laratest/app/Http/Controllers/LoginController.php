<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\users;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function verify(Request $req){
        $rules = [
            'username' => 'required|max:49',
            'password' => 'required|min:5|max:20|alpha_num'];
            $this->validate($req, $rules);

        $users = DB::table('users')->where('u_username', $req->username)
                    ->where('u_password', $req->password)
                    ->get();

                    // print_r($users);
                    // print_r(count($users));
    //                 foreach($users as $us)
    //                 {
    //                     $username = $us->username;
    //                     $user_type = $us->type;
    //                 }



        if(count($users) > 0){

            $req->session()->put('username', $req->username);
            // $req->session()->put('user_type', $req->user_type);

                // echo $req->session()->get('username');
                // echo $req->session()->get('user_type');

                return redirect('/abc.com');
        }
        else{
            $req->session()->flash('msg', 'invalide user..!');
            return redirect('/login');
        }

    }
}
