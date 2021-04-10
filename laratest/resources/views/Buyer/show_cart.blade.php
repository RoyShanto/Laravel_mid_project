<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Add To Cart</h1>
<!-- {{session('username')}} -->
<a href="/abc.com">Home</a> &nbsp;&nbsp;&nbsp;
<a href="/profile/{{session('username')}}">Edit Profile</a> &nbsp;&nbsp;&nbsp;
<a href="/show_cart">Add To Cart</a>&nbsp;&nbsp;&nbsp;
<a href="/show_wish">Wish List</a>&nbsp;&nbsp;&nbsp;
<a href="/order_history">Order History</a>&nbsp;&nbsp;&nbsp;
<a href="/logout">Logout</a>
<br><br>


    <table border="1">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Product Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Total Price</td>
            <td colspan="2" style="background-color: #0bff395e;">Action</td>
        </tr>
    @foreach($product as $user)
        <tr>
            <td>{{$user['buyer_name']}}</td>
            <td>{{$user['buyer_email']}}</td>
            <td>{{$user['p_name']}}</td>
            <td>{{$user['p_price']}}</td>
            <td>{{$user['product_quantity']}}</td>
            <td>{{$user['total_price']}}</td>
            <td style="background-color: #2020ff91;"><a href="/order_from_cart/{{$user['order_date']}}">Order Now</a></td>
            <td style="background-color: #f21f1fb8;"><a href="/cart_delete/{{$user['id']}}">Delete</a></td>

        </tr>
    @endforeach
    </table><br>

</body>
</html>
