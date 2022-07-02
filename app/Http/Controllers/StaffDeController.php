<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;
use App\Models\Staff_payment;
class StaffDeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Staff::all();
        return view('staff.index',compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $datas = Department::all();
        return view('staff.create',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return view('roomtype.store');
           $image = $request->photo;
           $image_name = time().'.'.$image->getClientOriginalExtension();
           $request->photo->move('Department',$image_name);	
           					
        $datas = new Staff;
        $datas->fullname = $request->fullname;
        $datas->department_id = $request->staff_id;
        $datas->bio = $request->bio;
        $datas->salary_type = $request->salary_type;
        $datas->salary_amt = $request->salary_amt;
        $datas->photo = $image_name;
        $datas->save();
        return redirect('admin/staff')->with('success','Data insert successfully');		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shows = Staff::find($id);
        return view('staff.show',compact('shows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edits = Department::all();
        $edit = Staff::find($id);
        return view('staff.edit',compact('edit','edits'));
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
        $datas = Staff::find($id);
        if($request->hasFile('photo')){
            $image = $request->photo;
           $image_name = time().'.'.$image->getClientOriginalExtension();
           $request->photo->move('Department',$image_name);	
        }else{
            $image_name= $request->pre_photo;
        }
        
        $datas->fullname = $request->fullname;
        $datas->department_id = $request->staff_id;
        $datas->bio = $request->bio;
        $datas->salary_type = $request->salary_type;
        $datas->salary_amt = $request->salary_amt;
        $datas->photo = $image_name;
        $datas->save();
        return redirect('admin/staff')->with('success','Data insert successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Staff::where('id',$id)->delete();
        return redirect('admin/staff')->with('success','Delete successfully');
            
    }
    
    public function payment_add($staff_id)
    {   
        return view('staff.payment_add',['staff_id'=>$staff_id]);
            
    }

    public function payment_show(Request $request, $staff_id)
    {   
        $payment = new Staff_payment;
        $payment->staff_id = $staff_id;
        $payment->mount = $request->amount;
        $payment->payment_date = $request->date;
        $payment->save();
        return redirect('admin/staff')->with('success','Delete successfully');
             
    }
    public function show_payment($staff_id)
    {   
        $shows = Staff_payment::where('staff_id',$staff_id)->get();
        $staff = Staff::find($staff_id);

        return view('staff.show_payment',['staff_id'=>$staff_id,'shows'=>$shows,'staff'=>$staff]);
            
    }

    public function destroy_payment($id,$staff_id)
    { 
        //return ("bilash");  
       
        Staff_payment::where('staff_id',$staff_id)->delete();
        return redirect('admin/staff')->with('success','Delete successfully');
           
    }
}
