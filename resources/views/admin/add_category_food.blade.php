@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục món ăn hôm nay ☻
                        </header>

                        
                        <?php 
    $message = Session::get('message');
    if($message){
        echo '<span class = "text-alert">',$message,'</span>' ;
        Session::put('message', null);
    }
    ?>                      <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-category-food')}}" method="post">
                                    {{ csrf_field()}}    
                                <div>
                               
                                    <label style="margin-left: 20px;">Chọn ngày: </label>
                                        <div style= "width: 100%; margin: 0px 20px 20px 20px;" id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
                                        <input name="ngay_up" class="form-control" readonly="" type="text">
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
                                    <input type="text" class="form-control" name="ten_danh_muc" id="exampleInputEmail1" placeholder="Tên món ăn">
                                </div>
                                <button type="submit" name="add_food" class="btn btn-info">Đăng lên</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
          
@endsection