@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa món ăn ☻
                        </header>

                        
                        <?php 
    $message = Session::get('message');
    if($message){
        echo '<span class = "text-alert">',$message,'</span>' ;
        Session::put('message', null);
    }
    ?>
                             <div class="panel-body">
                                 @foreach($edit_category_food as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-food/'.$edit_value->id_danh_muc)}}" method="post">
                                    {{ csrf_field()}}    
                                <div>
                               
                                    <label style="margin-left: 20px;">Chọn ngày: </label>
                                        <div style= "width: 100%; margin: 0px 20px 20px 20px;" id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
                                        <input name="ngay_up" value="{{$edit_value->ngay_up}}" class="form-control" readonly="" type="text">
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
                                    <label for="exampleInputEmail1">Tên danh mục món ăn</label>
                                    <input type="text" value="{{$edit_value->ten_danh_muc}}" class="form-control" name="ten_danh_muc" id="exampleInputEmail1" placeholder="Tên món ăn">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Giá tiền</label>
                                    <select name="gia_tien" class="form-control input-lg m-bot15">
                                <option value="5000">5.000 vnd</option>
                                <option value="7000">7.000 vnd</option>
                                <option value="10000">10.000 vnd</option>
                            </select>
                                </div> -->
                                <button type="submit" name="edit_food" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach            
                        </div>
                    </section>

            </div>
          
@endsection