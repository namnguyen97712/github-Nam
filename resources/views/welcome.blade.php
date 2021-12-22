<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="../public/fontend/css/stylehome.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--Bootsrap 4 CDN-->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<style>

@import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap');

	* {
		font-family: 'Lora', serif !important;
	}
	html {
  scroll-behavior: smooth;
}
	.carousel-item {
		position: relative;

	}

	.hihi {
		position: absolute;
	}

	div.main {
		width: 100%;
		height: 100%;
		background-image: url('{{('public/fontend/images/background.jpg')}}') !important;
		background-repeat: no-repeat;
		background-size: cover;
	

	}

	div.main3 {
		background-image: url('{{('public/fontend/images/truottruot.jpg')}}') !important;
		position: relative;
        opacity: 1;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
	}
	/* body, h1, h2, h3, h4, h5, h6 {
	font-family: "Karma", sans-serif
	
} */

	.w3-bar-block .w3-bar-item {
		padding: 20px
	}
</style>
<body>
	<!-- đây là phần header -->
	<div class="main">
		<!-- <img src="IMAGES/background.jpg" class = "hihi" style="height: 800px;width: 100%;">  -->
		<nav class="navbar navbar-expand-lg navbar-light panel panel-primary panel-transparent" style="background-color: transparent;">
			<a class="navbar-brand" href="{{URL::to('/trang-chu')}}"><img src="{{('public/fontend/images/vku.png')}}" alt="icon" style="height: 70px;width: 200px;border-radius:20px;border:1px solid burlywood"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse navbars" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li>
						<input type="text" class="form-control search" placeholder=" Search">						
					</li>
					<li>
						<input type="submit" class="btn btn-success">						
					</li>
					<li class="nav-item dropdown ">
						<a class="nav-link" href="thucdon.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuLink">Thực Đơn</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="thucdont2.html">Thứ 2</a>
							<a class="dropdown-item" href="thucdont3.html">Thứ 3</a>
							<a class="dropdown-item" href="thucdont4.html">Thứ 4</a>
							<a class="dropdown-item" href="thucdont5.html">Thứ 5</a>
							<a class="dropdown-item" href="thucdont6.html">Thứ 6</a>
							<a class="dropdown-item" href="thucdont7.html">Thứ 7</a>
							<a class="dropdown-item" href="thucdontcn.html">Thứ CN</a>
						</div>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="lienhe.html">Liên Hệ</a>
					</li>
					<li class="nav-item">
						<div class="top-nav clearfix">
							<!--search & user info start-->
							<ul class="nav pull-right top-menu">

								<!-- user login dropdown start-->
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#">
										<img alt="" style="height: 40px;width: 40px; border-radius: 50%;" src="{{('public/backend/images/khanh_dung1.png')}}">
										<span class="username">
											<?php
											$name = Session::get('Ho_ten');
											$id = Session::get('id_taikhoan');
											if ($name) {
												echo $name;							
											}
											?>

										</span>
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu extended logout">
										<li><a href="{{URL::to('/dang-xuat')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
									</ul>
								</li>
								<!-- user login dropdown end -->

							</ul>
							<!--search & user info end-->
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<div class="main2">
			<div id="myCarousel" class="carousel slide border" data-ride="carousel" style="width: 90%;border-radius: 20px; margin-left: 70px;">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img style="width: 1150px; height: 650px;border-radius: 20px" class="d-block w-100" src="{{('public/fontend/images/slide.png')}}" alt="Leopard">
					</div>
					<div class="carousel-item">
						<img style="width: 1150px; height: 650px;border-radius: 20px" class="d-block w-100" src="{{('public/fontend/images/slide1.jpg')}}" alt="Cat">
					</div>
					<div class="carousel-item">
						<img style="width: 1150px; height: 650px;border-radius: 20px" class="d-block w-100" src="{{('public/fontend/images/slide3.jpg')}}" alt="Lion">
					</div>
				</div>
				<!-- Controls -->
				<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<!-- !PAGE CONTENT! -->
	<div class="main3">
		<form action="{{URL('/combongon')}}" method="POST">
			<div class="bg">
				<div class="chaychay" style="background-color: wheat;padding-top:10px;border-bottom: 1px dashed #ccc;" >
					<marquee behavior="alternate" style="border:dashe 1px ; font-size: large; font-weight: bold;"> CLICK LÀ CÓ CƠM XIN KÍNH CHÀO QUÝ KHÁCH!!</marquee>
				</div>
				<div style="text-align: center;padding:40px 0px;background-color: wheat;width: 50%;">
					<h1>COMBO CƠM NGON</h1>
					<!-- <input type="radio" name="k" value="male" checked> 20.000 VND (MIỄN PHÍ 2 KẸO SINGUM)<br>
					<input type="radio" name="k" value="female"> 25.000 VND (MIỄN PHÍ 1 CHAI COCACOLA)<br>
					<input type="radio" name="k" value="other"> 30.000 VND (MIỄN PHÍ 2 KẸO SINGUM + 1 CHAI COCACOLA)<br><br> -->
					<p><a class="text-dark text-decoration-none" href="#12">20.000 VND (MIỄN PHÍ 2 KẸO SINGUM)</a></p>
					<p><a class="text-dark text-decoration-none" href="#13">25.000 VND (MIỄN PHÍ 1 CHAI COCACOLA)</a></p>
					<p><a class="text-dark text-decoration-none"  href="#14">30.000 VND (MIỄN PHÍ 2 KẸO SINGUM + 1 CHAI COCACOLA)</a></p>
					<!-- <input type="submit" name="submit" class="btn btn-success" value="CHỌN"> -->
				</div>
			</div>

		</form>
	</div>
	<div class="col- sm- 9 padding- ringht">
		@yield('content')
	</div>									
	<!-- Footer -->
	<footer class="w3-row-padding w3-padding-32">
		<div class="w3-third" style="text-align: center;">
			<h3>ĐỊA CHỈ</h3>
			<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7671.392368063978!2d108.25285575289931!3d15.977234625773589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421084250439e9%3A0x9b8e9f1a0f1a0ea0!2zTmFtIEvhu7MgS2jhu59pIE5naMSpYSwgS2h1IMSRw7QgdGjhu4sgRlBUIENpdHksIEjDsmEgSOG6o2ksIE5nxakgSMOgbmggU8ahbiwgxJDDoCBO4bq1bmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1636073792247!5m2!1svi!2s" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
			<p>
				465 Trần đại nghĩa, phường hòa<br> hải, quận ngũ hành sơn thành<br> phố đà nẵng</a>
			</p>
		</div>

		<div class="w3-third" style="text-align: center;">
			<h3>PAGE</h3>
			<ul class="w3-ul w3-hoverable">
				<a href="https://www.facebook.com/groups/679333575986969" class="text-decoration-none text-dark"> PAGE BÁN CƠM XINH XINH
					<img src="{{('public/fontend/images/AVT2.jpg')}}" class="w3-left w3-margin-right" style="width: 300px; height: 250px; margin-left: 55px;border-radius: 10px;"> </a>
			</ul>
		</div>

		<div class="w3-third w3-serif" style="text-align: center;">
			<h3>TAGS</h3>
			<p>
				<span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New
					York</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span>
				<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
			</p>
			<h3>LIÊN HỆ</h3>
			<li>gmail: chiecluocnga0199789@gmail.com</li>
			<li>sdt: 0836960015 - 0877157717</li>
		</div>
	</footer>

	<!-- End page content -->
	</div>

	<script>
		// Script to open and close sidebar
		function w3_open() {
			document.getElementById("mySidebar").style.display = "block";
		}

		function w3_close() {
			document.getElementById("mySidebar").style.display = "none";
		}
	</script>
	<form action="" method="POST" role="form" enctype="multipart/form-data"></form>

</body>

</html>