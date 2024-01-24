@extends('layouts.index')
@section('main')
    <!-- main content -->
    <div class="main-content pt-0 bg-white pe-0 ps-0">
        @yield('content')
    </div>
    <!-- main content -->


    @include('contents.navbar-reponsive')
@endsection
