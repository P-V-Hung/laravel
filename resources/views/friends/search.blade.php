@extends('layouts.app')
@section('content')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left pe-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                        <div class="card-body d-flex align-items-center p-0">
                            <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Friends</h2>
                            <form action="{{route('friend-search')}}" id="form-friend-search"
                                  class="search-form-2 ms-auto">
                                <i class="ti-search font-xss"></i>
                                <input type="text"
                                       class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0"
                                       name="keywords" id="keyword" value="{{$keyword}}" placeholder="Name or Email...">
                            </form>
                            <a href="#" class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"><i
                                    class="feather-filter font-xss text-grey-500"></i></a>
                        </div>
                    </div>

                    <div class="row ps-2 pe-2" id="main-content"></div>
                </div>
            </div>
            <div id="loader"></div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function loadUser(offset,limit) {
            let keyword = $("#keyword").val();
            $.ajax({
                url: "{{route('friend-loadData')}}",
                method: 'POST',
                data: {
                    offset: offset,
                    limit: limit,
                    _token: "{{ csrf_token() }}",
                    keyword: keyword
                },
                beforeSend: function (){
                  $("#loader").html(`
                    <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3">
                        <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                            <div class="stage">
                                <div class="dot-typing"></div>
                            </div>
                        </div>
                    </div>
                  `);
                },
                success: function (response) {
                    let data = response.data;
                    let contents = ``;
                    if(data.length > 0){
                        data.forEach(function (item) {
                            let className, text;
                            className = "btn-add-friend bg-success";
                            text = "ADD FRIEND";
                            if (item.status === 0) {
                                className = "bg-primary confirm-friend";
                                text = "Xác nhận";
                            } else if (item.status === 1) {
                                className = "bg-danger";
                                text = `<a class="text-white" href='/friend/message/${item.id}'>Nhắn tin</a>`
                            } else if (item.status === 2){
                                className = "delete-friend bg-dark"
                                text = "Hủy";
                            }
                            contents += `
                            <div class="col-md-3 col-sm-4 pe-2 ps-2">
                                    <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                        <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">
                                            <figure class="avatar ms-auto me-auto mb-0 position-relative h65 w65 z-index-1"><img
                                                    src="${item.image}" style="height: 65px !important; object-fit: cover" alt="image"
                                                    class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">
                                            </figure>
                                        <div class="clearfix"></div>
                                        <h4 class="fw-700 font-xsss mt-3 mb-1"><a href="/account/profile/${item.id}}">${item.name}</a></h4>
                                        <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-3">${item.email}</p>
                                        <button data-id="${item.id}"
                                           class="${className} mt-0 btn pt-2 pb-2 ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl font-xsssss fw-700 ls-lg text-white">${text}</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        });
                        let view = $("#main-content").html();
                        $("#main-content").html(view+contents);
                    }
                },
            });
        }
        let offset = 1
        let limit = 12;
        $(document).ready(function (){
            loadUser(offset,limit);
        });
        $(window).on("scroll",function (){
            if($(window).height() + $(window).scrollTop() + 1 >= $(document).height()){
                limit = 8;
                offset++;
                loadUser(offset,limit);
            }
        },{ passive: true });
        $(window).on("touchmove",function (){
            if($(window).height() + $(window).scrollTop() >= $(document).height()){
                limit = 8;
                offset++;
                loadUser(offset,limit);
            }
        },{ passive: true });

        $(document).on('click','.btn-add-friend',function (){
           let id = $(this).data('id');
           $(this).addClass('disabled');
            addFriend(id);
        });
        $(document).on('click','.confirm-friend',function (){
            let id = $(this).data('id');
            $(this).addClass('disabled');
            confirmFriend(id);
        });
        $(document).on('click','.delete-friend',function (){
            let id = $(this).data('id');
            $(this).addClass('disabled');
            window.axios.delete("{{route('api-friend-delete',['user1' => auth()->user()->id,'user2' => '__id__'])}}".replace('__id__', id))
        });

        function addFriend(id){
            window.axios.post("/friend/add/"+id)
        }
    </script>
@endpush

