@extends('layouts.index')
@section('main')
    <!-- navigation left -->
    @include('contents.navbar-left')
    <!-- navigation left -->
    <!-- main content -->
    <div class="main-content right-chat-active">
        @yield('content')
    </div>
    <!-- main content -->

    <!-- right chat -->
    <div class="right-chat nav-wrap mt-2 right-scroll-bar">
        <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">
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

            <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">
                <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">CONTACTS</h4>
                <ul id="friends" class="list-group list-group-flush">
                    <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                        <figure class="avatar float-left mb-0 me-2">
                            <img src="{{asset('images/user-8.png')}}" alt="image" class="w35">
                        </figure>
                        <h3 class="fw-700 mb-0 mt-0">
                            <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin
                                Seary</a>
                        </h3>
                        <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                    </li>
                </ul>
            </div>
            <div class="section full pe-3 ps-4 pt-4 pb-4 position-relative feed-body">
                <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">GROUPS</h4>
                <ul class="list-group list-group-flush">
                    <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">

                        <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                        <h3 class="fw-700 mb-0 mt-0">
                            <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Studio
                                Express</a>
                        </h3>
                        <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 min</span>
                    </li>
                    <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">

                        <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                        <h3 class="fw-700 mb-0 mt-0">
                            <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany
                                Design</a>
                        </h3>
                        <span class="bg-warning ms-auto btn-round-xss"></span>
                    </li>
                    <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">

                        <span class="btn-round-sm bg-mini-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                        <h3 class="fw-700 mb-0 mt-0">
                            <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">De
                                fabous</a>
                        </h3>
                        <span class="bg-success ms-auto btn-round-xss"></span>
                    </li>
                </ul>
            </div>
            <div class="section full pe-3 ps-4 pt-0 pb-4 position-relative feed-body">
                <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">Pages</h4>
                <ul class="list-group list-group-flush">
                    <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">

                        <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                        <h3 class="fw-700 mb-0 mt-0">
                            <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany
                                Seary</a>
                        </h3>
                        <span class="bg-success ms-auto btn-round-xss"></span>
                    </li>
                    <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">

                        <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                        <h3 class="fw-700 mb-0 mt-0">
                            <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Entropio
                                Inc</a>
                        </h3>
                        <span class="bg-success ms-auto btn-round-xss"></span>
                    </li>

                </ul>
            </div>

        </div>
    </div>


    <!-- right chat -->

    @include('contents.navbar-reponsive')


    <div class="modal bottom side fade" id="Modalstries" tabindex="-1" role="dialog" style=" overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 bg-transparent">
                <button type="button" class="close mt-0 position-absolute top--30 right--10" data-dismiss="modal"
                        aria-label="Close"><i class="ti-close text-white font-xssss"></i></button>
                <div class="modal-body p-0">
                    <div class="card w-100 border-0 rounded-3 overflow-hidden bg-gradiant-bottom bg-gradiant-top">
                        <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none">
                            <div class="item"><img src="{{asset('images/story-5.jpg')}}" alt="image"></div>
                            <div class="item"><img src="{{asset('images/story-6.jpg')}}" alt="image"></div>
                            <div class="item"><img src="{{asset('images/story-7.jpg')}}" alt="image"></div>
                            <div class="item"><img src="{{asset('images/story-8.jpg')}}" alt="image"></div>

                        </div>
                    </div>
                    <div class="form-group mt-3 mb-0 p-3 position-absolute bottom-0 z-index-1 w-100">
                        <input type="text"
                               class="style2-input w-100 bg-transparent border-light-md p-3 pe-5 font-xssss fw-500 text-white"
                               value="Write Comments">
                        <span class="feather-send text-white font-md text-white position-absolute"
                              style="bottom: 35px;right:30px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-popup-chat">
        <div class="modal-popup-wrap bg-white p-0 shadow-lg rounded-3">
            <div class="modal-popup-header w-100 border-bottom">
                <div class="card p-3 d-block border-0 d-block">
                    <figure class="avatar mb-0 float-left me-2">
                        <img src="{{asset('images/user-12.png')}}" alt="image" class="w35 me-1">
                    </figure>
                    <h5 class="fw-700 text-primary font-xssss mt-1 mb-1">Hendrix Stamp</h5>
                    <h4 class="text-grey-500 font-xsssss mt-0 mb-0"><span
                            class="d-inline-block bg-success btn-round-xss m-0"></span> Available</h4>
                    <a href="#" class="font-xssss position-absolute right-0 top-0 mt-3 me-4"><i
                            class="ti-close text-grey-900 mt-2 d-inline-block"></i></a>
                </div>
            </div>
            <div class="modal-popup-body w-100 p-3 h-auto">
                <div class="message">
                    <div class="message-content font-xssss lh-24 fw-500">Hi, how can I help you?</div>
                </div>
                <div class="date-break font-xsssss lh-24 fw-500 text-grey-500 mt-2 mb-2">Mon 10:20am</div>
                <div class="message self text-right mt-2">
                    <div class="message-content font-xssss lh-24 fw-500">I want those files for you. I want you to send 1
                        PDF and 1 image file.
                    </div>
                </div>
                <div class="snippet pt-3 ps-4 pb-2 pe-3 mt-2 bg-grey rounded-xl float-right" data-title=".dot-typing">
                    <div class="stage">
                        <div class="dot-typing"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-popup-footer w-100 border-top">
                <div class="card p-3 d-block border-0 d-block">
                    <div class="form-group icon-right-input style1-input mb-0"><input type="text"
                                                                                      placeholder="Start typing.."
                                                                                      class="form-control rounded-xl bg-greylight border-0 font-xssss fw-500 ps-3"><i
                            class="feather-send text-grey-500 font-md"></i></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script type="module">
        window.axios.get("{{route('api-friend-select',['id'=>auth()->user()->id,'status'=>1])}}")
            .then(function(response){
                let data = response.data;
                let content = '';
                data.forEach((item) => {
                    let route = "{{route('friend-message',['id' => '__id__'])}}".replace('__id__',item.id);
                    content += `
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="${item.image}"  style="object-fit: cover !important;width: 40px;height: 35px" alt="image" class="rounded-circle w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="${route}">${item.name}</a>
                            </h3>
                                <span id="friend-${item.id}" class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                    `;
                })
                $("#friends").append(content);
            });
    </script>
    <script>
        $(document).ready(function () {
            let url = window.location.href;
            let links = $(".nav-header > a.route");
            for (let i = 0; i < links.length; i++) {
                if (links[i].href === url) {
                    let icon = $(links[i]).find('i');
                    let icons = $(links).find('i');
                    icons.removeClass("alert-primary").addClass("bg-greylight text-grey-500");
                    icon.removeClass("bg-greylight text-grey-500").addClass("alert-primary");
                }
            }
        });

        $(function () {
            $('.timer').countdown('2021/6/31', function (event) {
                var $this = $(this).html(event.strftime(''
                    // + '<span>%w</span> weeks '
                    + '<div class="time-count"><span class="text-time">%d</span> <span class="text-day">Day</span></div> '
                    + '<div class="time-count"><span class="text-time">%H</span> <span class="text-day">Hours</span> </div> '
                    + '<div class="time-count"><span class="text-time">%M</span> <span class="text-day">Min</span> </div> '
                    + '<div class="time-count"><span class="text-time">%S</span> <span class="text-day">Sec</span> </div> '));
            });
        });
        function confirmFriend(id){
            window.axios.post("{{route('api-friend-confirm',['user1' => '__id__','user2' => auth()->user()->id])}}".replace('__id__', id))
        }

        function deleteFriend(id){
            window.axios.delete("{{route('api-friend-delete',['user1' => '__id__','user2' => auth()->user()->id])}}".replace('__id__', id))
        }

        var userId = {{ auth()->user()->id ?? 0}};

    </script>
@endpush
