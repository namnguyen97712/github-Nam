@extends('welcome')
@section('content')
<?php 
use Illuminate\Support\Facades\Session;
    $foods = Session::get('foods');
?>
<style>
    .chon_mon {
        position: absolute;
        top: 5px;
        right: 5px;

    }

    .tab-mua {
        position: fixed;
        bottom: 0px;
        height: 50px;
        z-index: 1000;
        width: 100%;
        left: 0px;
        background-color: wheat;
    }
    .bg-thanhtoan{
        background-color: wheat;
        padding:20px 30px;
        border: 1px solid wheat;
        border-radius: 10px;
    }
    .btn-xoa{
        position:absolute;
        top: 5px;
        right: 20px;
    }
</style>
<form action="{{URL('/don-hang')}}" method="post">
{{ csrf_field() }}
<div class="container">
    <center>
        <p>
        <h2>Bạn Vừa Chọn</h2>
        </p>
        <p>
        <h3>{{count($foods)}} món ăn</h3>
        </p>
    </center>
    <div class="row">
    <div class="col-md-8">
        <div class="row">
        @php
            $tongtien = 0
        @endphp
        @if(sizeof($foods)==0)
        <center><p>Bạn hãy quay lại <a href="{{URL::to('/trang-chu')}}">Trang Chủ</a> để chọn món</p></center>
        @endif
        @foreach($foods as $food)
        <!-- <p>Tên món ăn : {{$food->ten_mon_an}}</p>
<p><img width="20%" src="{{asset('public/upload/food/'.$food->file_anh)}}"></p>
<p>Giá: {{$food->gia_tien}} </p> -->
        <div class="col-md-4" style="position: relative;">
            <a href="{{URL::to('/xoa-giohang/'.$food->id_mon_an)}}" class="btn btn-danger btn-xoa">x</a>
            <img src="{{asset('public/upload/food/'.$food->file_anh)}}" style="border-radius: 10px;width: 100%;" alt="Steak" height="200px" width="280px">
            <h3 class="mt-2"><b>{{$food->ten_mon_an}}</b></h3>
            <p><span class="h5 text-secondary">{{$food->gia_tien}} VND</span></p>
        </div>
        <?php $tongtien = $tongtien + $food->gia_tien ?>
        @endforeach
        
        </div>
    </div>
    <div class="col-md-4">
        <div class="bg-thanhtoan">
        <div class="h3 text-center"><b>Thanh toán</b></div>
        <div class="h5 mt-4 mb-4">Số món ăn: <span class="float-right"><b>{{count($foods)}}</b> món</span></div>       
        <div class="h5 mt-4 mb-4">Tổng tiền: <span class="float-right"><b>{{$tongtien}}</b> VNĐ</span></div>
        <div class="w-100"><center><button class="btn btn-success">Đặt ngay thôi !</button></center></div>
        </div>
    </div>
    </div>
</div>
</form>
<?php Session::put('tongtien', $tongtien); ?>
@endsection