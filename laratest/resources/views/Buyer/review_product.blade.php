<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Review Product</h1>
    <a href="/abc.com">Home</a> &nbsp;&nbsp;&nbsp;
    <a href="/profile/{{session('username')}}">My Profile</a> &nbsp;&nbsp;&nbsp;
    <a href="/show_cart">Add To Cart</a>&nbsp;&nbsp;&nbsp;
    <a href="/show_wish">Wish List</a>&nbsp;&nbsp;&nbsp;
    <a href="/order_history">Order History</a>&nbsp;&nbsp;&nbsp;
    <a href="/logout">Logout</a><br><br>
    <table border="1">
        <tr>
            <th>Review</th>
        </tr>
        @foreach($data as $d)
        <tr>
            <td>{{$d->review}}</td>
        </tr>
        @endforeach
    </table>

    <form action="" method="post">
    @csrf
    My Review:<br>
    <textarea name="review" cols="50" rows="3"></textarea><br>
    <input type="submit" value="Submit">


    </form>

</body>
</html>
