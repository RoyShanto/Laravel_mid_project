<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login page!</h1>
    <form method="post">

        <!-- @csrf -->
        <!-- {{ csrf_field() }} -->
        <!-- <input type="hidden" name="_token" value=" {{ csrf_token() }}"> -->
        @csrf
        <fieldset>
            <legend>Login</legend>
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"><br>
                    <span style="color: red;">@error('username'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"><br>
                    <span style="color: red;">@error('password'){{$message}}@enderror</span>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="submit"></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align:right; text-decoration:none;"><a href="/registration">Sign Up</a></td>
                </tr>
            </table>

        </fieldset>
    </form>
    <span style="color: red;">{{session('msg')}}</span>
</body>
</html>
