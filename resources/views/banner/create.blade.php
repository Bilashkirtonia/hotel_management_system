
@extends('layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Banner</h1>
        <p class="mb-4">Add here all data</p>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Banner</h6>
                <a href="{{ url('admin/banner') }}" class="float-right btn btn-success">Show All</a>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif
                <form action="{{ url('admin/banner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          
                        <tr>
                            <th>Image</th>
                            <td>
                                <input type="file" name="banner_src" class="form-control" >
                            </td>
                        </tr>
                        <tr>
                            <th>Alt text</th>
                            <td>
                                <input type="text" name="alt_src" class="form-control" >
                            </td>
                        </tr>
                        <tr>
                            <th>Publish_sataus</th>
                            <td>
                                <input type="checkbox" name="banner_status" >
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
<!-- /.container-fluid -->
@endsection