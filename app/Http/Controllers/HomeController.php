<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function ktr_login(){
        $id_taikhoan = session::get('id_taikhoan');
        if($id_taikhoan){
            return redirect::to('/trang-chu');
        }else{
            return redirect::to('/login-user')->send();
        }

    }
    public function index(){
        $this->ktr_login();
        
  
        $category = DB::table('tbl-category-food')->where('hien_thi','1')->orderBy('id_danh_muc')->get();
        $foods = DB::table('tbl_food')->orderBy('id_mon_an')->where('hien_thi_food','1')->get();
        Session::forget('id_mon_an');
        return view('pages.home')->with(compact('category','foods'));
    }
}
