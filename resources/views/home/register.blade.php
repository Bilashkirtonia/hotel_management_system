@extends('home.fornt_layout')
@section('content')
  <div class="container my-4">

    @if (Session::has('success'))
        <p class="text-success">{{ session('success') }}</p>
    @endif
    <h3 class="text-center">Register</h3>
    <form action="{{ url('admin/customer') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Name <span class="text-danger">*</span></th>
                <td>
                    <input type="text" class="form-control" name="fullname">
                </td>
            </tr>
            <tr>
                <th>Email <span class="text-danger">*</span></th>
                <td>
                    <input type="email" class="form-control" name="email">
                </td>
            </tr>
            <tr>
                <th>Password <span class="text-danger">*</span></th>
                <td>
                    <input type="password" class="form-control" name="password">
                </td>
            </tr>
            <tr>
                <th>Mobile <span class="text-danger">*</span></th>
                <td>
                    <input type="text" class="form-control" name="mobile">
                </td>
            </tr>
            <tr>
                <th>Address <span class="text-danger">*</span></th>
                <td>
                    <input type="text" class="form-control" name="address">
                </td>
            </tr>
            <tr>
                
                <td>
                    <input type="hidden" name="rfe" value="rfe">
                    <input type="submit" class="btn btn-success" value="Send" name="">
                </td>
            </tr>
        </table>
    </form>   
 </div> 
@endsection