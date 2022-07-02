<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class StaffController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Department::all();
        return view('department.index',compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
        $datas = new Department;
        $datas->title = $request->title;
        $datas->details = $request->details;
        // $datas->price = $request->number;
        $datas->save();
        
        // foreach($request->file('images') as $imgs){

        //     $imagePath = $imgs->store('public/imgs');
        //     $imageData = new Roomtypeimages;		
        //     $imageData->room_type_id = $datas->id;
        //     $imageData->img_src = $imagePath;
        //     $imageData->img_alt = $request->title;
        //     $imageData->save();
        // }
        return redirect('admin/department')->with('success','Data insert successfully');		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shows = Department::find($id);
        return view('department.show',compact('shows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Department::find($id);
        return view('department.edit',compact('edit'));
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
        $datas = Department::find($id);
        $datas->title = $request->title;
        $datas->details = $request->details;
        $datas->save();
        return redirect('admin/department/'.$id.'/edit')->with('success','Data insert successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Department::where('id',$id)->delete();
        return redirect('admin/department')->with('success','Delete successfully');
            
    }
}
