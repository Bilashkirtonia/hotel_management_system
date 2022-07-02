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
            <a href="{{ url('admin/roomtype') }}" class="float-right btn btn-success">Show all</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Title</th>
                    <td>
                        {{ $shows->title }}
                    </td>
                </tr>
                <tr>
                 <th>Details</th>
                 <td>
                    {{ $shows->details }}
                 </td>
              </tr>
              <tr>
                  <th>Image Gallary</th>
                  <td>
                      <table class="table table-bordered" >
                          <tr>
                              @foreach ($shows->roomtypeimage as $image)
                                  <td><img src="{{ asset('storage/imgs/'.$image->img_src)}}" alt="{{ $image->img_alt }}">
                                    <button type="button" class="btn"><i class="fa-solid fa-trash"></i></button>
                                 </td>
                                  
                              @endforeach
                          </tr>
                      </table>
                  </td>
              </tr>
             </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection