@extends('layouts.app')
@section('content')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <!-- loader wrapper -->
            <div class="preloader-wrap p-3">
                <div class="box shimmer">
                    <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                    </div>
                </div>
                <div class="box shimmer mb-3">
                    <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                    </div>
                </div>
                <div class="box shimmer">
                    <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                    </div>
                </div>
            </div>
            <!-- loader wrapper -->
            <div class="row feed-body">
                <div class="col-xl-8 col-xxl-9 col-lg-8">
                    <div class="card w-100 shadow-none bg-transparent bg-transparent-card border-0 p-0 mb-0">
                        <div
                             class="owl-carousel category-card owl-theme overflow-hidden nav-none owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" id="list-story" style="transform: translate3d(0px, 0px, 0px); transition: all 0.25s ease 0s; width: 928px;">

{{--                                    <div class="owl-item active" style="width: auto; margin-right: 7px;">--}}
{{--                                        <div class="item">--}}
{{--                                            <div data-bs-toggle="modal" data-bs-target="#Modalstory"--}}
{{--                                                 class="card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3"--}}
{{--                                                 style="background-image: url(images/s-1.jpg);">--}}
{{--                                                <div--}}
{{--                                                    class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">--}}
{{--                                                    <a href="#">--}}
{{--                                                        <figure--}}
{{--                                                            class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1">--}}
{{--                                                            <img src="images/user-11.png" alt="image"--}}
{{--                                                                 class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">--}}
{{--                                                        </figure>--}}
{{--                                                        <div class="clearfix"></div>--}}
{{--                                                        <h4 class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">--}}
{{--                                                            Victor Exrixon </h4>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


                                </div>
                            </div>
                            <div class="owl-nav">
                                <button type="button" role="presentation" class="owl-prev disabled">
                                    <i class="ti-angle-left"></i>
                                </button>
                                <button type="button" role="presentation" class="owl-next">
                                    <i class="ti-angle-right"></i>
                                </button>
                            </div>
                            <div class="owl-dots disabled"></div>
                        </div>
                    </div>

                    <form id="form-post" method="POST" action="{{route('post.store')}}" enctype="multipart/form-data"
                          class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
                        @csrf
                        <div class="card-body p-0">
                            <button
                                class="btn font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i
                                    class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i><span
                                    id="post-btn">Đăng bài</span></button>
                        </div>
                        <div class="card-body p-0 mt-3 position-relative">
                            <figure class="avatar position-absolute ms-2 mt-1 top-5"><img
                                    src="{{asset("storage/".auth()->user()->image)}}"
                                    style="width: 30px; height: 30px; object-fit: cover"
                                    alt="image"
                                    class="shadow-sm rounded-circle w30">
                            </figure>
                            <textarea id="textmess" name="message"
                                      class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg"
                                      cols="30" rows="10" placeholder="Bạn đang nghĩ gì?"></textarea>
                            <video src="" controls autoplay id="uploaded-video"
                                   style="display: none; width: 100%"></video>
                            <input type="hidden" name="id" value="{{auth()->user()->id}}">
                            <div class="card-body d-block p-0">
                                <div class="row ps-2 pe-2" id="image-photo">

                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex p-0 mt-0">
                            <div class="d-flex align-items-center">
                                <input type="file"
                                       class="d-none align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"/>
                                <label for="" class="d-inline-flex align-items-center cursor-pointer"><i
                                        class="font-md text-danger feather-video me-2"></i><span
                                        class="d-none-xs fs-5 fw-500">Live Video</span></label>
                            </div>
                            <div class="d-flex align-items-center mx-4">
                                <input type="file" name="photo[]" multiple id="photo-video"
                                       class="d-none align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"/>
                                <label for="photo-video" class="d-inline-flex align-items-center cursor-pointer"><i
                                        class="font-md text-success feather-image me-2"></i><span
                                        class="d-none-xs fs-5 fw-500">Photo/Video</span></label>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="file"
                                       class="d-none align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"/>
                                <label for="" class="d-inline-flex align-items-center cursor-pointer"><i
                                        class="font-md text-warning feather-camera me-2"></i><span
                                        class="d-none-xs fs-5 fw-500">Feeling/Activity</span></label>
                            </div>

                            <a href="#" class="ms-auto" id="dropdownMenu4" data-bs-toggle="dropdown"
                               aria-expanded="false"><i
                                    class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                            <div class="dropdown-menu dropdown-menu-start p-4 rounded-xxl border-0 shadow-lg"
                                 aria-labelledby="dropdownMenu4">
                                <div class="card-body p-0 d-flex">
                                    <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Save Link <span
                                            class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span>
                                    </h4>
                                </div>
                                <div class="card-body p-0 d-flex mt-2">
                                    <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span
                                            class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span>
                                    </h4>
                                </div>
                                <div class="card-body p-0 d-flex mt-2">
                                    <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from Group <span
                                            class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span>
                                    </h4>
                                </div>
                                <div class="card-body p-0 d-flex mt-2">
                                    <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4">Unfollow Group <span
                                            class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="body-home">

                        {{--                        <div class="card w-100 shadow-none bg-transparent bg-transparent-card border-0 p-0 mb-0">--}}
                        {{--                            <div class="owl-carousel category-card owl-theme overflow-hidden nav-none">--}}
                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w200 d-block border-0 shadow-xss rounded-xxl overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body position-relative h100 bg-image-cover bg-image-center"--}}
                        {{--                                             style="background-image: url(images/u-bg.jpg);"></div>--}}
                        {{--                                        <div class="card-body d-block w-100 ps-4 pe-4 pb-4 text-center">--}}
                        {{--                                            <figure--}}
                        {{--                                                class="avatar ms-auto me-auto mb-0 mt--6 position-relative w75 z-index-1">--}}
                        {{--                                                <img src="images/user-11.png" alt="image"--}}
                        {{--                                                     class="float-right p-1 bg-white rounded-circle w-100"></figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xsss mt-2 mb-1">Aliqa Macale </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-2">support@gmail.com</p>--}}
                        {{--                                            <span--}}
                        {{--                                                class="live-tag mt-2 mb-0 bg-danger p-2 z-index-1 rounded-3 text-white font-xsssss text-uppersace fw-700 ls-3">LIVE</span>--}}
                        {{--                                            <div class="clearfix mb-2"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w200 d-block border-0 shadow-xss rounded-xxl overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body position-relative h100 bg-image-cover bg-image-center"--}}
                        {{--                                             style="background-image: url(images/s-2.jpg);"></div>--}}
                        {{--                                        <div class="card-body d-block w-100 ps-4 pe-4 pb-4 text-center">--}}
                        {{--                                            <figure--}}
                        {{--                                                class="avatar ms-auto me-auto mb-0 mt--6 position-relative w75 z-index-1">--}}
                        {{--                                                <img src="images/user-2.png" alt="image"--}}
                        {{--                                                     class="float-right p-1 bg-white rounded-circle w-100"></figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xsss mt-2 mb-1">Seary Victor </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-2">support@gmail.com</p>--}}
                        {{--                                            <span--}}
                        {{--                                                class="live-tag mt-2 mb-0 bg-danger p-2 z-index-1 rounded-3 text-white font-xsssss text-uppersace fw-700 ls-3">LIVE</span>--}}
                        {{--                                            <div class="clearfix mb-2"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w200 d-block border-0 shadow-xss rounded-xxl overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body position-relative h100 bg-image-cover bg-image-center"--}}
                        {{--                                             style="background-image: url(images/s-6.jpg);"></div>--}}
                        {{--                                        <div class="card-body d-block w-100 ps-4 pe-4 pb-4 text-center">--}}
                        {{--                                            <figure--}}
                        {{--                                                class="avatar ms-auto me-auto mb-0 mt--6 position-relative w75 z-index-1">--}}
                        {{--                                                <img src="images/user-3.png" alt="image"--}}
                        {{--                                                     class="float-right p-1 bg-white rounded-circle w-100"></figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xsss mt-2 mb-1">John Steere </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-2">support@gmail.com</p>--}}
                        {{--                                            <span--}}
                        {{--                                                class="live-tag mt-2 mb-0 bg-danger p-2 z-index-1 rounded-3 text-white font-xsssss text-uppersace fw-700 ls-3">LIVE</span>--}}
                        {{--                                            <div class="clearfix mb-2"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w200 d-block border-0 shadow-xss rounded-xxl overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body position-relative h100 bg-image-cover bg-image-center"--}}
                        {{--                                             style="background-image: url(images/bb-16.png);"></div>--}}
                        {{--                                        <div class="card-body d-block w-100 ps-4 pe-4 pb-4 text-center">--}}
                        {{--                                            <figure--}}
                        {{--                                                class="avatar ms-auto me-auto mb-0 mt--6 position-relative w75 z-index-1">--}}
                        {{--                                                <img src="images/user-4.png" alt="image"--}}
                        {{--                                                     class="float-right p-1 bg-white rounded-circle w-100"></figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xsss mt-2 mb-1">Mohannad Zitoun </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-2">support@gmail.com</p>--}}
                        {{--                                            <span--}}
                        {{--                                                class="live-tag mt-2 mb-0 bg-danger p-2 z-index-1 rounded-3 text-white font-xsssss text-uppersace fw-700 ls-3">LIVE</span>--}}
                        {{--                                            <div class="clearfix mb-2"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w200 d-block border-0 shadow-xss rounded-xxl overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body position-relative h100 bg-image-cover bg-image-center"--}}
                        {{--                                             style="background-image: url(images/e-4.jpg);"></div>--}}
                        {{--                                        <div class="card-body d-block w-100 ps-4 pe-4 pb-4 text-center">--}}
                        {{--                                            <figure--}}
                        {{--                                                class="avatar ms-auto me-auto mb-0 mt--6 position-relative w75 z-index-1">--}}
                        {{--                                                <img src="images/user-7.png" alt="image"--}}
                        {{--                                                     class="float-right p-1 bg-white rounded-circle w-100"></figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xsss mt-2 mb-1">Studio Express </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-2">support@gmail.com</p>--}}
                        {{--                                            <span--}}
                        {{--                                                class="live-tag mt-2 mb-0 bg-danger p-2 z-index-1 rounded-3 text-white font-xsssss text-uppersace fw-700 ls-3">LIVE</span>--}}
                        {{--                                            <div class="clearfix mb-2"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w200 d-block border-0 shadow-xss rounded-xxl overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body position-relative h100 bg-image-cover bg-image-center"--}}
                        {{--                                             style="background-image: url(images/coming-soon.png);"></div>--}}
                        {{--                                        <div class="card-body d-block w-100 ps-4 pe-4 pb-4 text-center">--}}
                        {{--                                            <figure--}}
                        {{--                                                class="avatar ms-auto me-auto mb-0 mt--6 position-relative w75 z-index-1">--}}
                        {{--                                                <img src="images/user-5.png" alt="image"--}}
                        {{--                                                     class="float-right p-1 bg-white rounded-circle w-100"></figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xsss mt-2 mb-1">Hendrix Stamp </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-2">support@gmail.com</p>--}}
                        {{--                                            <span--}}
                        {{--                                                class="live-tag mt-2 mb-0 bg-danger p-2 z-index-1 rounded-3 text-white font-xsssss text-uppersace fw-700 ls-3">LIVE</span>--}}
                        {{--                                            <div class="clearfix mb-2"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w200 d-block border-0 shadow-xss rounded-xxl overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body position-relative h100 bg-image-cover bg-image-center"--}}
                        {{--                                             style="background-image: url(images/bb-9.jpg);"></div>--}}
                        {{--                                        <div class="card-body d-block w-100 ps-4 pe-4 pb-4 text-center">--}}
                        {{--                                            <figure--}}
                        {{--                                                class="avatar ms-auto me-auto mb-0 mt--6 position-relative w75 z-index-1">--}}
                        {{--                                                <img src="images/user-6.png" alt="image"--}}
                        {{--                                                     class="float-right p-1 bg-white rounded-circle w-100"></figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xsss mt-2 mb-1">Mohannad Zitoun </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-2">support@gmail.com</p>--}}
                        {{--                                            <span--}}
                        {{--                                                class="live-tag mt-2 mb-0 bg-danger p-2 z-index-1 rounded-3 text-white font-xsssss text-uppersace fw-700 ls-3">LIVE</span>--}}
                        {{--                                            <div class="clearfix mb-2"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}





                        {{--                        <div class="card w-100 shadow-none bg-transparent bg-transparent-card border-0 p-0 mb-0">--}}
                        {{--                            <div class="owl-carousel category-card owl-theme overflow-hidden nav-none">--}}
                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w150 d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">--}}
                        {{--                                            <figure class="avatar ms-auto me-auto mb-0 position-relative w65 z-index-1"><img--}}
                        {{--                                                    src="images/user-11.png" alt="image"--}}
                        {{--                                                    class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">--}}
                        {{--                                            </figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xssss mt-3 mb-1">Richard Bowers </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">@macale343</p>--}}
                        {{--                                            <a href="#"--}}
                        {{--                                               class="text-center p-2 lh-20 w100 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">FOLLOW</a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w150 d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">--}}
                        {{--                                            <figure class="avatar ms-auto me-auto mb-0 position-relative w65 z-index-1"><img--}}
                        {{--                                                    src="images/user-9.png" alt="image"--}}
                        {{--                                                    class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">--}}
                        {{--                                            </figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xssss mt-3 mb-1">David Goria </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">@macale343</p>--}}
                        {{--                                            <a href="#"--}}
                        {{--                                               class="text-center p-2 lh-20 w100 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">FOLLOW</a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w150 d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">--}}
                        {{--                                            <figure class="avatar ms-auto me-auto mb-0 position-relative w65 z-index-1"><img--}}
                        {{--                                                    src="images/user-12.png" alt="image"--}}
                        {{--                                                    class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">--}}
                        {{--                                            </figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xssss mt-3 mb-1">Vincent Parks </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">@macale343</p>--}}
                        {{--                                            <a href="#"--}}
                        {{--                                               class="text-center p-2 lh-20 w100 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">FOLLOW</a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w150 d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">--}}
                        {{--                                            <figure class="avatar ms-auto me-auto mb-0 position-relative w65 z-index-1"><img--}}
                        {{--                                                    src="images/user-8.png" alt="image"--}}
                        {{--                                                    class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">--}}
                        {{--                                            </figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xssss mt-3 mb-1">Studio Express </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">@macale343</p>--}}
                        {{--                                            <a href="#"--}}
                        {{--                                               class="text-center p-2 lh-20 w100 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">FOLLOW</a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="item">--}}
                        {{--                                    <div--}}
                        {{--                                        class="card w150 d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3 me-2 mt-3">--}}
                        {{--                                        <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">--}}
                        {{--                                            <figure class="avatar ms-auto me-auto mb-0 position-relative w65 z-index-1"><img--}}
                        {{--                                                    src="images/user-7.png" alt="image"--}}
                        {{--                                                    class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">--}}
                        {{--                                            </figure>--}}
                        {{--                                            <div class="clearfix"></div>--}}
                        {{--                                            <h4 class="fw-700 font-xssss mt-3 mb-1">Aliqa Macale </h4>--}}
                        {{--                                            <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">@macale343</p>--}}
                        {{--                                            <a href="#"--}}
                        {{--                                               class="text-center p-2 lh-20 w100 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">FOLLOW</a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}


                    </div>
                    <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                        <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                            <div class="stage">
                                <div class="dot-typing"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-4 col-xxl-3 col-lg-4 ps-lg-0">
                    <div id="notFriends" class="card w-100 shadow-xss rounded-xxl border-0 mb-3">

                    </div>

                    <div class="card w-100 shadow-xss rounded-xxl border-0 p-0 ">
                        <div class="card-body d-flex align-items-center p-4 mb-0">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Confirm Friend</h4>
                            <a href="default-member.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body bg-transparent-card d-flex p-3 bg-greylight ms-3 me-3 rounded-3">
                            <figure class="avatar me-2 mb-0"><img src="images/user-7.png" alt="image"
                                                                  class="shadow-sm rounded-circle w45"></figure>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Anthony Daugloi <span
                                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">12 mutual friends</span>
                            </h4>
                            <a href="#"
                               class="btn-round-sm bg-white text-grey-900 feather-chevron-right font-xss ms-auto mt-2"></a>
                        </div>
                        <div class="card-body bg-transparent-card d-flex p-3 bg-greylight m-3 rounded-3"
                             style="margin-bottom: 0 !important;">
                            <figure class="avatar me-2 mb-0"><img src="images/user-8.png" alt="image"
                                                                  class="shadow-sm rounded-circle w45"></figure>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2"> David Agfree <span
                                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">12 mutual friends</span>
                            </h4>
                            <a href="#"
                               class="btn-round-sm bg-white text-grey-900 feather-plus font-xss ms-auto mt-2"></a>
                        </div>
                        <div class="card-body bg-transparent-card d-flex p-3 bg-greylight m-3 rounded-3">
                            <figure class="avatar me-2 mb-0"><img src="images/user-12.png" alt="image"
                                                                  class="shadow-sm rounded-circle w45"></figure>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Hugury Daugloi <span
                                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">12 mutual friends</span>
                            </h4>
                            <a href="#"
                               class="btn-round-sm bg-white text-grey-900 feather-plus font-xss ms-auto mt-2"></a>
                        </div>
                    </div>

                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3">
                        <div class="card-body d-flex align-items-center p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Suggest Group</h4>
                            <a href="default-group.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 overflow-hidden border-top-xs bor-0">
                            <img src="images/e-2.jpg" alt="img" class="img-fluid rounded-xxl mb-2">
                        </div>
                        <div class="card-body dd-block pt-0 ps-4 pe-4 pb-4">
                            <ul class="memberlist mt-1 mb-2 ms-0 d-block">
                                <li class="w20"><a href="#"><img src="{{asset('images/user-6.png')}}" alt="user"
                                                                 class="w35 d-inline-block" style="opacity: 1;"></a>
                                </li>
                                <li class="w20"><a href="#"><img src="{{asset('images/user-7.png')}}" alt="user"
                                                                 class="w35 d-inline-block" style="opacity: 1;"></a>
                                </li>
                                <li class="w20"><a href="#"><img src="{{asset('images/user-8.png')}}" alt="user"
                                                                 class="w35 d-inline-block" style="opacity: 1;"></a>
                                </li>
                                <li class="w20"><a href="#"><img src="{{asset('images/user-3.png')}}" alt="user"
                                                                 class="w35 d-inline-block" style="opacity: 1;"></a>
                                </li>
                                <li class="last-member"><a href="#"
                                                           class="bg-greylight fw-600 text-grey-500 font-xssss w35 ls-3 text-center"
                                                           style="height: 35px; line-height: 35px;">+2</a></li>
                                <li class="ps-3 w-auto ms-1"><a href="#" class="fw-600 text-grey-500 font-xssss">Member
                                        apply</a></li>
                            </ul>
                        </div>


                    </div>

                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Suggest Pages</h4>
                            <a href="default-group.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 overflow-hidden border-top-xs bor-0">
                            <img src="images/g-2.jpg" alt="img" class="img-fluid rounded-xxl mb-2">
                        </div>
                        <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-4">
                            <a href="#"
                               class="p-2 lh-28 w-100 bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i
                                    class="feather-external-link font-xss me-2"></i> Like Page</a>
                        </div>

                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-0 overflow-hidden">
                            <img src="images/g-3.jpg" alt="img" class="img-fluid rounded-xxl mb-2 bg-lightblue">
                        </div>
                        <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-4">
                            <a href="#"
                               class="p-2 lh-28 w-100 bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i
                                    class="feather-external-link font-xss me-2"></i> Like Page</a>
                        </div>


                    </div>


                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center  p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Event</h4>
                            <a href="default-event.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-success me-2 p-3 rounded-xxl"><h4
                                    class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">FEB</span>22</h4></div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Meeting with clients <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span>
                            </h4>
                        </div>

                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-warning me-2 p-3 rounded-xxl"><h4
                                    class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">APR</span>30</h4></div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Developer Programe <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span>
                            </h4>
                        </div>

                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-primary me-2 p-3 rounded-xxl"><h4
                                    class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">APR</span>23</h4></div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Aniversary Event <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span>
                            </h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal bottom side fade" id="Modalstory" tabindex="-1" style="overflow-y: auto; display: none; padding-right: 17px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 bg-transparent">
                <button type="button" class="close border-dark close-story mt-0 position-absolute top--50 right--20" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close fs-2 text-grey-900 font-xssss"></i>
                </button>
                <div class="modal-body p-0">
                    <div class="card w-100 border-0 rounded-3 overflow-hidden bg-gradiant-bottom bg-gradiant-top">
                        <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none owl-loaded owl-drag">
                            <div class="owl-stage-outer d-flex align-items-center " style="height: 90vh">
                                <div class="owl-stage" style="transform: translate3d(-1900px, 0px, 0px); transition: all 0.25s ease 0s; width: 3040px;">
                                    <div class="owl-item cloned" style="width: 380px;">
                                        <div id="box-video-story" class=" d-flex align-items-center px-3">
                                            <video id="videoStory" autoplay style="width: 100%" src="http://127.0.0.1:8000/storage/uploads/videos/uploads/videos/WIN_20220902_20_09_44_Pro.mp4"></video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-group mt-3 mb-0 p-3 position-absolute bottom-0 z-index-1 w-100">
                        <input type="text" class="style2-input w-100 bg-transparent border-light-md p-3 pe-5 font-xssss fw-500 text-white" value="Write Comments">
                        <span class="feather-send text-white font-md text-white position-absolute" style="bottom: 35px;right:30px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).on('click',".close-story",function (){
            $("#Modalstory").removeClass('show');
            let model = document.querySelector("#Modalstory");
            model.style.display = 'none';
        });
        $(document).on('click',".story-modal",function (){
            $("#Modalstory").addClass('show');
            let model = document.querySelector("#Modalstory");
            model.style.display = 'block';
            let dot = $("#Modalstory .owl-dots.disabled");
            dot.removeClass('owl-dots disabled');
            let urlVideo = $(this).find('.story-block').attr('src');
            let video = document.getElementById('videoStory');
            video.setAttribute('src',urlVideo);
            $("#box-video-story").empty().append(video);
        });
        $(document).on('change',"#add-story",function(e){
            $("#form-add-story").submit();
            {{--let file = e.target.files[0];--}}
            {{--let formData = new FormData();--}}
            {{--formData.append('file', file);--}}
            {{--formData.append('_token', "{{csrf_token()}}");--}}
            {{--$.ajax({--}}
            {{--    url: "{{ route('story.store') }}",--}}
            {{--    method: "POST",--}}
            {{--    data: formData,--}}
            {{--    processData: false,--}}
            {{--    contentType: false,--}}
            {{--    success: function(data) {--}}
            {{--        console.log(data);--}}
            {{--    },error: function (r){--}}
            {{--        console.log(r);--}}
            {{--    }--}}
            {{--})--}}
        });
    </script>
    <script type="module">
        window.axios.get('{{route('story.index',['id' => auth()->user()->id])}}')
            .then((response) => {
                let data = response.data;
                let content = `
                    <div class="owl-item active" style="width: auto; margin-right: 7px;">
                        <form method="POST" action="{{ route('story.store') }}" enctype="multipart/form-data" id="form-add-story" class="item">
                            @csrf
                            <div
                                 class="card w125 h200 d-block border-0 shadow-none rounded-xxxl bg-dark overflow-hidden mb-3 mt-3">
                                <div
                                    class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">
                                    <input name="file" type="file" accept="video/*" style="display: none" id="add-story">
                                    <label for="add-story" class="cursor-pointer">
                                        <span class="btn-round-lg bg-white"><i
                                                class="feather-plus font-lg"></i></span>
                                        <div class="clearfix"></div>
                                        <h4 class="fw-700 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">
                                            Add Story </h4>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                `;
                if (Object.keys(data).length > 0) {
                    for(const [key,item] of Object.entries(data)){
                        console.log(item.video);
                        content += `
                            <div class="owl-item" style="width: auto; margin-right: 7px;">
                                <div class="item story-modal cursor-pointer">
                                    <div"
                                         class="card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3">
                                        <video loop="" src="${item.video[item.video.length - 1]}" class="story-block float-right w-100">
                                        </video>
                                        <div
                                            class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">
                                            <a href="#">
                                                <figure
                                                    class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1">
                                                    <img src="${item.image}" alt="image"
                                                         class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">
                                                </figure>
                                                <div class="clearfix"></div>
                                                <h4 class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">
                                                    ${item.name} </h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                }
                $("#list-story").prepend(content);
            })
    </script>
    <script type="module">
        let page = 1;
        getPost(page);

        function getPost(page) {
            let route = "{{route('post.index',['page' => '__page__'])}}".replace('__page__', page);
            let loading = true;
            window.axios.get(route)
                .then((response) => {
                    let data = response.data;
                    $("#body-home").append(data);
                    $(window).on('scroll', function () {
                        if (($(window).scrollTop() + 100) >= $("#body-home").height()) {
                            if (loading) {
                                page = page + 1;
                                console.log(page);
                                getPost(page);
                            }
                            loading = false;
                        }
                    });
                })
        }
    </script>
    <script>
        document.getElementById('photo-video').addEventListener('change', function (e) {
            const files = e.target.files;
            let content = '';
            let box = document.getElementById('image-photo');
            let count = 0;
            for (const file of files) {
                let extension = file.name.split('.').pop().toLowerCase();
                if (['jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
                    let url = URL.createObjectURL(file);
                    count++;
                    if (count < 3) {
                        content += `
                              <div class="col-xs-4 col-sm-4 p-1">
                                  <a href="${url}" data-lightbox="roadtrip">
                                      <img src="${url}" class="rounded-3 w-100" alt="image">
                                  </a>
                              </div>
                          `;
                    } else if (count === 3) {
                        content += `
                            <div class="col-xs-4 col-sm-4 p-1">
                              <a href="${url}" data-lightbox="roadtrip" class="position-relative d-block">
                                  <img src="${url}" class="rounded-3 w-100" alt="image">
                                  <span class="img-count font-sm text-white ls-3 fw-600">
                                      <b>+${Object.keys(files).length - 2}</b>
                                  </span>
                              </a>
                          </div>
                          `;
                    }
                } else if (['mp4', 'mov', 'avi', 'wmv'].includes(extension)) {
                    let url = URL.createObjectURL(file);
                    let video = document.getElementById('uploaded-video');
                    video.src = url;
                    video.style.display = 'block';
                }
            }
            box.innerHTML = content;
        });

        $(document).on('submit', "#form-post", function (e) {
            e.preventDefault();
            const form = $(this);
            let text = $("#textmess").val();
            if (text !== '') {
                $.ajax({
                    url: form[0].action,
                    method: form[0].method,
                    data: new FormData(form[0]),
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#post-btn").text('Đang tải...');
                    },
                    success: function (post) {
                        console.log(post)
                        form[0].reset();
                        $("#post-btn").text(`Đăng bài`);
                        let video = document.getElementById('uploaded-video');
                        video.style.display = 'none';
                        let box = document.getElementById('image-photo');
                        box.innerHTML = "";
                        let img = post.photo
                        let images = '';
                        if (img.length > 0) {
                            for (let i = 0; i < img.length; i++) {
                                if (i < 2) {
                                    images += `
                                    <div class="col-xs-4 col-sm-4 p-1">
                                       <a href="${img[i]}" data-lightbox="roadtrip">
                                           <img src="${img[i]}" class="rounded-3 w-100" alt="image">
                                       </a>
                                   </div>
                                `;
                                }
                            }
                        }
                        if (img.length >= 2) {
                            images += `
                           <div class="col-xs-4 col-sm-4 p-1">
                               <a href="${img[2]}" data-lightbox="roadtrip" class="position-relative d-block">
                                   <img src="${img[2]}" class="rounded-3 w-100" alt="image">
                                        <span class="img-count font-sm text-white ls-3 fw-600">
                                             <b>+${img.length - 2}</b>
                                        </span>
                               </a>
                           </div>
                       `
                        }
                        let videos = '';
                        if (post.video.length > 0) {
                            videos = `
                        <video src="${post.video[0]}" controls autoplay id="uploaded-video" style="width: 100%"></video>
                       `;
                        }

                        let content = `
                        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                <div class="card-body p-0 d-flex">
                                    <figure class="avatar me-3"><img src="${post.image}" style="height: 45px;object-fit: cover" alt="image"
                                                                     class="shadow-sm rounded-circle w45"></figure>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">${post.name}<span
                                            class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">${post.time}</span></h4>
                                    <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown"
                                       aria-expanded="false"><i
                                            class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                </div>
                                <div class="card-body p-0 me-lg-5">
                                    <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">${post.content}
<!--                                                            <a href="#" class="fw-600 text-primary ms-2">See more</a>-->
                                            </p>
                                        </div>
                                    ` + videos + `
                                        <div class="card-body d-block p-0">
                                            <div class="row ps-2 pe-2">
                                                ` + images + `
                                            </div>
                                        </div>
                                        <div class="card-body d-flex p-0 mt-3">
                                            <a href="#"
                                               class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2"><i
                                                    class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i>
                                                <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"></i>${post.like}</a>
                                    <div class="emoji-wrap">
                                        <ul class="emojis list-inline mb-0">
                                            <li class="emoji list-inline-item"><i class="em em---1"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-angry"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-anguished"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-astonished"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-blush"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-clap"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-cry"></i></li>
                                            <li class="emoji list-inline-item"><i class="em em-full_moon_with_face"></i></li>
                                        </ul>
                                    </div>
                                    <a href="#"
                                       class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                                            class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span
                                            class="d-none-xss">0 Comment</span></a>
                                    <a href="#" id="dropdownMenu21" data-bs-toggle="dropdown" aria-expanded="f alse"
                                       class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                                            class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"></i><span
                                            class="d-none-xs">Share</span></a>
                                </div>
                            </div>
                    `;
                        $("#body-home").prepend(content);
                    }
                });
            }
        });
    </script>
    <script type="module">
        function getFriend() {
            window.axios.get("{{route('api-friend-select',['id' => auth()->user()->id , 'status' => 0])}}")
                .then(function (response) {
                    let data = response.data;
                    if (data.length > 0) {
                        let content = `
                            <div class="card-body d-flex align-items-center p-4">
                                <h4 class="fw-700 mb-0 font-xssss text-grey-900">Friend Request</h4>
                                <a href="default-member.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                            </div>
                        `;
                        data.forEach(function (item, index) {
                            if (index < 3) {
                                content += `
                                    <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-0">
                                        <figure class="avatar me-3"><img style="height: 50px !important;object-fit: cover" src="${item.image}" alt="image"
                                                                         class="shadow-sm rounded-circle w50"></figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">${item.name} <span
                                                class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">${item.days}</span>
                                        </h4>
                                    </div>
                                    <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-4">
                                        <button data-id="${item.id}"
                                           class="confirm-friend btn p-2 lh-20 w100 bg-primary-gradiant me-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl">Xác nhận</button>
                                        <button data-id="${item.id}"
                                           class="delete-friend btn p-2 lh-20 w100 bg-grey text-grey-800 text-center font-xssss fw-600 ls-1 rounded-xl">Xóa</button>
                                    </div>
                               `;
                            }
                        });
                        $("#notFriends").html(content);
                    }
                })
                .catch(function (error) {
                    // console.log('Loi: ' + error);
                })
        }

        $(document).ready(function () {
            getFriend();
        });

        $(document).on('click', ".confirm-friend", function () {
            let id = $(this).data("id");
            $(this).addClass('disabled');
            $(this).next().addClass('disabled');
            confirmFriend(id);
        });
        $(document).on('click', ".delete-friend", function () {
            let id = $(this).data("id");
            $(this).addClass('disabled');
            $(this).prev().addClass('disabled');
            deleteFriend(id);
        });

        Echo.private('friend.change.' + userId)
            .listen('StatusChangeFriend', (e) => {
                getFriend();
            });
    </script>
@endpush
@section('style')
    <style>
        .owl-stage {
            display: flex;
        }
    </style>
@endsection
