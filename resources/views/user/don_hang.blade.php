@extends('welcome')
@section('content')
<form action="{{URL('/dat-hang')}}" method="post">
    {{ csrf_field()}}
    <center>
        <h2 style="margin-top: 50px;">MỜI BẠN ĐIỀN ĐẦY ĐỦ THÔNG TIN ĐỂ ĐẶT HÀNG</h2>
        <?php
        $hi = Session::get('tongtien');
        $message = Session::get('message');
        if ($message) {
            echo '<span class = "text-alert">', $message, '</span>';
            Session::put('message', null);
        }
        ?>
    </center>

    <div class="form-group" style="width: 800px; margin-left: 250px;margin-top: 10px;">
        <label for="exampleInputEmail1">Họ Và Tên</label>
        <input type="text" class="form-control" name="ho_ten" id="exampleInputEmail1" value="">
    </div>
    <div class="form-group" style="width: 800px; margin-left: 250px;margin-top: 10px;">
        <label for="exampleInputEmail1">Sđt</label>
        <input type="text" class="form-control" name="sdt" id="exampleInputEmail1" value="">
    </div>
    <div class="form-group" style="width: 800px; margin-left: 250px;margin-top: 10px;">
        <select name="calc_shipping_provinces" required="">
            <option value="">Tỉnh / Thành phố</option>
            <option value="">TP Đà Nẵng</option>
        </select>
    </div>
    <div class="form-group" style="width: 800px; margin-left: 250px;margin-top: 10px;">
        <select name="calc_shipping_district" required="">
            <option value="">Quận / Huyện</option>
            <option value="">Quận Ngũ Hành Sơn</option>
        </select>
    </div>
    <div class="form-group" style="width: 800px; margin-left: 250px;margin-top: 10px;">
        <label for="exampleInputEmail1">Số Nhà</label>
        <input type="text" class="form-control" name="so_nha" id="exampleInputEmail1" value="">
    </div>
  
    <center>
    <div class="col-md-4">
        <label for="exampleInputEmail1">
            <h2>Tổng tiền thanh toán: <?php echo $hi; ?></h2>
        </label>
    </div>
        <div class="form-group">
            <input type="submit" onclick="return alert('Đặt hàng thành công')" class="btn btn-success" value="Đặt Hàng!">
        </div>
    </center>
</form>
@endsection