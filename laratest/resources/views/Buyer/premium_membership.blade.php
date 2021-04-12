<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Membership</title>
</head>
<body>
<h1>*** Premium Membership ***</h1>
<a href="/abc.com">Home</a> &nbsp;&nbsp;&nbsp;
<a href="/profile/{{session('username')}}">My Profile</a> &nbsp;&nbsp;&nbsp;
<a href="/show_cart">Add To Cart</a>&nbsp;&nbsp;&nbsp;
<a href="/show_wish">Wish List</a>&nbsp;&nbsp;&nbsp;
<a href="/order_history">Order History</a>&nbsp;&nbsp;&nbsp;
<a href="/logout">Logout</a><br><br
<form method="POST" enctype="multipart/form-data">

        @csrf

        <fieldset>
            <legend>Premium Membership</legend>
@foreach($user as $us)
            <table>
<h3>If You Want Premium Membership, You must be pay 100 Tk.<br>
If You Agree With This Condition, Please <a href="/confirm_premium_membership">click here</a></h3>

            </table>

@endforeach
        </fieldset>

    </form>
</body>
</html>
