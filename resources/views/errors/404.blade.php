@extends('layouts.app-navbar')
@section('content')
    <div class="main-content pt-0 bg-white ps-0 pe-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 text-center default-page vh-100 align-items-center d-flex">
                    <div class="card border-0 text-center d-block p-0">
                        <img src="{{asset('images/bg-43.png')}}" alt="icon" class="w200 mb-4 ms-auto me-auto pt-md-5">
                        <h1 class="fw-700 text-grey-900 display3-size display4-md-size">Ối! Có vẻ bạn đang bị lạc.</h1>
                        <p class="text-grey-500 font-xsss">The page you're looking for isn't available. Try to search
                            again or use the go to.</p>
                        <a href="{{route('home')}}"
                           class="p-3 w175 bg-current text-white d-inline-block text-center fw-600 font-xssss rounded-3 text-uppercase ls-3">Home
                            Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
