<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function ktr_login(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect::to('dashboard');
        }else{
            return redirect::to('admin')->send();
        }

    }
    public function add_category_food(){
        $this->ktr_login();
        return view('admin.add_category_food');
    }
    public function list_category_food(){
        $this->ktr_login();
        $list_category_food = DB::table('tbl-category-food')->get();
        $manager_category_food = view('admin.list_category_food')->with('list_category_food', $list_category_food);
        return view('admin_layout')->with('admin.list_category_food', $manager_category_food);
    }
    public function save_category_food(Request $request){
        $this->ktr_login();
        $data = array();
        $data['ten_danh_muc'] = $request->ten_danh_muc;
        $data['ngay_up'] = $request->ngay_up;
        $data['hien_thi'] = '1';
        DB::table('tbl-category-food')->insert($data);
    
    session::put('message', 'Thêm thành công ☻');
    return redirect::to('add-category-food');
}
public function edit_category_food($id_danh_muc){
    $this->ktr_login();
    $edit_category_food = DB::table('tbl-category-food')->where('id_danh_muc', $id_danh_muc)->get();
    $manager_category_food = view('admin.edit_category_food')->with('edit_category_food', $edit_category_food);
    return view('admin_layout')->with('admin.edit_category_food', $manager_category_food);
}
public function delete_category_food($id_danh_muc){
    $this->ktr_login();
    DB::table('tbl-category-food')->where('id_danh_muc', $id_danh_muc)->delete();
          
    session::put('message', 'Xóa danh mục thành công ☻');
    return redirect::to('list-category-food');
}
public function update_category_food(Request $request, $id_danh_muc){
    $this->ktr_login();
    $data = array();
    $data['ten_danh_muc'] = $request->ten_danh_muc;
    $data['ngay_up'] = $request->ngay_up;
        DB::table('tbl-category-food')->where('id_danh_muc', $id_danh_muc)->update($data);
          
    session::put('message', 'Cập nhật danh mục thành công ☻');
    return redirect::to('add-category-food');
        
}
public function hienthi($id_danh_muc){
    DB::table('tbl-category-food')->where('id_danh_muc', $id_danh_muc)->update(['hien_thi'=>1]);
    session::put('message', 'hiển thị danh mục thành công ☻');
    return Redirect::to('list-category-food');
}
public function an($id_danh_muc){
    DB::table('tbl-category-food')->where('id_danh_muc', $id_danh_muc)->update(['hien_thi'=>0]);
    session::put('message', 'ẩn danh mục thành công ☻');
    return Redirect::to('list-category-food');
}
}