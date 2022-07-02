<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customre;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Customre::all();
        return view('customer.index',compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $datas = Customre::all();
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
            'fullname'=>'required',
            'email'=>'required',
            'password'=>'required',
            'mobile'=>'required',
            'address'=>'required',
   
        ]);
        if($request->hasFile('photo')){
            $image = $request->photo;
           $image_name = time().'.'.$image->getClientOriginalExtension();
           $request->photo->move('images',$image_name);
        }else{
            $image_name=null;
        }
           				
        $datas = new Customre;
        //$image = $request->file('photo')->store('public/imgs');
        $datas->full_name = $request->fullname;
        $datas->email = $request->email;
        $datas->password = $request->password;
        $datas->mobile = $request->mobile;
        $datas->address = $request->address;
        $datas->photo = $image_name;
        $datas->save();
        $ref = $request->rfe;
        if($ref == 'rfe'){
            return redirect('register')->with('success','successfully'); 
        }
        return redirect('admin/customer')->with('success','Data insert successfully');		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shows = Customre::find($id);
        return view('customer.show',compact('shows'));
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
        $edit = Customre::find($id);
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
           
        $datas = Customre::find($id);
        if($request->hasFile('photo')){
           $image = $request->photo;
           $image_name = time().'.'.$image->getClientOriginalExtension();
           $request->photo->move('images',$image_name);	
            
        }else{
            $image = $request->photo;	
        }


        $datas->full_name = $request->fullname;
        $datas->email = $request->email;
        $datas->mobile = $request->mobile;
        $datas->address = $request->address;
        $datas->photo = $image;	
        $datas->update();
        return redirect('admin/customer/'.$id.'/edit')->with('success','Data insert successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Customre::where('id',$id)->delete();
        return redirect('admin/customer')->with('success','Delete successfully');
            
    }
    public function login(){
        return view('home.login');
    }

    public function customer_login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $login = Customre::where(['email'=>$email,'password'=>$password])->count();

        if($login>0){
            $login1 = Customre::where(['email'=>$email,'password'=>$password])->get(); 
            session(['customerlogin'=>true,'data'=>$login1]);
            return redirect('/');
        }else{
            return redirect('login')->with('error','Invalid email or password');
        }

    }


    public function register(){
        return view('home.register');
    }
    
    public function logout(){
        session()->forget(['customerlogin','data']);
        return redirect('login');
    }
}
