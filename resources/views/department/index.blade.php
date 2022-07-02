@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Room Type</h1>
    <p class="mb-4">Here is the all Data</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Type Data</h6>
            <a href="{{ url('admin/department/create') }}" class="float-right btn btn-success">Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shows as $key => $show )
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $show->title }}</td>
                            <td>{{ $show->details }}</td>
                            
                            <td>
                                <a href="{{ url('admin/department/'.$show->id) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ url('admin/department/'.$show->id.'/edit') }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ url('admin/department/'.$show->id.'/delete') }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                              
                        </tr>
                        @endforeach
                    </tbody>
                    
                    
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@section('scripts')
<!-- Custom styles for this page -->
<link href="{{ asset('public') }}/../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="{{ asset('public') }}/../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('public') }}/../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('public') }}/../js/demo/datatables-demo.js"></script>
@endsection
@endsection