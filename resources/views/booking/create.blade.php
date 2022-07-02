
@extends('layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">BOOKING</h1>
        <p class="mb-4">Add here all data</p>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Booking</h6>
                <a href="{{ url('admin/booking') }}" class="float-right btn btn-success">Show All</a>
            </div>
            <div class="card-body">
                {{-- @if (session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif --}}
                <form action="{{ url('admin/booking') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                                <th>Select customer <span class="text-danger">*</span></th>
                                <td>
                                   <select name="customer_id" class="form-control">
                                    <option value="">---Select customer---</option>
                                    @foreach ($datas as $customer)
                                     <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                                    @endforeach
                                   </select>
                                </td>
                        </tr>
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
                                    <option value="">---Select room---</option>
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Totall adults <span class="text-danger">*</span></th>
                            <td>
                               <input type="nunber" value="{{ old('address') }}" class="form-control" name="totall_adults">
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
                                <input class="form-control btn btn-success" type="submit" value="Send" name="submit">
                            </td>
                        </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
    @section('scripts')
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
                            _html+='<option value="'+row.id+'">'+row.title+'</option>';
                        });
                        $('.room_list').html(_html);
                    }
                });


            });
         });
       </script>
    @endsection
<!-- /.container-fluid -->
@endsection