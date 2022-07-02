<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Roomtypeimages;
use App\Models\{Service,Testimonial,Banner};
class HomeController extends Controller
{
    public function index(){
        $service = Service::all();
        $testimonial = Testimonial::all();
        $banner = Banner::where('banner_states','on')->get();
        return view("home.index",['service'=>$service,'testimonial'=>$testimonial,'banner'=>$banner]);
    }

    public function service($id){
        $all_service = Service::find($id);
        return view("home.service",['all_service'=>$all_service]);
    }

    public function testimonial(){
        //$all_service = Service::find($id);
        return view("home.testimonal");
    }
//		
    public function save_testimonial(Request $request){
       $data_id = session('data')[0]->id;
       $data = new Testimonial;
       $data->testimonial_id = $data_id;
       $data->testi_desc=$request->textimonial;
       $data->save();
       return redirect('testimonial')->with('success','insert successfully');
         
    }
    // public function testimonial(){
    //     //$all_service = Service::find($id);
    //     return view("home.testimonal");
    // }
}
