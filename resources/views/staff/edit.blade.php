
@extends('layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add staff</h1>
        <p class="mb-4">Add here all data</p>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Staff</h6>
                <a href="{{ url('admin/staff') }}" class="float-right btn btn-success">Show All</a>
            </div>
            <div class="card-body">
                {{-- @if (session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif --}}
                <form action="{{ url('admin/staff/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Full name</th>
                                <td>
                                    <input value="{{ $edit->fullname }}" type="text" class="form-control" name="fullname">
                                </td>
                            </tr>

                           <tr>
                               <th>Department</th>
                               <td>
                                   <div >
                                    <select name="staff_id" id="" class="form-control">
                                        <option value="0">--select--</option>
                                        @foreach ($edits as $data)
                                        <option @if ($edit->id == $data->id) selected @endif 
                                            value="{{ $data->id }}">{{ $data->title }}</option>
                                        @endforeach
                                        
                                    </select>
                                   </div>
                               </td>
                           </tr>
                           <tr>
                            <th>Photo</th>
                            <td>
                                <input type="file" class="form-control " name="photo">
                                <input type="hidden" value="{{ $edit->photo }}" class="form-control " name="pre_photo">
                                <img class="mt-3" style="height: 100px;width:200px;" src="/Department/{{ $edit->id }}" alt="" srcset="">
                            </td>
                        </tr>
                           <tr>
                            <th>Bio</th>
                            <td>
                                <textarea value="{{ $edit->bio }}" type="text" value="{{ old('bio') }}" class="form-control" name="bio" id="" cols="30" rows="10">
                                    {{ $edit->bio }}
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Salary type</th>
                            <td>
                                <input type="radio" @if ($edit->salary_type == 'daily')
                                    checked
                                @endif  name="salary_type" value="daily"> Daily <br>
                                <input @if ($edit->salary_type == 'montly')
                                checked
                                @endif  type="radio"  name="salary_type" value="montly"> Monthly
                            </td>
                        </tr>
                        <tr>
                            <th>Salary</th>
                            <td>
                                <input value="{{ $edit->salary_amt }}" type="number" class="form-control" name="salary_amt">
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