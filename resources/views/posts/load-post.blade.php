@foreach($listData as $post)
    <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
        <div class="card-body p-0 d-flex">
            <figure class="avatar me-3"><img src="{{asset("storage/".$post['image'])}}" style="height: 45px;object-fit: cover" alt="image"
                                             class="shadow-sm rounded-circle w45"></figure>
            <h4 class="fw-700 text-grey-900 font-xssss mt-1"><a href="{{route('account-profile',['id' => $post['idUser']])}}">{{$post['name']}} </a><span
                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{$post['time']}}</span></h4>
            <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown"
               aria-expanded="false"><i
                    class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
        </div>
        <div class="card-body p-0 me-lg-5">
            <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">{{$post['content']}}
{{--                <a href="#" class="fw-600 text-primary ms-2">See more</a>--}}
            </p>
        </div>
        <div>
        @foreach($post['video'] as $video)
            <video src="{{asset('storage/'.$video)}}" style="width: 100%" controls autoplay id="uploaded-video"></video>
        @endforeach
        @php
            $class = ''
        @endphp
        @if(count($post['photo']) == 1)
            @php
                $class = 'w-100'
            @endphp
        @elseif(count($post['photo']) == 2)
            @php
                $class = 'w-50'
            @endphp
        @endif
        </div>
        <div class="card-body d-block p-0">
            <div class="row ps-2 pe-2">
                 @foreach($post['photo'] as $key => $img)
                    @if($key < 2)
                        <div class="col-xs-4 col-sm-4 {{$class}} p-1">
                            <a href="{{asset('storage/'.$img)}}" data-lightbox="roadtrip">
                                <img src="{{asset('storage/'.$img)}}" class="rounded-3 w-100" alt="image">
                            </a>
                        </div>
                    @endif
                @endforeach
                @if((count($post['photo']) > 2) && isset($post['photo'][2]))
                     <div class="col-xs-4 col-sm-4 p-1">
                         <a href="{{asset('storage/'.$post['photo'][2])}}" data-lightbox="roadtrip" class="position-relative d-block">
                             <img src="{{asset('storage/'.$post['photo'][2])}}" class="rounded-3 w-100" alt="image">
                             @if(count($post['photo']) > 3)
                             <span class="img-count font-sm text-white ls-3 fw-600">
                                <b>+{{count($post['photo'])-3}}</b>
                            </span>
                            @endif
                         </a>
                     </div>
                @endif
            </div>
        </div>
        <div class="card-body d-flex p-0 mt-3">
            <a href="#"
               class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2"><i
                    class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i>
                <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"></i>{{$post['like']}}</a>
            <a href="#"
               class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                    class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span
                    class="d-none-xss">0 Comment</span></a>
            <a href="#" id="dropdownMenu21" data-bs-toggle="dropdown" aria-expanded="false"
               class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                    class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"></i><span
                    class="d-none-xs">Share</span></a>
        </div>
    </div>
@endforeach
