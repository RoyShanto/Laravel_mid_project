<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qusetion & Answer</title>
</head>
<body>
    <h1>Qusetion & Answer</h1>
    <a href="/abc.com">Home</a> &nbsp;&nbsp;&nbsp;
            <a href="/profile/{{session('username')}}">Edit Profile</a> &nbsp;&nbsp;&nbsp;
            <a href="/show_cart">Add To Cart</a>&nbsp;&nbsp;&nbsp;
            <a href="/show_wish">Wish List</a>&nbsp;&nbsp;&nbsp;
            <a href="/order_history">Order History</a>&nbsp;&nbsp;&nbsp;
            <a href="/logout">Logout</a><br><br>
    <table border="1">
        <tr>
            <th>Question</th>
            <th>Answer</th>
        </tr>
        @foreach($data as $d)
        <tr>
            <td>{{$d->ask_question}}</td>
            <td>{{$d->ans}}</td>
        </tr>
        @endforeach

    </table>
    <form action="" method="post">
    @csrf
    Question:<br>
    <textarea name="question" cols="50" rows="3"></textarea><br>
    <input type="submit" value="Submit">

    <input type="hidden" name="id" value="{{$d->product_id}}">
    </form>


</body>
</html>
