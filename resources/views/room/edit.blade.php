
@extends('layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">Add here all data</p>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table</h6>
                <a href="{{ url('admin/room') }}" class="float-right btn btn-success">Show All</a>
            </div>
            <div class="card-body">
                {{-- @if (session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif --}}
                <form action="{{ url('admin/room/'.$edit->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <tr>
                               <th>Title</th>
                               <td>
                                <div >
                                    <select name="roomdata" id="" class="form-control">
                                        <option value="">--select--</option>
                                        @foreach ($edits as $edits)
                                        <option @if ($edit->room_type_id == $edits->id)
                                            selected
                                        @endif value="{{ $edits->id }}">{{ $edits->title }}</option>
                                        @endforeach                                 
                                    </select>
                                </div>
                               </td>
                           </tr>
                           <tr>
                            <th>Details</th>
                            <td>
                                <textarea  type="text" class="form-control" name="details" id="" cols="50" rows="10">
                                    {{ $edit->title }}
                                </textarea>
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