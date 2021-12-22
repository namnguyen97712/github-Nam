@extends('admin_layout')
@section('admin_content')
<?php Use \Carbon\Carbon; 
      $ngay = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách các đơn hàng Hôm Nay
    </div>

    <?php
    $message = Session::get('message');
    if ($message) {
      echo '<span class = "text-alert">', $message, '</span>';
      Session::put('message', null);
    }

    ?>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>stt</th>
            <th>Họ Tên</th>
            <th>Địa chỉ</th>
            <th>Sđt</th>
            <th>Tông tiền</th>
            <th>Ngày Đặt</th>
            <th>Giờ đặt</th>
            <th>Tình Trạng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($donhangadmin as $key => $donhang)
        @if($donhang->Ngay_dathang == $ngay)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{($donhang->id_donhang)}}</td>
            <td>{{($donhang->Ho_ten)}}</td>          
            <td>{{($donhang->dia_chi)}}</td>
            <td>{{($donhang->sdt)}}</td>
            <td>{{($donhang->tong_tien)}}</td>        
            <td><span class="text-ellipsis">{{$donhang->Ngay_dathang}}</span></td>
            <td>{{($donhang->Gio_dathang)}}</td>
            <td>
              <a href="{{URL::to('/nhan-donhang/'.$donhang->id_taikhoan)}}" class="active styling-edit" ui-toggle-class="">
                <i style="font-size: 20px;" class="	fa fa-check-square text-success text-active"></i></a>
              <a onclick="return confirm('bạn có muốn hủy đơn hàng này?')" href="{{URL::to('/huy-donhang/'.$donhang->id_taikhoan)}}" class="active styling-edit" ui-toggle-class="">
                <i style="font-size: 20px;" class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
        
        
          @elseif(sizeof($donhangadmin)==0)   
          <tr class="p-3">
            <td class="text-center" colspan="7">Không có món ăn nào vào ngày này</td>
          </tr>     
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection