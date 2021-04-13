<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Report Seller</h1>
    <a href="/abc.com">Home</a> &nbsp;&nbsp;&nbsp;
    <a href="/profile/{{session('username')}}">My Profile</a> &nbsp;&nbsp;&nbsp;
    <a href="/show_cart">Add To Cart</a>&nbsp;&nbsp;&nbsp;
    <a href="/show_wish">Wish List</a>&nbsp;&nbsp;&nbsp;
    <a href="/order_history">Order History</a>&nbsp;&nbsp;&nbsp;
    <a href="/logout">Logout</a><br><br>
    <form action="" method="post">
    @csrf
    Message:<br>
    <textarea name="message" cols="50" rows="10"></textarea><br>
    <input type="submit" value="Submit">

    <input type="hidden" name="id" value="{{$id}}">
    </form>

</body>
</html>
