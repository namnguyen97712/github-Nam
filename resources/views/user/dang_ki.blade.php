<!DOCTYPE html>
<head>
<title>Đăng kí user</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href='https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap' rel='stylesheet' type='text/css'>


<link href="{{asset('public/fontend/css/dang_ki_user.css')}}" rel="stylesheet"> 
<body>
<form action="{{URL::to('/dang-ki')}}" method="post" >
{{ csrf_field() }}
   <div class="container">
       <div style="text-align: center;">
     <h1>Đăng Ký User click là có cơm ♥</h1>
     <p>Xin hãy nhập biểu mẫu bên dưới để đăng ký.</p></div>
     <hr>
     <label for="psw-repeat"><b>Họ tên</b></label>
     <input type="text" placeholder="Họ và tên" name="Ho_ten" required>
     <label for="psw-repeat"><b>Địa chỉ</b></label>
     <input type="text" placeholder="Địa chỉ cụ thể" name="dia_chi" required>
     <label for="psw-repeat"><b>Số điện thoại</b></label>
     <input type="text" placeholder="Số điện thoại" name="sdt" required>
    <label for="email"><b>Tên đăng nhập</b></label>
     <input type="text" placeholder="Tên đăng nhập" name="ten_dang_nhap" required>
    <label for="psw"><b>Mật Khẩu</b></label>
     <input type="password" placeholder="Nhập Mật Khẩu" name="mat_khau" required>
    
    <label>
       <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Nhớ Đăng Nhập
     </label>
    <div class="clearfix">
       <button type="submit" class="signupbtn">Đăng kí</button>
     </div>
   </div>
 </form>
 </body>