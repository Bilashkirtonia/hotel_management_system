<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Customre,Booking,Room,RoomType,Service};
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Service::all();
        return view('service.index',compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $datas = Service::all();
        return view('customer.create',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'title'=>'required',
            'small_desc'=>'required',
            'details'=>'required',
   
        ]);
        if($request->hasFile('photo')){
            $image = $request->photo;
           $image_name = time().'.'.$image->getClientOriginalExtension();
           $request->photo->move('service',$image_name);
        }else{
            $image_name=null;
        }
           				
        $datas = new Service;
        //$image = $request->file('photo')->store('public/imgs');
        $datas->title = $request->title;
        $datas->small_desc = $request->small_desc;
        $datas->details_desc = $request->details;
        $datas->photo = $image_name;
        $datas->save();
        $ref = $request->rfe;
        if($ref == 'rfe'){
            return redirect('register')->with('success','successfully'); 
        }
        return redirect('admin/service')->with('success','Data insert successfully');		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shows = Service::find($id);
        return view('service.show',compact('shows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$edits = RoomType::all();
        $edit = Service::find($id);
        return view('customer.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           
        $datas = Service::find($id);
        if($request->hasFile('photo')){
           $image = $request->photo;
           $image_name = time().'.'.$image->getClientOriginalExtension();
           $request->photo->move('service',$image_name);	
            
        }else{
            $image = $request->photo1;	
        }


        $datas->title = $request->title;
        $datas->small_desc = $request->small_desc;
        $datas->details_desc = $request->details_desc;
        $datas->photo = $image;	
        $datas->update();
        return redirect('admin/service/'.$id.'/edit')->with('success','Data insert successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Service::where('id',$id)->delete();
        return redirect('admin/service')->with('success','Delete successfully');
            
    }
    // public function login(){
    //     return view('home.login');
    // }

    // public function customer_login(Request $request){
    //     $email = $request->email;
    //     $password = $request->password;
    //     $login = Customre::where(['email'=>$email,'password'=>$password])->count();

    //     if($login>0){
    //         $login1 = Customre::where(['email'=>$email,'password'=>$password])->get(); 
    //         session(['customerlogin'=>true,'data'=>$login1]);
    //         return redirect('/');
    //     }else{
    //         return redirect('login')->with('error','Invalid email or password');
    //     }

    // }


    // public function register(){
    //     return view('home.register');
    // }
    
    // public function logout(){
    //     session()->forget(['customerlogin','data']);
    //     return redirect('login');
    // }
}
