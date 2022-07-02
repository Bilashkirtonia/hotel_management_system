<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Roomtypeimages;
class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = RoomType::all();
        return view('roomtype.index',compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtype.create');
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
        $datas = new RoomType;
        $datas->title = $request->title;
        $datas->details = $request->details;
        $datas->price = $request->number;
        $datas->save();
        
        foreach($request->file('images') as $imgs){

            $imagePath = $imgs->store('public/imgs');
            $imageData = new Roomtypeimages;		
            $imageData->room_type_id = $datas->id;
            $imageData->img_src = $imagePath;
            $imageData->img_alt = $request->title;
            $imageData->save();
        }
        return redirect('admin/roomtype')->with('success','Data insert successfully');		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shows = RoomType::find($id);
        return view('roomtype.show',compact('shows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = RoomType::find($id);
        return view('roomtype.edit',compact('edit'));
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
        $datas = RoomType::find($id);
        $datas->title = $request->title;
        $datas->details = $request->details;
        $datas->save();
        return redirect('admin/roomtype/'.$id.'/edit')->with('success','Data insert successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        RoomType::where('id',$id)->delete();
        return redirect('admin/roomtype')->with('success','Delete successfully');
            
    }
}
