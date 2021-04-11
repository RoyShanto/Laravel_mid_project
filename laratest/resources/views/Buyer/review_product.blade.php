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

    <input type="hidden" name="id" value="{{$d->product_id}}">
    </form>

</body>
</html>
