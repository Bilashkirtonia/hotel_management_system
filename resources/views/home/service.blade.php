@extends('home.fornt_layout')
@section('content')
<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Service</h1>
    <p class="mb-4">Here is the all Data</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('/') }}" class="m-auto float-right btn btn-success">Show all</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Title</th>
                    <td>
                        {{ $all_service->title }}
                    </td>
                </tr>
                <tr>
                 <th>Short Description</th>
                 <td>
                    {{ $all_service->small_desc }}
                 </td>
                </tr>
                <tr>
                    <th>Details </th>
                    <td class="w-100 h-50">
                        {{ $all_service->details_desc }}
                    </td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>
                        <img style="width: 100px;height:50px;" src="service/{{ $all_service->photo}}" alt="">
                    </td>
                </tr>
                
             </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection