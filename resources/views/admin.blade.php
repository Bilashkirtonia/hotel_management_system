@extends('layout')
@section('content')

@if (!Session::has('adminData'))
        <script>
            window.location.href = "{{ url('/') }}";
        </script>
    @endif


    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Admin page</h1>

</div>
<!-- /.container-fluid -->
@endsection
