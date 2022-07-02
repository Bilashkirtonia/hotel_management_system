<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Testimonial;
use Cookie;


class AdminController extends Controller
{
    public function login(){
        return view('login');
    }
    public function check_login(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $admin = Admin::where(['username'=>$request->email,'password'=>sha1($request->password)])->count();
        if($admin>0){           
        $adminData = Admin::where(['username'=>$request->email,'password'=>sha1($request->password)])->get();
            session(['adminData'=>$adminData]);
            if($request->has('checkedme')){
                Cookie::queue('adminuser',$request->email,1440);
                Cookie::queue('adminpass',$request->password,1440);
            }
            return redirect('admin/login2');
        }else{
            return redirect('admin/login')->with('message','Invaild password');
        }
    }
    function check_login2(){
        return view('check_login');
    }
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }

    function admin_testimonial(){  
        $testimonial=Testimonial::all();
        return view('.admin_testimonial',['testimonial'=>$testimonial]);
    }
    public function destroy($id)
    {   
        Testimonial::where('id',$id)->delete();
        return redirect('admin/testimonial')->with('success','Delete successfully');
            
    }
}
