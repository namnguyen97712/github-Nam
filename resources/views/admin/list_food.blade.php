@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách các món ăn
      @php
      $date_now=date('Y-m-d');
      if($date_now ==$date){
      echo "ngày hôm nay";
      }
      else{
      $day = date("d",strtotime($date));
      $month = date("m",strtotime($date));
      $year = date("Y",strtotime($date));
      echo "Ngày ".$day." Tháng ".$month." Năm ".$year;
      }
      @endphp
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
        <form action="{{URL::to('/date')}}" method="POST">
          {{ csrf_field()}}
          <input type="date" max="{{$date_now}}" name="day" value="{{$date}}">
          <button type="submit" class="btn btn-sm btn-default">Tìm</button>
        </form>
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
            <th>danh mục Món ăn</th>
            <th>Tên Món ăn</th>
            <th>Hình ảnh Món ăn</th>
            <th>Giá Món ăn</th>
            <th>Ngày đăng món ăn</th>
            <th>Sửa/xóa</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @if(sizeof($list_food)==0)
          <tr class="p-3">
            <td class="text-center" colspan="7">Không có món ăn nào vào ngày này</td>
          </tr>
          @else
          @foreach($list_food as $key => $list_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{($list_pro->ten_danh_muc)}}</td>
            <td>{{($list_pro->ten_mon_an)}}</td>
            <td><img src="public/upload/food/{{$list_pro->file_anh}}" height=100px; width=100px;></td>
            <td>{{($list_pro->gia_tien)}}</td>
            <td><span class="text-ellipsis">{{$list_pro->ngay_up_food}}</span></td>
            <td>
              <a href="{{URL::to('/edit-food/'.$list_pro->id_mon_an)}}" class="active styling-edit" ui-toggle-class="">
                <i style="font-size: 20px;" class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('bạn có muốn xóa món ăn này?')" href="{{URL::to('/delete-food/'.$list_pro->id_mon_an)}}" class="active styling-edit" ui-toggle-class="">
                <i style="font-size: 20px;" class="fa fa-times text-danger text"></i></a>
            </td>
            <td><span class="text-ellipsis">
                <form>
                  @csrf
                  <select class="hien_an form-control" data-tenmonan="{{$list_pro->ten_mon_an}}" 
                  data-idmonan="{{$list_pro->id_mon_an}}" name="an_hien">
                    @if($list_pro->hien_thi_food==0) 
                    <option selected value="0">Ẩn </option>
                    <option value="1">Hiện</option>
                    @else
                    <option  value="0">Ẩn </option>
                    <option selected value="1">Hiện</option>
                    @endif
                  </select>
                </form>
              </span></td>
          </tr>
          @endforeach
          @endif
          <script type="text/javascript">
                    $('.hien_an').change(function(event) {
                        const hien_an = $(this).val();
                        const idmonan = $(this).data('idmonan');
                        var _token = $('input[name="_token"]').val();
                        const tenmonan= $(this).data('tenmonan');
                        // alert(hien_an);
                        $.ajax({
                            url: "{{url('/hien-an-mon-an')}}",
                            method:"POST",
                            data:{hien_an:hien_an,tenmonan:tenmonan,idmonan:idmonan, _token:_token},
                            success:function(data){
                                alert('Đã thay đổi mục hiển thị của '+tenmonan);
                            }
                        });
                    });
                </script>
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