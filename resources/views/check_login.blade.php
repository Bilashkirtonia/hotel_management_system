@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @if (!Session::has('adminData'))
    <script>
        window.location.href = "{{ url('admin/login') }}";
    </script>
    @endif
    login successfully

</div>
<!-- /.container-fluid -->

@endsection