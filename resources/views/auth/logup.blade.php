@extends('layouts.auth')
@section('content')
        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url({{asset('images/login-bg-2.jpg')}});"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Create <br>your account</h2>
                        <form action="{{route('auth.logup')}}" method="POST">
                            @csrf
                            @if(session('msg'))
                                <div class="alert alert-danger">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input type="text" name="name" value="{{old('name')}}" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Name">
                                @error('name')
                                    <p class="color-theme-red fw-600 text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input type="text" name="email" value="{{old('email')}}" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Email Address">
                                @error('email')
                                <p class="color-theme-red fw-600 text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-3">
                                <input type="Password" name="password" value="{{old('password')}}" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password">
                                @error('password')
                                <p class="color-theme-red fw-600 text-danger">{{$message}}</p>
                                @enderror
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input type="Password" name="rePassword" value="{{old('rePassword')}}" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Confirm Password">
                                @error('rePassword')
                                <p class="color-theme-red fw-600 text-danger">{{$message}}</p>
                                @enderror
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <div class="form-check text-left mb-3">
                                <input type="checkbox" checked name="checkInput" class="form-check-input mt-2" id="exampleCheck2">
                                <label class="form-check-label font-xsss text-grey-500" for="exampleCheck2">Accept Term and Conditions</label>
                                <!-- <a href="#" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a> -->
                            </div>
                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1"><button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Register</button></div>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="#" data-bs-toggle="modal" data-bs-target="#Modallogin" class="fw-700 ms-1">Login</a></h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
