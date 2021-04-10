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

    public function show_product($id, Request $req){
        // echo $id;
        $users = DB::table('product')->where('p_id', $id)->get();
        return view('Buyer.select_product', ['users' => $users]);

    }
    public function order_now(Request $req){
        $rules = [
            'quantity' => 'required|numeric|min:1|max:5',
        ];
        $this->validate($req, $rules);

        if($req->p_status == 'Add_To_Cart'){
            echo "if";
            // echo $req->p_id;
            $data = Order:: find($req->p_id);
            $data->delete();



            $username = $req->session()->get('username');

            $user = Buyer::where('user_name', $username)
            ->get();

            foreach($user as $u){
                $user = new Order();
                $user->buyer_name = $u['full_name'];
                $user->buyer_username = $u['user_name'];
                $user->buyer_email = $u['email'];
                $user->p_name = $req->p_name;
                $user->p_price = $req->p_price;
                $user->product_quantity = $req->quantity;
                $user->total_price = $req->quantity * $req->p_price;
                $user->status = "Orderd";
                $user->buyer_id = $u['id'];
                $user->image = $req->p_image;
                $user->description = $req->p_description;
                $user->save();

                echo "<h1>  Order Successfully Done  </h1>";
                echo "Name: " . $user->product_name . "<br>";
                echo "Price: " . $user->product_price . "<br>";
                echo "Quantity: " . $user->product_quantity . "<br>";
                echo "Total price: " . $user->total_price . "<br>";

                return redirect('/show_cart');
            }
        }
        else{
            // echo $req->p_name . "<br>";
        // echo $req->p_price . "<br>";

        // echo $req->p_quantity . "<br>";
        // echo $req->quantity . "<br>";
        // echo $req->quantity * $req->p_price . "<br>";
        // echo $req->p_image . "<br>";
        // echo $req->p_description;


        $username = $req->session()->get('username');

        $user = Buyer::where('user_name', $username)
        ->get();


        foreach($user as $u){
            $user = new Order();
            $user->buyer_name = $u['full_name'];
            $user->buyer_username = $u['user_name'];
            $user->buyer_email = $u['email'];

            $user->p_name = $req->p_name;
            $user->p_price = $req->p_price;
            $user->product_quantity = $req->quantity;
            $user->total_price = $req->quantity * $req->p_price;
            $user->status = "Orderd";
            $user->buyer_id = $u['id'];


            $user->image = $req->p_image;
            $user->description = $req->p_description;
            $user->save();

            echo "<h1>  Order Successfully Done  </h1>";
            echo "Name: " . $user->product_name . "<br>";
            echo "Price: " . $user->product_price . "<br>";
            echo "Quantity: " . $user->product_quantity . "<br>";
            echo "Total price: " . $user->total_price . "<br>";
        }

        }
    }

    public function add_to_cart(Request $req){
        $rules = [
            'quantity' => 'required|numeric|min:1|max:5',
        ];
        $this->validate($req, $rules);
        $username = $req->session()->get('username');

        $user = Buyer::where('user_name', $username)
        ->get();

        foreach($user as $u){
            $user = new Order();
            $user->buyer_name = $u['full_name'];
            $user->buyer_username = $u['user_name'];
            $user->buyer_email = $u['email'];

            $user->p_name = $req->p_name;
            $user->p_price = $req->p_price;
            $user->product_quantity = $req->quantity;
            $user->total_price = $req->quantity * $req->p_price;
            $user->status = "Add_To_Cart";
            $user->buyer_id = $u['id'];


            $user->image = $req->p_image;
            $user->description = $req->p_description;
            $user->save();

            echo "<h1>  Add_To_Cart Successfully Done  </h1>";
            echo "Name: " . $user->p_name . "<br>";
            echo "Price: " . $user->p_price . "<br>";
            echo "Quantity: " . $user->product_quantity . "<br>";
            echo "Total price: " . $user->total_price . "<br>";
        }
    }

    public function show_cart(Request $req){
        $username = $req->session()->get('username');

        $product = Order::where('buyer_username', $username)
        ->where('status', "Add_to_Cart")
        ->get();

        return view('Buyer.show_cart', ['product' => $product]);
    }

    public function cart_delete($id){
        $data = Order:: find($id);
        $data->delete();
        return redirect('/show_cart');
    }

    public function order_from_cart($date, Request $req){
        $username = $req->session()->get('username');

        // $product = Order::where('order_date', $date)
        // ->where('buyer_username', $username)
        // ->get();

        $product = DB::table('orders')->where('order_date', $date)
        ->where('buyer_username', $username)
        ->get();

        // echo $date;
        // $product = DB::table('orders')
        // ->join('buyers', 'orders.buyer_id',"=",'buyers.id')
        // ->select('orders.*')
        // // ->where('order_date', $date)
        // ->where('buyer_username', $username)
        // ->get();

        // echo $product;

        return view('Buyer.select_product', ['users' => $product]);
    }
    public function order_history(Request $req){
        $username = $req->session()->get('username');

        $product = Order::where('buyer_username', $username)
        ->where('status', "Orderd")
        ->get();
// print_r($product);
        return view('Buyer.show_order', ['product' => $product]);
    }

    public function wish(Request $req){
        $username = $req->session()->get('username');
        $user = Buyer::where('user_name', $username)
        ->get();

        foreach($user as $u){
            $user = new Order();
            $user->buyer_name = $u['full_name'];
            $user->buyer_username = $u['user_name'];
            $user->buyer_email = $u['email'];

            $user->p_name = $req->p_name;
            $user->p_price = $req->p_price;
            $user->product_quantity = $req->quantity;
            $user->total_price = $req->quantity * $req->p_price;
            $user->wish = "wish";
            $user->buyer_id = $u['id'];

            $user->image = $req->p_image;
            $user->description = $req->p_description;
            $user->save();

            // echo "<h1>  Wish Successfully Done  </h1>";
            // echo "Name: " . $user->p_name . "<br>";
            // echo "Price: " . $user->p_price . "<br>";
            // echo "Quantity: " . $user->product_quantity . "<br>";
            // echo "Total price: " . $user->total_price . "<br>";

            $users = DB::table('product')->where('p_id', $req->p_id)->get();
            return view('Buyer.select_product', ['users' => $users]);
        }
    }

    public function show_wish(Request $req){
        $username = $req->session()->get('username');

        $product = Order::where('buyer_username', $username)
        ->where('wish', "wish")
        ->get();
        return view('Buyer.show_order', ['product' => $product]);
    }

    public function search_product(Request $req){
        // $product = Product::all();
        // foreach($product as $p){
        //     if($p->p_name == $req->search_product){
        //         // return view('Buyer.index', ['users' => $product]);
        //         echo "p";
        //     }
        //     else{
        //         echo "f";
        //     }
        // }


        $product = Product::where("p_name", $req->search_product)->get();
        foreach($product as $p){
            if($p->p_name == $req->search_product){
                return view('Buyer.index', ['users' => $product]);
            }
            else{
                echo "p";
            }
        }
        $req->session()->flash('msg', 'Data Not Found..!');
        $product = Product::all();
        return view('buyer.index', ['users' => $product]);
    }


}
