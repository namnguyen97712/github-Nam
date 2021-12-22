<?php

namespace App\Http\Controllers;
Use \Carbon\Carbon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use app\Http\Requests;
use DateTime;
use Illuminate\Support\Facades\Redirect;
session_start();

class FoodController extends Controller
{
    public function ktr_login(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect::to('dashboard');
        }else{
            return redirect::to('admin')->send();
        }

    }
    public function add_food(){
        $this->ktr_login();
        $cate_food = DB::table('tbl-category-food')->orderBy('id_danh_muc','desc')->get();
        return view('admin.add_food')->with('cate_food', $cate_food);
       
    }
    public function list_food(){
        $this->ktr_login();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d');
        $day = date("d",strtotime($date));
        $month = date("m",strtotime($date));
        $year = date("Y",strtotime($date));
        $date_new =$day."-".$month."-".$year;
        $list_food = DB::table('tbl_food')
        ->join('tbl-category-food','tbl-category-food.id_danh_muc','=','tbl_food.id_danh_muc')
        ->where('ngay_up_food','like',$date_new)
        ->orderBy('ngay_up_food','desc')
        ->get();
        return view('admin.list_food')->with(compact('list_food','date'));
    }
    public function save_food(Request $request){
        $this->ktr_login();
        $data = array();
        $data['id_danh_muc'] = $request->id_DM;
        $data['ten_mon_an'] = $request->ten_mon_an;
        $data['gia_tien'] = $request->gia_tien;
        $data['ngay_up_food'] = $request->ngay_up_food;  
        $data['hien_thi_food'] = '1';

        $get_images = $request->file('file_anh');
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        if($get_images){
            $get_name_images = $get_images->getClientOriginalName();
            $name_images = current(explode('.', $get_name_images));
            $new_images = $name_images.'.'.rand(0,99).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('public/upload/food',$new_images);
            $data['file_anh']= $new_images; 
             DB::table('tbl_food')->insert($data);
    
            session::put('message', 'Thêm món ăn thành công ☻');
            return redirect::to('add-food');
        }
        $data['file_anh']= ''; 
        DB::table('tbl_food')->insert($data);
    
    session::put('message', 'Thêm món ăn thành công ☻');
    return redirect::to('list-food');
}
public function edit_food($id_mon_an){
    $this->ktr_login();
    $cate_food = DB::table('tbl-category-food')->orderBy('id_danh_muc','desc')->get();
    
   
    $edit_food = DB::table('tbl_food')->where('id_mon_an', $id_mon_an)->get();
    $manager_food = view('admin.edit_food')->with('edit_food', $edit_food)->with('cate_food', $cate_food);
    return view('admin_layout')->with('admin.edit_food', $manager_food);
}
public function delete_food($id_mon_an){
    $this->ktr_login();
    DB::table('tbl_food')->where('id_mon_an', $id_mon_an)->delete();
          
    session::put('message', 'Xóa món ăn thành công ☻');
    return redirect::to('list-food');
}
public function update_food(Request $request, $id_mon_an){
    $this->ktr_login();
    $data = array();
    $data['id_danh_muc'] = $request->id_DM;
    $data['ten_mon_an'] = $request->ten_mon_an;
    $data['gia_tien'] = $request->gia_tien;
    $data['ngay_up_food'] = $request->ngay_up_food; 
    
    $get_images = $request->file('file_anh');
    if($get_images){
        $get_name_images = $get_images->getClientOriginalName();
        $name_images = current(explode('.', $get_name_images));
        $new_images = $name_images.'.'.rand(0,99).'.'.$get_images->getClientOriginalExtension();
        $get_images->move('public/upload/food',$new_images);
        $data['file_anh']= $new_images; 
         DB::table('tbl_food')->where('id_mon_an',$id_mon_an)->update($data);

        session::put('message', 'cập nhật món ăn thành công ☻');
        return redirect::to('add-food');
    }
    DB::table('tbl_food')->where('id_mon_an',$id_mon_an)->update($data);
    
    session::put('message', 'Cập nhật món ăn thành công ☻');
    return redirect::to('list-food');
        
}
    public function find_food(Request $request){
        $this->ktr_login();
        $data = $request->all();
        // var_dump($data);
        // die();
        $date = $data['day'];
        $day = date("d",strtotime($date));
        $month = date("m",strtotime($date));
        $year = date("Y",strtotime($date));
        $date_new =$day."-".$month."-".$year;
    
        $this->ktr_login();
        $list_food = DB::table('tbl_food')
        ->join('tbl-category-food','tbl-category-food.id_danh_muc','=','tbl_food.id_danh_muc')
        ->where('tbl_food.ngay_up_food','like',$date_new)
        ->orderBy('ngay_up_food','desc')
        ->get();
        
        // $manager_food = view('admin.list_food')->with('list_food', $list_food);
        return view('admin.list_food')->with(compact('list_food','date'));
    }
    public function hienthifood($id_mon_an){
        DB::table('tbl_food')->where('id_mon_an', $id_mon_an)->update(['hien_thi_food'=>1]);
        session::put('message', 'hiển thị món ăn thành công ☻');
        return Redirect::to('list-food');
    }
    public function anfood($id_mon_an){
        DB::table('tbl_food')->where('id_mon_an', $id_mon_an)->update(['hien_thi_food'=>1]);
        session::put('message', 'ẩn món ăn thành công ☻');
        return Redirect::to('list-food');
    }
    public function display(Request $request){
        $idmonan= filter_var($request->idmonan,FILTER_SANITIZE_NUMBER_INT);
        $hien_an= filter_var($request->hien_an,FILTER_SANITIZE_NUMBER_INT);
        $food = DB::table('tbl_food')->where('id_mon_an',$idmonan)->update(array('hien_thi_food'=>$hien_an));
    }
    public function don_hang(){
        return view('user.don_hang');
    }
    public function dat_hang(Request $request){
        $data = array();
        $data['Ho_ten'] = $request->ho_ten;
        $data['sdt'] = $request->sdt;
        $data['dia_chi'] = $request->so_nha;
        // $data['id_taikhoan'] = DB::table('tbl_donhang')
        // ->join('tai_khoan','tai_khoan.id_taikhoan','=','tbl_donhang.id_taikhoan')
        // ->get();
        $data['id_taikhoan'] = Session::get('id_taikhoan');
        $data['tong_tien'] = Session::get('tongtien');
        $data['Ngay_dathang'] = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $data['Gio_dathang'] = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
        DB::table('tbl_donhang')->insert($data);
        session::put('message', 'Đặt hàng thành công ☻');
        return view('user.don_hang');
    }
}
