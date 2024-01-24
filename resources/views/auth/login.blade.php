@extends('layouts.auth')
@section('content')
        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat"
                 style="background-image: url({{asset('images/login-bg.jpg')}});"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-3">Login into <br>your account</h2>
                        <form action="{{route('auth.login')}}" method="POST">
                            @csrf
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input type="text" value="{{old("email")}}" name="email" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600"
                                       placeholder="Your Email Address">
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input type="password" value="{{old("password")}}" name="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3"
                                       placeholder="Password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <div class="form-check text-left mb-3">
                                <input type="checkbox" class="form-check-input mt-2" checked name="rememberMe" id="exampleCheck5">
                                <label class="form-check-label font-xsss text-grey-500" for="exampleCheck5">Remember
                                    me</label>
                                <a href="{{route('auth.forget')}}" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forget your
                                    Password?</a>
                            </div>
                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1">
                                    <button class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 " type="submit">Login</button>
                                </div>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Dont have account <a
                                        href="#" class="fw-700 ms-1" data-bs-toggle="modal" data-bs-target="#Modalregister">Register</a></h6>
                            </div>
                        </form>

                        <div class="col-sm-12 p-0 text-center mt-2">

                            <h6 class="mb-0 d-inline-block bg-white fw-500 font-xsss text-grey-500 mb-3">Or, Sign in with
                                your social account </h6>
                            <div class="form-group mb-1"><a href="{{route('auth.google')}}"
                                                            class="form-control text-left style2-input text-white fw-600 bg-facebook border-0 p-0 mb-2"><img
                                        src="{{asset('images/icon-1.png')}}" alt="icon" class="ms-2 w40 mb-1 me-5"> Sign in
                                    with Google</a></div>
                            <div class="form-group mb-1"><a href="{{route('auth.facebook')}}"
                                                            class="form-control text-left style2-input text-white fw-600 bg-twiiter border-0 p-0 "><img
                                        src="{{asset('images/icon-3.png')}}" alt="icon" class="ms-2 w40 mb-1 me-5"> Sign in
                                    with Facebook</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
