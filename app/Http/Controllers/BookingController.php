<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Customre,Booking,Room,RoomType};

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Booking::all();
        $show2 = Room::all();
        return view('booking.index',compact('shows','show2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = Customre::all();
        return view('booking.create',['datas'=>$data]);
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
            'customer_id'=>'required',
            'room_id'=>'required',
            'checking_date'=>'required',
            'checkout_date'=>'required',
            'totall_adults'=>'required',
            'totall_child'=>'required',
   
        ]);
        //    $image = $request->photo;
        //    $image_name = time().'.'.$image->getClientOriginalExtension();
        //    $request->photo->move('images',$image_name);
        

            // $sessionData=[
            //     'customer_id'=>$request->customer_id,
            //     'room_id'=>$request->room_id,
            //     'checkin_date'=>$request->checkin_date,
            //     'checkout_date'=>$request->checkout_date,
            //     'total_adults'=>$request->total_adults,
            //     'total_children'=>$request->total_children,
            //     'roomprice'=>$request->roomprice,
            //     'ref'=>$request->ref
            // ];
            // session($sessionData);
            \Stripe\Stripe::setApiKey('sk_test_51JKcB7SFjUWoS3CIIaPlxPSREpJYoyPsn5KIhj2CBCM9z23dRUreOUwFq6eXmRYmgXNfxSozplocikiAFe3aX7sK008OH0sqy6');
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                  'price_data' => [
                    'currency' => 'inr',
                    'product_data' => [
                      'name' => 'T-shirt',
                    ],
                    'unit_amount' =>20000,
                  ],
                  'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost/Hotel_Management_system/booking/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://localhost/Hotel_Management_system/booking/fail',
            ]);
            return redirect($session->url);
      



        $datas = new Booking;
        $datas->customer_id = $request->customer_id;
        $datas->room_id = $request->room_id;
        $datas->checking_date = $request->checking_date;
        $datas->checkout_date = $request->checkout_date;
        $datas->totall_adults = $request->totall_adults;
        $datas->totall_child = $request->totall_child;
        $datas->save();

        if($request->booking == 'booking_room'){
            return redirect('booking')->with('success','Room booking successfully');
        }
        return redirect('admin/booking')->with('success','Data insert successfully');
        
        		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shows = Booking::find($id);
        return view('booking.show',compact('shows'));
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
        $edit = Booking::find($id);
        return view('booking.edit',compact('edit'));
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
           
        $datas = Booking::find($id);
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
        return redirect('admin/booking/'.$id.'/edit')->with('success','Data insert successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Booking::where('id',$id)->delete();
        return redirect('admin/booking')->with('success','Delete successfully');
            
    }

    public function avabil_room(Request $request,$check_date)
    {   
        $arooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$check_date' BETWEEN checking_date AND checkout_date)");
        

        $data=[];
        foreach($arooms as $room){
            $roomtype = RoomType::find($room->room_type_id);
            $data[]=['room'=>$room,'roomtype'=>$roomtype];

        }
        return response()->json(['data'=>$data]);
            
    }

    public function booking_room()
    {   
        
        return view('home.booking');     
    }

    function booking_payment_success(Request $request){
        \Stripe\Stripe::setApiKey('sk_test_51JKcB7SFjUWoS3CIIaPlxPSREpJYoyPsn5KIhj2CBCM9z23dRUreOUwFq6eXmRYmgXNfxSozplocikiAFe3aX7sK008OH0sqy6');
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        $customer = \Stripe\Customer::retrieve($session->customer);
        dd($session);
        echo 'success';

        // if($session->payment_status=='paid'){
        //     // dd(session('customer_id'));
        //     $data=new Booking;
        //     $data->customer_id=session('customer_id');
        //     $data->room_id=session('room_id');
        //     $data->checkin_date=session('checkin_date');
        //     $data->checkout_date=session('checkout_date');
        //     $data->total_adults=session('total_adults');
        //     $data->total_children=session('total_children');
        //     if(session('ref')=='front'){
        //         $data->ref='front';
        //     }else{
        //         $data->ref='admin';
        //     }
        //     $data->save();
        //     return view('booking.success');
        // }
    }

    function booking_payment_fail(Request $request){
        //return view('booking.failure');
        // dd($request);
        // echo "fail";

    }
}




