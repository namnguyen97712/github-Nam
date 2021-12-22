@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm món ăn hôm nay ☻
                        </header>

                        
                        <?php 
    $message = Session::get('message');
    if($message){
        echo '<span class = "text-alert">',$message,'</span>' ;
        Session::put('message', null);
    }
    ?>                      <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-food')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}    
                                <div>
                               
                                    <label style="margin-left: 20px;">Chọn ngày: </label>
                                        <div style= "width: 100%; margin: 0px 20px 20px 20px;" id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
                                        <input name="ngay_up_food" class="form-control" readonly="" type="text">
                                         <span style="cursor: pointer;" class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                     $(function () {  
                                    $("#datepicker").datepicker({         
                                    autoclose: true,         
                                    todayHighlight: true 
                                    }).datepicker('update', new Date());
                                    });
                                    </script>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên món ăn</label>
                                    <input type="text" class="form-control" name="ten_mon_an" id="exampleInputEmail1" placeholder="Tên món ăn">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn danh mục món ăn</label>
                                    <select name="id_DM" class="form-control input-lg m-bot15">
                               @foreach($cate_food as $key => $cate)
                                    <option value="{{$cate->id_danh_muc}}">{{$cate->ten_danh_muc}}</option>
                                @endforeach
                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh món ăn</label>
                                    <input type="file" class="form-control" name="file_anh" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá tiền</label>
                                    <select name="gia_tien" class="form-control input-lg m-bot15">
                                <option value="5000">5.000 vnd</option>
                                <option value="7000">7.000 vnd</option>
                                <option value="10000">10.000 vnd</option>
                                <option value="10000">20.000 vnd</option>
                                <option value="10000">25.000 vnd</option>
                                <option value="10000">30.000 vnd</option>
                            </select>
                                </div>
                                <button type="submit" name="add_food" class="btn btn-info">Thêm Món Ăn</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
          
@endsection