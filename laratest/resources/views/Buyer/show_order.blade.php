<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Order History</h1>

<!-- {{session('username')}} -->
<a href="/abc.com">Home</a> &nbsp;&nbsp;&nbsp;
<a href="/profile/{{session('username')}}">My Profile</a> &nbsp;&nbsp;&nbsp;
<a href="/show_cart">Add To Cart</a>&nbsp;&nbsp;&nbsp;
<a href="/show_wish">Wish List</a>&nbsp;&nbsp;&nbsp;
<a href="/order_history">Order History</a>&nbsp;&nbsp;&nbsp;
<a href="/logout">Logout</a>
<br><br>


    <table border="1">
        <tr>
            <td>Product Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Total Price</td>
        </tr>
    @foreach($product as $user)
        <tr>
            <td>{{$user['p_name']}}</td>
            <td>{{$user['p_price']}}</td>
            <td>{{$user['product_quantity']}}</td>
            <td>{{$user['total_price']}}</td>
        </tr>
    @endforeach
    </table><br>

    If you want to cancel you order, please contact us within 2 days.<br><br>
        Contact Information:<br>
        phone: 01627167955<br>
        Time: 8 AM - 10 PM


</body>
</html>
