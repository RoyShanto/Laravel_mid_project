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
<a href="/logout">Logout</a><br><br
    <form method="post">

        @csrf

        <fieldset>
            <legend>Edit Information</legend>
@foreach($user as $us)
            <table>

            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="name" value="{{$us->full_name}}"><br>
                    <span style="color: red;">@error('name'){{$message}}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" value="{{$us->user_name}}"><br>
                    <span style="color: red;">@error('username'){{$message}}@enderror</span>
                </td>
            </tr>

                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" value="{{$us->email}}"><br>
                        <span style="color: red;">@error('email'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" value="{{$us->password}}"><br>
                        <span style="color: red;">@error('password'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" value="{{$us->password}}"><br>
                        <span style="color: red;">@error('confirm_password'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <input type="text" name="address" value="{{$us->address}}"><br>
                        <span style="color: red;">@error('address'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td>
                        <input type="number" name="phone" value="{{$us->phone}}"><br>
                        <span style="color: red;">@error('phone'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td>
                        <input type="text" name="city" value="{{$us->city}}"><br>
                        <span style="color: red;">@error('city'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td>
                        <input type="text" name="country" value="{{$us->country}}"><br>
                        <span style="color: red;">@error('country'){{$message}}@enderror</span>
                    </td>
                </tr>

                <tr>
                    <td><input type="submit" name="submit" value="Update"></td>
                    <td></td>
                </tr>
            </table>

@endforeach
        </fieldset>

    </form>
    {{session('msg')}}
</body>
</html>
