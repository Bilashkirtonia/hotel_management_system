@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Staff</h1>
    <p class="mb-4">Here is the all Data</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Staff</h6>
            <a href="{{ url('admin/staff') }}" class="float-right btn btn-success">Show all</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Name</th>
                    <td>
                        {{ $shows->fullname }}
                    </td>
                </tr>
                <tr>
                 <th>Department</th>
                 <td>
                    {{ $shows->department->title }}
                 </td>
             </tr>
             <tr>
                <th>Bio</th>
                <td>
                    {{ $shows->bio }}
                </td>
            </tr>
            <tr>
             <th>Image</th>
             <td>
                <img style="height: 100px;width:200px;" src="../Department/{{ $shows->photo }}"  alt="">
             </td>
         </tr>
             </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection