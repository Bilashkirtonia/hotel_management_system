@extends('home.fornt_layout')
@section('content')
  <div class="container my-4">

    @if (Session::has('success'))
        <p class="text-success">{{ session('success') }}</p>
    @endif
    <h3 class="text-center">Testimonial </h3>
    <form action="{{ url('save_testimonial') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Testimonial <span class="text-danger">*</span></th>
                <td>
                    <textarea class="form-control" name="textimonial" id="" cols="50" rows="10">
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