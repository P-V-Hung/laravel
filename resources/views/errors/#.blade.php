@extends('layouts.app-navbar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-6 d-none d-xl-block p-0 vh-100 bg-image-contain bg-image-center bg-no-repeat"
                 style="background-image: url(../images/coming-soon.png);"></div>
            <div class="col-xl-6 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 pe-lg--5 ms-auto coming-soon-card">
                    <div class="card-body rounded-0 text-left pt-md-5 mt-md-5 pe-0 ps-0">
                        <div class="timer w-100 mb-3 bg-grey-time">
                            <div class="time-count"><span class="text-time">04</span> <span
                                    class="text-day">Day</span></div>
                            <div class="time-count"><span class="text-time">04</span> <span
                                    class="text-day">Hours</span></div>
                            <div class="time-count"><span class="text-time">39</span> <span
                                    class="text-day">Min</span></div>
                            <div class="time-count"><span class="text-time">13</span> <span
                                    class="text-day">Sec</span></div>
                        </div>
                        <h2 class="fw-700 text-grey-900 display3-size display4-md-size lh-2">We're under <span
                                class="text-primary">construction.</span> Check back for an update soon.</h2>
                        <div class="form-group mt-4 p-1 border p-2 bg-white rounded-3">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group icon-input mb-0">
                                        <i class="ti-email font-xs text-grey-400"></i>
                                        <input type="text"
                                               class="style1-input bg-transparent border-0 pe-5 font-xsss mb-0 text-grey-500 fw-500"
                                               placeholder="Email Address">
                                    </div>
                                </div>


                                <div class="col-lg-5">
                                    <a href="#"
                                       class="w-100 d-block btn bg-current text-white font-xssss fw-600 ls-3 style1-input p-0 border-0 text-uppercase ">Notify</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
