<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserController extends Controller
{
    public function ktr_login(){
        $id_taikhoan = session::get('id_taikhoan');
        if($id_taikhoan){
            return redirect::to('/trang-chu');
        }else{
            return redirect::to('/login-user')->send();
        }

    }
    public function login_user(){
        return view('login_user');
    }
    public function dang_ki_user(){
        return view('user.dang_ki');
    }
    public function dang_nhap(Request $request){
        // $this->ktr_login();
        $ten_dang_nhap = $request->ten_dang_nhap;
        $mat_khau = md5($request->mat_khau);
        $result = DB::table('tai_khoan')->where('ten_dang_nhap', $ten_dang_nhap)->where('mat_khau', $mat_khau)->first();
        if($result){
            Session::put('Ho_ten', $result->Ho_ten);
            Session::put('id_taikhoan', $result->id_taikhoan);
            return redirect::to('/trang-chu');
        }else{
            Session::put('message','Sai mật khẩu hoặc tài khoản, Mời bạn nhập lại');
            return view('login_user');
        } 
    }
    public function dang_ki(Request $request){
        $data = array();
        $data['Ho_ten'] = $request->Ho_ten;
        $data['dia_chi'] = $request->dia_chi;
        $data['sdt'] = $request->sdt;
        $data['ten_dang_nhap'] = $request->ten_dang_nhap;
        $data['mat_khau'] = md5($request->mat_khau);
        DB::table('tai_khoan')->insert($data);
        Session::put('message','Bạn đã đăng kí thành công mời bạn đăng nhập');
            return redirect::to('login-user');
        } 
    public function dang_xuat(){
            $this->ktr_login();
            session::remove('id_taikhoan');
          return Redirect::to('login-user');
        }
    
}
