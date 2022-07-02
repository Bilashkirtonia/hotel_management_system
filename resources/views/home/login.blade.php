@extends('home.fornt_layout')
@section('content')
  <div class="container my-4">

    @if (Session::has('error'))
        <p class="text-success">{{ session('error') }}</p>
    @endif
    <h3 class="text-center">Login</h3>
    <form action="{{ url('customer/login') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Email</th>
                <td>
                    <input type="email" class="form-control" name="email">
                </td>
            </tr>
            <tr>
                <th>Password</th>
                <td>
                    <input type="password" class="form-control" name="password">
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