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
            <a href="{{ url('admin/customer') }}" class="float-right btn btn-success">Show all</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Title</th>
                    <td>
                        {{ $shows->full_name }}
                    </td>
                </tr>
                <tr>
                 <th>Details</th>
                 <td>
                    {{ $shows->email }}
                 </td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>
                        {{ $shows->mobile }}
                    </td>
                </tr>
                <tr>
                 <th>Details</th>
                 <td>
                    {{ $shows->address }}
                 </td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>
                        {{ $shows->photo }}
                    </td>
                </tr>
                
             </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection