<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    {{ session('username')}}
        <!-- <form action="", method="POST"> -->
            <h1>After login show all product</h1>
            <a href="/profile/{{session('username')}}">Edit Profile</a>
            <a href="/logout">Logout</a>

            @foreach($users as $user)
<div style="border:1px solid; width:200px; height:300px; margin-left:10px; margin-right:10px; margin-top:10px; border-radius: 5px; text-align: center; padding:5px; float:left;">
            <a href="/show_product/{{$user['p_id']}}">

                            <img src= "{{asset('/upload')}}/{{$user['image']}}" width="190px" height="190px">

                        <b>{{$user['p_name']}}</b>

                        <div style="width:185px; padding:3px; margin-left:2px; background-color:black; color:white; border-radius: 5px;">
                        {{$user['p_price']}}</div>

                        {{$user['description']}}<br>


                <br>
            </a>
</div>
            @endforeach

        <!-- </form> -->

    </body>
</html>
