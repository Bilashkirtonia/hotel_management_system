<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Banner::all();
        return view('banner.index',compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $datas = Banner::all();
        return view('banner.create',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->banner_src;
        $image = time().'.'.$img->getClientOriginalExtension();
        $request->banner_src->move('banner',$image);

        $datas = new Banner;
        $datas->banner_src = $image;		
        $datas->alt_text = $request->alt_src;
        $datas->banner_states = $request->banner_status;
        $datas->save();
        return redirect('admin/banner')->with('success','Data insert successfully');		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shows = Banner::find($id);
        return view('banner.show',compact('shows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //$edits = Banner::all();
        $edit = Banner::find($id);
        return view('banner.edit',compact('edit'));

        

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
        if($request->hasFile('banner_src1')){
            $img = $request->banner_src;
            $image = time().'.'.$img->getClientOriginalExtension();
            $request->banner_src1->move('banner',$image);
        }else{
            $image = $request->banner_src;
        }
        

        $datas = Banner::find($id);
        $datas->banner_src = $image;		
        $datas->alt_text = $request->alt_src;
        $datas->banner_states = $request->banner_states;
        $datas->save();
        return redirect('admin/banner')->with('success','Data insert successfully');

        //return redirect('admin/banner/'.$id.'/edit')->with('success','Data insert successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Banner::where('id',$id)->delete();
        return redirect('admin/banner')->with('success','Delete successfully');
            
    }
}
