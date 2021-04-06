<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="", method="POST">
        @csrf
            <h1>After login show all product</h1>
            @foreach($users as $user)
                <span style="font-size:20px;">
                    <img src= "{{asset('/upload')}}/{{$user->image}}" width="180px" height="180px"><br>
                    Name:
                    {{$user->p_name}}<br>

                    Price:
                    {{$user->p_price}}<br>

                    Description:
                    {{$user->description}}<br>

                    Quantity: <input type="number" name="quantity"><br>
                    <span style="color: red;">@error('quantity'){{$message}}@enderror</span><br>

                    <input type="hidden" name="p_name" value="{{$user->p_name}}">
                    <input type="hidden" name="p_price" value="{{$user->p_price}}">

                    <!-- <a href="/order_now/{{$user->p_id}}">
                    <input type="submit" name="submit" value="Order Now"></a>

                    <a href="/add_to_card/{{$user->p_id}}">
                    <input type="submit" name="submit" value="Add to Cart"></a> -->
                    <input type="submit" value="Order Now" formaction="{{url('/order_now')}}">
                    <input type="submit" value="Add to Cart" formaction="{{url('/add_to_card')}}">
                </span><br>
            @endforeach
        </form>

    </body>
</html>
<!-- style="width:185px; font-family:consolas; margin-top:5px;" -->
