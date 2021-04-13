<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- /////////////////// -->
<style>
.dropbtn {
  background-color: #ffffff;
  color: #070707;
  padding: 10px;
  font-size: 15px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 160px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 6px 5px;
  text-decoration: none;
  display: block;
}
a{
    text-decoration: none;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<!-- /////////////////// -->
        <title>Document</title>
    </head>
    <body>
    <!-- {{ session('username')}} -->

        <h1>Welcome To Our Website..!</h1>
<a href="/abc.com">Home</a> &nbsp;&nbsp;&nbsp;
<a href="/profile/{{session('username')}}">My Profile</a> &nbsp;&nbsp;&nbsp;
<a href="/show_cart">Add To Cart</a>&nbsp;&nbsp;&nbsp;
<a href="/show_wish">Wish List</a>&nbsp;&nbsp;&nbsp;
<a href="/order_history">Order History</a>&nbsp;&nbsp;&nbsp;
<a href="/contact_us">Contact Us</a>&nbsp;&nbsp;&nbsp;
<!-- /////////////////// -->
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Filter</button>
  <div id="myDropdown" class="dropdown-content">
    <!-- <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()"> -->
    <a href="/best_selling_product">Best Selling Product</a>
    <a href="/low_to_high_price">Low To High Price</a>
    <a href="/high_to_low_price">High To Low Price</a>
  </div>
</div>
<!-- /////////////////// -->
<a href="/logout">Logout</a>
<br><br>
<form action="", method="POST">
@csrf
<input type="text" name="search_product">
<input type="submit" value="search" formaction="{{url('/search_product')}}">
<span style="color: red;">{{session('msg')}}</span>
</form>


    @foreach($users as $user)
        <div style="border:1px solid; width:200px; height:300px; margin-left:10px; margin-right:10px; margin-top:10px; border-radius: 5px; text-align: center; padding:5px; float:left;">
            <a href="/show_product/{{$user['p_id']}}">

                <img src= "{{asset('/upload')}}/{{$user['image']}}" width="190px" height="190px">
                <b>{{$user['p_name']}}</b>
                <div style="width:185px; padding:3px; margin-left:2px; background-color:black; color:white; border-radius: 5px;">
                {{$user['p_price']}}</div>
                {{$user['description']}}<br>
            </a>
        </div>
    @endforeach


<!-- /////////////////////////////// -->
<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
function filterFunction() {
  var input, filter, ul, li, a, i;
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
<!-- /////////////////////////////// -->
    </body>
</html>
