<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

use Illuminate\Support\Facades\Session;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function ktr_login(){
        $admin_id = session::get('admin_id');
        if($admin_id){
            return redirect::to('dashboard');
        }else{
            return redirect::to('admin')->send();
        }

    }

    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->ktr_login();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if($result){
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return redirect::to('/dashboard');
        }else{
            Session::put('message','Sai mật khẩu hoặc tài khoản, Mời bạn nhập lại');
            return redirect::to('/admin');
        } 

       
    }
    public function log_out(){
        $this->ktr_login();
        session::remove('admin_id');
      return Redirect::to('/admin');
    }
}
