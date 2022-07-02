
@extends('layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rooms</h1>
        <p class="mb-4">Add here all data</p>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Room</h6>
                <a href="{{ url('admin/room') }}" class="float-right btn btn-success">Show All</a>
            </div>
            <div class="card-body">
                {{-- @if (session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif --}}
                <form action="{{ url('admin/room') }}" method="POST">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <tr>
                               <th>Title</th>
                               <td>
                                   <div >
                                    <select name="roomdata" id="" class="form-control">
                                        <option value="0">--select--</option>
                                        @foreach ($datas as $data)
                                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                                        @endforeach
                                        
                                    </select>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                            <th>Details</th>
                            <td>
                                <textarea type="text" value="{{ old('title') }}" class="form-control" name="title" id="" cols="50" rows="10">
    
                                </textarea>
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