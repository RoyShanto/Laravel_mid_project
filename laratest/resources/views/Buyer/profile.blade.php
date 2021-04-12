<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Edit Information Here!</h1>
<a href="/abc.com">Home</a> &nbsp;&nbsp;&nbsp;
<a href="/profile/{{session('username')}}">Edit Profile</a> &nbsp;&nbsp;&nbsp;
<a href="/show_cart">Add To Cart</a>&nbsp;&nbsp;&nbsp;
<a href="/show_wish">Wish List</a>&nbsp;&nbsp;&nbsp;
<a href="/order_history">Order History</a>&nbsp;&nbsp;&nbsp;
<a href="/logout">Logout</a><br><br>


@csrf

<fieldset>
    <legend>My Information</legend>

        @foreach($user as $us)
        Full Name: {{$us->full_name}}<br>
        Email: {{$us->email}}<br>
        Address: {{$us->address}}<br>
        Phone Number:: {{$us->phone}}<br>
        City: {{$us->city}}<br>
        Country: {{$us->country}}<br><br>

        <a href="/edit_profile/{{session('username')}}">Edit Profile</a>&nbsp;&nbsp;&nbsp;
        <a href="/premium_membership">Premium membership</a>
    @endforeach
</fieldset>

</body>
</html>
