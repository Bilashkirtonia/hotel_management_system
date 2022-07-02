
@extends('home.fornt_layout')
@section('content')
<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 my-5">Room booking</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <form action="{{ url('admin/booking') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    {{-- <tr>
                            <th>Select customer <span class="text-danger">*</span></th>
                            <td>
                               <select name="customer_id" class="form-control">
                                <option value="">---Select customer---</option>
                                @foreach ($datas as $customer)
                                 <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                                @endforeach
                               </select>
                            </td>
                    </tr> --}}
                    <tr>
                        <th>Checking_date <span class="text-danger">*</span></th>
                        <td>
                           <input type="date" class="form-control checking_date" name="checking_date">
                        </td>
                    </tr>
                    <tr>
                        <th>Checkout_date <span class="text-danger">*</span></th>
                        <td>
                           <input type="date" class="form-control" name="checkout_date">
                        </td>
                    </tr>
                    <tr>
                        <th>Avabil room <span class="text-danger">*</span></th>
                        <td>
                            <select name="room_id" class="form-control room_list">
                                <option value="">---Select room ---</option>
                                
                            </select>
                            <p>Price : <span class="show-room-price"></span></p>
                        </td>
                    </tr>
                    <tr>
                        <th>Totall adults <span class="text-danger">*</span></th>
                        <td>
                           <input type="nunber" class="form-control" name="totall_adults">
                        </td>
                    </tr>
                    <tr>
                        <th>Totall child</th>
                        <td>
                           <input type="number" class="form-control" name="totall_child">
                        </td>
                    </tr>
                    <tr>
                        
                        <td>
                            <input type="hidden" name="customer_id" value="{{ session('data')[0]->id }}">
                            <input type="hidden" name="booking_price" value="">
                            <input type="hidden" name="booking" class="booking_room" value="booking_room">
                            <input class="form-control btn btn-success" type="submit" value="Send" name="submit">
                        </td>
                    </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
       $('.checking_date').on('blur',function(){
           var _checking_date = $(this).val();
           //
           $.ajax({
               url:"{{ url('admin/booking') }}/available-room/"+_checking_date,
               dataType:'json',
               beforeSend:function(){
                   $('.room_list').html('<option>----loding----</option>');
               },
               success:function(res){
                   var _html = '';
                   $.each(res.data,function(index,row){
                       _html+='<option data_price="'+row.roomtype.price+'" value="'+row.room.id+'">'+row.room.title+'-'+row.roomtype.title+'</option>';
                   });
                   $('.room_list').html(_html);
               }
           });
       });


       $(document).on("change",".room_list",function(){
            var _selectPrice=$(this).find('option:selected').attr('data_price');
            console.log(_selectPrice);
            $('.booking_price').val(_selectPrice);
            $(".show-room-price").text(_selectPrice);
       });

    });
  </script>
@endsection