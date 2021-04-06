<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Buyer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index(){
        $users = Product::all();
        return view('buyer.index', ['users' => $users]);
    }

    public function show_product($id, Request $req){
        echo $id;
        $users = DB::table('product')->where('p_id', $id)->get();
        return view('Buyer.select_product', ['users' => $users]);

    }
    // public function add_to_card(){

        // $users = Product::all();
        // return view('Buyer.index', ['users' => $users]);
    // }

    public function add_product(){
        return view('Product.add_product');
    }
    public function added_product(Request $req){
        echo $req->pname;
        echo $req->myfile . "<br>";

        if($req->hasFile('myfile')){
            $file = $req->file('myfile');
            // echo $file->getClientOriginalName() . "<br>";
            // echo $file->getClientOriginalExtension() . "<br>";
            // echo $file->getSize() . "<br>";  // in byte

            $file->move('upload', $file->getClientOriginalName());

            $product_log = new Product();
            $product_log->p_name = $req->pname;
            $product_log->p_price = $req->pprice;
            $product_log->p_quantity = $req->pquantity;
            $product_log->description = $req->pdescription;
            $product_log->image = $file->getClientOriginalName();
            $product_log->save();

            return redirect('/login');
        }
    }
    public function order_now(Request $req){
        $rules = [
            'quantity' => 'required|numeric|min:1|max:5',
        ];
        $this->validate($req, $rules);

        // echo $req->p_name;
        // echo $req->p_price . "<br>";
        // echo $req->quantity . "<br>";
        // echo $req->quantity * $req->p_price;

        $username = $req->session()->get('username');

        $user = Buyer::where('user_name', $username)
        ->get();

        // print_r($user);

        foreach($user as $u){
            // echo $u['full_name'];
            $user = new Order();
            $user->buyer_name = $u['full_name'];
            $user->buyer_username = $u['user_name'];
            $user->buyer_email = $u['email'];

            $user->product_name = $req->p_name;
            $user->product_price = $req->p_price;
            $user->product_quantity = $req->quantity;
            $user->total_price = $req->quantity * $req->p_price;
            $user->save();
        }
    }
    public function add_to_card(Request $req){

    }

}
