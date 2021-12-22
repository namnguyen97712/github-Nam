<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class OrderController extends Controller
{
    public function cartview(Request $request){
      $id_mon_an = $request->id_mon_an;
    
    if(Session::get('id_mon_an')===NULL){
      Session::put('id_mon_an',$id_mon_an);
      $mon_an= Session::get('id_mon_an');
     }
     else{
      $mon_an= Session::get('id_mon_an');
     }
     
      $foods = array();
      
      
      if(isset($mon_an) || sizeof($mon_an)==0){     
      for($i=0;$i<sizeof($mon_an);$i++){
        if(isset($mon_an[$i])){
            $food= DB::table('tbl_food')->where('id_mon_an',$mon_an[$i])->first();
             $foods[]=$food;
        }
        
      }
      Session::put('foods',$foods);
      return view('pages.giohang');
    }
    else{
        return redirect()->to('/trang-chu');
    }
    }
    public function cartdelete($id){
        
        $id_mon_an = Session::get('id_mon_an');
        $max = sizeof($id_mon_an)-1;
        $final_item = $id_mon_an[$max];
        for($i=0;$i<sizeof($id_mon_an);$i++){
            if($id_mon_an[$i] == $id){
                $tmp =  $id_mon_an[$i];
                $id_mon_an[$i] = $final_item;
                $id_mon_an[$max] = $tmp;
                
            }
        }
        unset($id_mon_an[$max]);
        
        Session::put('id_mon_an',$id_mon_an);
        return redirect()->back();      
    }
    public function donhang_admin(){
      $donhangadmin = DB::table('tbl_donhang')
      ->orderBy('Ngay_dathang','desc')
      ->get();
      return view('user.donhang_admin')->with(compact('donhangadmin'));
    }
    public function nhan_donhang(){

    }
    public function huy_donhang(){
      
    }
}
