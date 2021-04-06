<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>

    <h1>Registration hare!</h1>
    <!-- @if($errors->any())
        @foreach($errors -> all() as $err)
        <li>{{$err}}</li>
        @endforeach
    @endif -->
    <form method="post">

        @csrf

        <fieldset>
            <legend>New Registration</legend>
            <table>

            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="name"><br>
                    <span style="color: red;">@error('name'){{$message}}@enderror</span>
                </td>
            </tr>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username"><br>
                    <span style="color: red;">@error('username'){{$message}}@enderror</span>
                </td>
            </tr>

                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email"><br>
                        <span style="color: red;">@error('email'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password"><br>
                        <span style="color: red;">@error('password'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password"><br>
                        <span style="color: red;">@error('confirm_password'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <input type="text" name="address"><br>
                        <span style="color: red;">@error('address'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td>
                        <input type="number" name="phone"><br>
                        <span style="color: red;">@error('phone'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td>
                        <input type="text" name="city"><br>
                        <span style="color: red;">@error('city'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td>
                        <input type="text" name="country"><br>
                        <span style="color: red;">@error('country'){{$message}}@enderror</span>
                    </td>
                </tr>

                <tr>
                    <td><input type="submit" name="submit" value="Sign Up"></td>
                    <td></td>
                </tr>
            </table>

        </fieldset>

    </form>
    {{session('msg')}}
</body>
</html>
