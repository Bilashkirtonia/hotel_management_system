@extends('home.fornt_layout')
@section('content')
  <div class="container my-4">
    <h3 class="text-center mb-4">Messages</h3>
    <form action="{{ url('save_testimonial') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Full name <span class="text-danger">*</span></th>
                <td>
                    <input type="text" class="form-control" name="f_name">
                </td>
            </tr>
            <tr>
                <th>Email <span class="text-danger">*</span></th>
                <td>
                    <input type="email" class="form-control" name="email">
                </td>
            </tr>
            <tr>
                <th>Subject <span class="text-danger">*</span></th>
                <td>
                    <input type="text" class="form-control" name="subject">
                </td>
            </tr>
            <tr>
                <th>Message <span class="text-danger">*</span></th>
                <td>
                    <textarea class="form-control" name="message" id="" cols="50" rows="10">
                    </textarea>
                </td>
            </tr>
            <tr>  
                <td>
               
                    <input type="submit" class="btn btn-success" value="Send" name="">
                </td>
            </tr>
        </table>
    </form>  
 </div> 
@endsection