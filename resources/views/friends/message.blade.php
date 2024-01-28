@extends('layouts.app')
@section('content')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left pe-0 ps-lg-3 ms-0 me-0" style="max-width: 100%;">
            <div class="row">
                <div class="col-lg-12 position-relative">
                    <div id="chat-wrapper"
                         class="chat-wrapper pt-0 w-100 position-relative scroll-bar bg-white theme-dark-bg">
                        <div id="loader">
                            <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3">
                                <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                    <div class="stage">
                                        <div class="dot-typing"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-body p-3 " id="chat-body">
                            <div class="messages-content pb-5 overflow-y-auto" id="messages">
{{--                                <div class="message-item">--}}
{{--                                    <div class="message-user">--}}
{{--                                        <figure class="avatar">--}}
{{--                                            <img src="{{asset('images/user-9.png')}}" alt="image">--}}
{{--                                        </figure>--}}
{{--                                        <div>--}}
{{--                                            <h5>Byrom Guittet</h5>--}}
{{--                                            <div class="time">01:35 PM</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <figure>--}}
{{--                                        <img src="{{asset('images/bb-9.jpg')}}" class="w-25 img-fluid rounded-3"--}}
{{--                                             alt="image">--}}
{{--                                    </figure>--}}
{{--                                </div>--}}

                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                    <div class="chat-bottom dark-bg p-3 shadow-none theme-dark-bg" style="width: 98%;">
                        <input type="hidden" value="{{$id}}" id="friend">
                        <form class="chat-form d-flex justify-content-between" id="form-send-message">
                            <button class="bg-grey float-left"><i class="ti-microphone text-grey-600"></i></button>
                            <div class="form-group cursor-pointer"><input type="text" id="text-message"
                                                                          class="text-dark"
                                                                          placeholder="Nhập tin nhắn.."></div>
                            <button id="btn-send-message" class="bg-current">
                                <i class="ti-arrow-right text-white"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')

    <script type="module">
        let pageMessage = 1;

        function scrollToBottom() {
            var element = document.querySelector('#chat-wrapper');
            element.scrollTop = element.scrollHeight;
        }

        function loadMessage(page) {
            let route = "{{route('api-message-select',['user'=>auth()->user()->id,'withUser'=>'__id__','page' => '__page__'])}}".replace('__id__', idFriend).replace('__page__', page);
            window.axios.get(route)
                .then((response) => {
                    let data = response.data;
                    let content = '';
                    if (data.length > 0) {
                        data.forEach(function (item) {
                            let loc = '';
                            let classSend = '';
                            if (item.idUser === {{auth()->user()->id}}) {
                                loc = 'outgoing-message';
                                classSend = "ti-double-check text-info";
                            }
                            content += `
                                <div class="message-item ${loc}">
                                            <div class="message-user">
                                                <figure class="avatar">
                                                    <img src="${item.imageUser}" style="object-fit: cover !important;width: 40px;height: 40px" alt="image">
                                                </figure>
                                                <div>
                                                    <h5>${item.nameUser}</h5>
                                                    <div class="time">${item.date} <i class="${classSend}"></i></div>
                                                </div>
                                            </div>
                                       <div class="message-wrap">${item.message}</div>
                                </div>
                            `;
                        })
                    }else{
                        content = '<h1 class="text-center alert alert-success w-100">Sociala.</h1>';
                    }
                    $("#loader").html('');
                    $("#messages").prepend(content);
                })
        }

        let idFriend = $('#friend').val();
        let route = "{{route('api-message-select',['user'=>auth()->user()->id,'withUser'=>'__id__','page' => '__page__'])}}".replace('__id__', idFriend).replace('__page__', pageMessage);
        window.axios.get(route)
            .then((response) => {
                let data = response.data;
                let content = '';
                if(data.length > 0){
                data.forEach(function (item) {
                    let loc = '';
                    let classSend = '';
                    if (item.idUser === {{auth()->user()->id}}) {
                        loc = 'outgoing-message';
                        classSend = "ti-double-check text-info";
                    }
                    content += `
                        <div class="message-item ${loc}">
                                    <div class="message-user">
                                        <figure class="avatar">
                                            <img src="${item.imageUser}" style="object-fit: cover !important;width: 40px;height: 40px" alt="image">
                                        </figure>
                                        <div>
                                            <h5>${item.nameUser}</h5>
                                            <div class="time">${item.date} <i class="${classSend}"></i></div>
                                        </div>
                                    </div>
                               <div class="message-wrap">${item.message}</div>
                        </div>
                    `;
                })
                }else{
                    content = '<h1 class="text-center alert alert-success w-100">Sociala.</h1>';
                }
                $("#loader").html('');
                $("#messages").html(content);
                scrollToBottom();
                $("#chat-wrapper").on('scroll', function () {
                    if ($("#chat-wrapper").scrollTop() <= 0) {
                        pageMessage++;
                        $("#loader").html(`
                            <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3">
                                <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                    <div class="stage">
                                        <div class="dot-typing"></div>
                                    </div>
                                </div>
                            </div>
                        `);
                        loadMessage(pageMessage);
                    }
                },{ passive: true });
            })
        $(document).on('submit', "#form-send-message", function (e) {
            e.preventDefault();
            let message = $("#text-message").val();
            if (message !== "") {
                let route = "{{route('api-message-send',['user' => auth()->user()->id,'toUser'=>'__id__','message'=>'__message__'])}}".replace('__id__', $("#friend").val()).replace('__message__', message);
                window.axios.post(route)
                    .then(function (response) {
                        let data = response.data;
                        let content = `
                            <div class="message-item outgoing-message">
                                    <div class="message-user">
                                        <figure class="avatar">
                                            <img src="${data.imageUser}" style="object-fit: cover !important;width: 40px;height: 40px" alt="image">
                                        </figure>
                                        <div>
                                            <h5>${data.userName}</h5>
                                            <div class="time">${data.date} <i class="ti-double-check text-info"></i></div>
                                        </div>
                                    </div>
                               <div class="message-wrap">${data.message}</div>
                        </div>
                        `;
                        $("#messages").append(content);
                        $("#text-message").val("");
                        scrollToBottom();
                    })
            }
        })
        Echo.private('friend.send.message.' + userId)
            .listen('SendMessage', (item) => {
                let image = "{{asset("storage/"."__image__")}}".replace('__image__', item.user.image);
                let content = `
                            <div class="message-item">
                                    <div class="message-user">
                                        <figure class="avatar">
                                            <img src="${image}" style="object-fit: cover !important;width: 40px;height: 40px" alt="image">
                                        </figure>
                                        <div>
                                            <h5>${item.user.name}</h5>
                                            <div class="time">${item.date}</div>
                                        </div>
                                    </div>
                               <div class="message-wrap">${item.message}</div>
                        </div>
                        `;
                $("#messages").append(content);
                scrollToBottom();
            })
    </script>
@endpush
