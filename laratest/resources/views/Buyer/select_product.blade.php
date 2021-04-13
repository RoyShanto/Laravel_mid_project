<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
        <!-- {{$users}} -->
        @csrf
            <h1>A product</h1>
            <a href="/abc.com">Home</a> &nbsp;&nbsp;&nbsp;
            <a href="/profile/{{session('username')}}">My Profile</a> &nbsp;&nbsp;&nbsp;
            <a href="/show_cart">Add To Cart</a>&nbsp;&nbsp;&nbsp;
            <a href="/show_wish">Wish List</a>&nbsp;&nbsp;&nbsp;
            <a href="/order_history">Order History</a>&nbsp;&nbsp;&nbsp;
            <a href="/logout">Logout</a><br><br>
@foreach($users as $user)
            <a href="/report_seller/{{$user->p_id}}">Report Seller</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="&#10084;" formaction="{{url('/wish')}}"><br><br>

                <span style="font-size:20px;">
                    <img src= "{{asset('/upload')}}/{{$user->image}}" width="180px" height="180px" name="file"><br>

                    Name:
                    {{$user->p_name}}<br>

                    Price:
                    {{$user->p_price}}<br>

                    Description:
                    {{$user->description}}<br>
                    Voucher: <input type="text" name="voucher"><br>

                    @if($user->status == 'Add_To_Cart')
                        Quantity: <input type="number" name="quantity" value="{{$user->product_quantity}}"><br>

                    @else
                        Quantity: <input type="number" name="quantity"><br>

                    @endif
                    <span style="color: red;">@error('quantity'){{$message}}@enderror</span><br>





                    @if($user->status == 'Add_To_Cart')
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="p_id" value="{{$user->p_id}}">
                        <input type="hidden" name="p_name" value="{{$user->p_name}}">
                        <input type="hidden" name="p_price" value="{{$user->p_price}}">
                        <input type="hidden" name="p_description" value="{{$user->description}}">
                        <input type="hidden" name="p_image" value="{{$user->image}}">
                        <input type="hidden" name="p_status" value="{{$user->status}}">
                    @else
                        <input type="hidden" name="p_id" value="{{$user->p_id}}">
                        <input type="hidden" name="p_name" value="{{$user->p_name}}">
                        <input type="hidden" name="p_price" value="{{$user->p_price}}">
                        <input type="hidden" name="p_image" value="{{$user->image}}">
                        <input type="hidden" name="p_description" value="{{$user->description}}">
                    @endif

                    <input type="submit" value="Order Now" formaction="{{url('/order_now')}}">
                    <input type="submit" value="Add to Cart" formaction="{{url('/add_to_cart')}}">
                    <br><br>
                    <a href="/ask_question/{{$user->p_id}}">Ask Question</a>&nbsp;&nbsp;&nbsp;
                    <a href="/review/{{$user->p_id}}">Review</a>
                </span><br>
            @endforeach
        </form>

    </body>
</html>
