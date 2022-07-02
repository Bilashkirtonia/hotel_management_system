
@extends('layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Service</h1>
        <p class="mb-4">Add here all data</p>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Service</h6>
                <a href="{{ url('admin/service') }}" class="float-right btn btn-success">Show All</a>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif
                <form action="{{ url('admin/service/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                                <th>Title</th>
                                <td>
                                   <input type="text" value="{{$edit->title }}" class="form-control" name="title">
                                </td>
                        </tr>
                        <tr>
                            <th>Small description</th>
                            <td>
                               <input type="text" value="{{$edit->small_desc }}" class="form-control" name="small_desc">
                            </td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <td>
                               <input type="text" value="{{$edit->details_desc }}" class="form-control" name="details_desc">
                            </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input style="width: 300px;height:200px" type="file" class="form-control float-left mr-3" name="photo">
                               <input style="width: 300px;height:200px" type="hidden" value="{{ $edit->photo }}" class="form-control float-left mr-3" name="photo1">
                               <img style="width:300px;height:200px;" src="service/{{ $edit->photo}}" alt="">
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