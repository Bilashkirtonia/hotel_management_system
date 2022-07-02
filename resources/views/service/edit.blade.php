
@extends('layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Customer</h1>
        <p class="mb-4">Add here all data</p>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Customer</h6>
                <a href="{{ url('admin/customer') }}" class="float-right btn btn-success">Show All</a>
            </div>
            <div class="card-body">
                {{-- @if (session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif --}}
                <form action="{{ url('admin/customer/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                                <th>Full name</th>
                                <td>
                                   <input type="text" value="{{$edit->full_name }}" class="form-control" name="fullname">
                                </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                               <input type="text" value="{{$edit->email }}" class="form-control" name="email">
                            </td>
                        </tr>
                        {{-- <tr>
                            <th>Passsword</th>
                            <td>
                               <input type="password" value="{{$edit->full_name }}" class="form-control" name="password">
                            </td>
                        </tr> --}}
                        <tr>
                            <th>Mobile</th>
                            <td>
                               <input type="text" value="{{$edit->mobile }}" class="form-control" name="mobile">
                            </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>
                               <input type="text" value="{{$edit->address }}" class="form-control" name="address">
                            </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                               <input style="width: 300px;height:200px" type="file" value="{{$edit->photo }}" class="form-control float-left mr-3" name="photo">
                               {{-- <img src="images/{{ $edit->photo}}" alt="" style="width: 300px;height:200px"> --}}
                               <img style="width: 300px;height:200px;" src="../images/{{ $edit->photo}}" alt="">
                            </td>
                           
                            
                        </tr>
                        <tr>
                            
                            <td>
                                <input class="form-control btn btn-success" type="submit" value="Update" name="submit">
                            </td>
                        </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
<!-- /.container-fluid -->
@endsection