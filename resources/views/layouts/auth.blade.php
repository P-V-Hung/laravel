<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uitheme.net/sociala/default-group.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jan 2024 12:12:22 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/feather.css')}}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @yield('style')
</head>

<body class="color-theme-blue">

@include('sweetalert::alert')

<div class="preloader"></div>
<div class="main-wrap">

    <div class="nav-header bg-transparent shadow-none border-0">
        <div class="nav-top w-100">
            <a href="{{route('home')}}"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span
                    class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">Sociala. </span>
            </a>

            <a href="{{route('auth.login')}}"
               class="header-btn d-block bg-dark fw-500 text-white font-xsss p-3 ms-auto w100 text-center lh-20 rounded-xl">Login</a>
            <a href="{{route('auth.logup')}}"
               class="header-btn d-block bg-current fw-500 text-white font-xsss p-3 ms-2 w100 text-center lh-20 rounded-xl">Register</a>
        </div>
    </div>
    @yield('content')
</div>

<!-- Modal Login -->
<div class="modal bottom fade" style="overflow-y: scroll;" id="Modallogin" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                    class="ti-close text-grey-500"></i></button>
            <div class="modal-body p-3 d-flex align-items-center bg-none">
                <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                    <div class="card-body rounded-0 text-left p-3">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Login into <br>your account</h2>
                        <form method="POST" action="{{route('auth.login')}}">
                            @csrf
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600"
                                       value="{{old('email')}}" name="email" placeholder="Your Email Address">
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input type="Password" name="password"
                                       class="style2-input ps-5 form-control text-grey-900 font-xss ls-3"
                                       value="{{old('password')}}" placeholder="Password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <div class="form-check text-left mb-3">
                                <input type="checkbox" checked name="rememberMe" class="form-check-input mt-2" id="exampleCheck2">
                                <label class="form-check-label font-xsss text-grey-500" for="exampleCheck2">Remember
                                    me</label>
                                <a href="{{route('auth.forget')}}" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forget
                                    your Password?</a>
                            </div>
                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1"><button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Login</button>
                                </div>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Dont have account <a href="{{route('auth.logup')}}" class="fw-700 ms-1">Register</a>
                                </h6>
                            </div>
                        </form>

                        <div class="col-sm-12 p-0 text-center mt-3 ">

                            <h6 class="mb-0 d-inline-block bg-white fw-600 font-xsss text-grey-500 mb-4">Or, Sign in
                                with your social account </h6>
                            <div class="form-group mb-1"><a href="{{route('auth.google')}}"
                                                            class="form-control text-left style2-input text-white fw-600 bg-facebook border-0 p-0 mb-2"><img
                                        src="{{asset('images/icon-1.png')}}" alt="icon" class="ms-2 w40 mb-1 me-5"> Sign
                                    in with Google</a></div>
                            <div class="form-group mb-1"><a href="{{route('auth.facebook')}}" class="form-control text-left style2-input text-white fw-600 bg-twiiter border-0 p-0 "><img
                                        src="{{asset('images/icon-3.png')}}" alt="icon" class="ms-2 w40 mb-1 me-5"> Sign
                                    in with Facebook</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Register -->
<div class="modal bottom fade" style="overflow-y: scroll;" id="Modalregister" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                    class="ti-close text-grey-500"></i></button>
            <div class="modal-body p-3 d-flex align-items-center bg-none">
                <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                    <div class="card-body rounded-0 text-left p-3">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Create <br>your account</h2>
                        <form method="POST" action="{{route('auth.logup')}}">
                            @csrf
                            @if(session('msg'))
                                <div class="alert alert-danger">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input type="text" name="name" value="{{old('name')}}" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600"
                                       placeholder="Your Name">
                                @error('name')
                                <p class="text-danger fw-600 fs-4">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input type="text" name="email" value="{{old('email')}}" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600"
                                       placeholder="Your Email Address">
                                @error('email')
                                <p class="text-danger fw-600 fs-4">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-3">
                                <input type="Password" name="password" value="{{old('password')}}"
                                       class="style2-input ps-5 form-control text-grey-900 font-xss ls-3"
                                       placeholder="Password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                @error('password')
                                <p class="text-danger fw-600 fs-4">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input type="Password" name="rePassword" value="{{old('rePassword')}}"
                                       class="style2-input ps-5 form-control text-grey-900 font-xss ls-3"
                                       placeholder="Confirm Password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                @error('rePassword')
                                <p class="text-danger fw-600 fs-4">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-check text-left mb-3">
                                <input type="checkbox" name="checkInput" checked class="form-check-input mt-2" id="exampleCheck3">
                                <label class="form-check-label font-xsss text-grey-500" for="exampleCheck3">Accept Term
                                    and Conditions</label>
                                <!-- <a href="#" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a> -->
                            </div>
                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1"><button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Register</button>
                                </div>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a
                                        href="{{route('auth.login')}}" class="fw-700 ms-1">Login</a></h6>
                            </div>
                        </form>

                        <div class="col-sm-12 p-0 text-center mt-3 ">

                            <h6 class="mb-0 d-inline-block bg-white fw-600 font-xsss text-grey-500 mb-4">Or, Sign in
                                with your social account </h6>
                            <div class="form-group mb-1"><a href="#"
                                                            class="form-control text-left style2-input text-white fw-600 bg-facebook border-0 p-0 "><img
                                        src="{{asset('images/icon-1.png')}}" alt="icon" class="ms-2 w40 mb-1 me-5"> Sign
                                    in with Google</a></div>
                            <div class="form-group mb-1"><a href="#"
                                                            class="form-control text-left style2-input text-white fw-600 bg-twiiter border-0 p-0 "><img
                                        src="{{asset('images/icon-3.png')}}" alt="icon" class="ms-2 w40 mb-1 me-5"> Sign
                                    in with Facebook</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/plugin.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script>
    var userId = {{ auth()->user()->id ?? 0 }};
</script>
@stack('script')
</body>
</html>
