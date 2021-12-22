
<!DOCTYPE html>
<head>
<title>Trang quản lý Click là có cơm ♥</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>

<style>
  * {box-sizing: border-box}
 body{
   font-family: 'Noto Sans JP', sans-serif;
 }
 h1, label{
   color: DodgerBlue;
 }
   input[type=text], input[type=password] {
   width: 100%;
   padding: 15px;
   margin: 5px 0 22px 0;
   display: inline-block;
   border: none;
   width:100%;
   resize: vertical;
   padding:15px;
   border-radius:15px;
   border:0;
   box-shadow:4px 4px 10px rgba(0,0,0,0.2);
 }
input[type=text]:focus, input[type=password]:focus {
   outline: none;
 }
hr {
   border: 1px solid #f1f1f1;
   margin-bottom: 25px;
 }
button {
   background-color: #4CAF50;
   color: white;
   padding: 14px 20px;
   margin: 8px 0;
   border: none;
   cursor: pointer;
   width: 100%;
   opacity: 0.9;
 }
button:hover {
   opacity:1;
 }
.cancelbtn {
   padding: 14px 20px;
   background-color: #f44336;
 }
.signupbtn {
   float: left;
   width: 100%;
   border-radius:15px;
   border:0;
   box-shadow:4px 4px 10px rgba(0,0,0,0.2);
 }
.container {
   padding: 16px;
 }
.clearfix::after {
   content: "";
   clear: both;
   display: table;
 }
</style>

<body>
<form action="{{URL::to('/dang-nhap')}}" method="POST">
{{ csrf_field() }}
   <div class="container">
     <h1 style="text-align: center;">Đăng Nhập User click là có cơm ♥</h1>
     <hr>
    <label><b>Tên Đăng Nhập</b></label>
     <input type="text" placeholder="Nhập Tên Đăng Nhập" name="ten_dang_nhap" >
    <label><b>Mật Khẩu</b></label>
     <input type="password" placeholder="Nhập Mật Khẩu" name="mat_khau" >
    <label>
       <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Nhớ Đăng Nhập<br>
     </label>
     <label style="text-align: center;">  <?php 
    $message = Session::get('message');
    if($message){
        echo '<span class = "text-alert">',$message,'</span>' ;
        Session::put('message', null);
    }
    ?></label>
    <div class="clearfix">
       <button type="submit" class="signupbtn">Đăng Nhập</button>
     </div>
   </div>
 </form>
 <form action="{{URL::to('/dang-ki-user')}}" method="get" >
 <div class="container" style="margin-top: 0px;">
 <div class="clearfix"> <button type="submit" class="signupbtn">Đăng kí</button></div></div>
 </form>
  

</body>