@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
@endsection
@section('content')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card w-100 border-0 p-0 bg-white shadow-xss rounded-xxl">
                        <div class="card-body h250 p-0 rounded-xxl overflow-hidden m-3"><img src="{{asset('images/u-bg.jpg')}}" alt="image"></div>
                        <div class="card-body p-0 position-relative">
                            <figure class="avatar position-absolute w100 z-index-1" style="top:-40px; left: 30px;"><img src="{{$user->image}}" alt="image" class="float-right p-1 bg-white rounded-circle w-100" style="height: 100px;object-fit: cover"></figure>
                            <h4 class="fw-700 font-sm mt-2 mb-lg-5 mb-4 pl-15">{{$user->name}} <span class="fw-500 font-xssss text-grey-500 mt-1 mb-3 d-block">{{$user->email}}</span></h4>
                            <div class="d-flex align-items-center justify-content-center position-absolute-md right-15 top-0 me-2">
                                <a href="#" class="d-none d-lg-block bg-success p-3 z-index-1 rounded-3 text-white font-xsssss text-uppercase fw-700 ls-3">Edit information</a>
                                <a href="#" class="d-none d-lg-block bg-greylight btn-round-lg ms-2 rounded-3 text-grey-700"><i class="feather-mail font-md"></i></a>
                                <a href="#" id="dropdownMenu4" class="d-none d-lg-block bg-greylight btn-round-lg ms-2 rounded-3 text-grey-700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more font-md tetx-dark"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu4">
                                    <div class="card-body p-0 d-flex">
                                        <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Save Link <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2">
                                        <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2">
                                        <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-0">Hide all from Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2">
                                        <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                        <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-0">Unfollow Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body d-block w-100 shadow-none mb-0 p-0 border-top-xs">
                            <ul class="nav nav-tabs h55 d-flex product-info-tab border-bottom-0 ps-4" id="pills-tab" role="tablist">
                                <li class="active list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block active" href="#navtabs1" data-toggle="tab">About</a></li>
                                <li class="list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs2" data-toggle="tab">Membership</a></li>
                                <li class="list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs3" data-toggle="tab">Discussion</a></li>
                                <li class="list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs4" data-toggle="tab">Video</a></li>
                                <li class="list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs3" data-toggle="tab">Group</a></li>
                                <li class="list-inline-item me-5"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs1" data-toggle="tab">Events</a></li>
                                <li class="list-inline-item me-5"><a class="fw-700 me-sm-5 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#navtabs7" data-toggle="tab">Media</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-3 col-lg-4 pe-0">
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3">
                        <div class="card-body p-3 border-0">
                            <div class="row">
                                <div class="col-3">
                                    <div class="chart-container w50 h50">
                                        <div class="chart position-relative" data-percent="78" data-bar-color="#a7d212">
                                            <span class="percent fw-700 font-xsss" data-after="%">78</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 ps-1">
                                    <h4 class="font-xsss d-block fw-700 mt-2 mb-0">Advanced Python Sass <span class="float-right mt-2 font-xsssss text-grey-500">87%</span></h4>
                                    <p class="font-xssss fw-600 text-grey-500 lh-26 mb-0">Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-block p-4">
                            <h4 class="fw-700 mb-3 font-xsss text-grey-900">About</h4>
                            <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus</p>
                        </div>
                        <div class="card-body border-top-xs d-flex">
                            <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-0">Private <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">What's up, how are you?</span></h4>
                        </div>

                        <div class="card-body d-flex pt-0">
                            <i class="feather-eye text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-0">Visble <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Anyone can find you</span></h4>
                        </div>
                        <div class="card-body d-flex pt-0">
                            <i class="feather-map-pin text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-1">Flodia, Austia </h4>
                        </div>
                        <div class="card-body d-flex pt-0">
                            <i class="feather-users text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-1">Genarel Group</h4>
                        </div>
                    </div>
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center  p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Photos</h4>
                            <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-block pt-0 pb-2">
                            <div class="row">
                                <div class="col-6 mb-2 pe-1"><a href="images/e-2.jpg" data-lightbox="roadtrip"><img src="{{asset('images/e-2.jpg')}}" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                <div class="col-6 mb-2 ps-1"><a href="images/e-3.jpg" data-lightbox="roadtrip"><img src="{{asset('images/e-3.jpg')}}" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                <div class="col-6 mb-2 pe-1"><a href="images/e-4.jpg" data-lightbox="roadtrip"><img src="{{asset('images/e-4.jpg')}}" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                <div class="col-6 mb-2 ps-1"><a href="images/e-5.jpg" data-lightbox="roadtrip"><img src="{{asset('images/e-5.jpg')}}" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                <div class="col-6 mb-2 pe-1"><a href="images/e-2.jpg" data-lightbox="roadtrip"><img src="{{asset('images/e-2.jpg')}}" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                <div class="col-6 mb-2 ps-1"><a href="images/e-1.jpg" data-lightbox="roadtrip"><img src="{{asset('images/e-1.jpg')}}" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                            </div>
                        </div>
                        <div class="card-body d-block w-100 pt-0">
                            <a href="#" class="p-2 lh-28 w-100 d-block bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i class="feather-external-link font-xss me-2"></i> More</a>
                        </div>
                    </div>

                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center  p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Event</h4>
                            <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-success me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">FEB</span>22</h4></div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Meeting with clients <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                        </div>

                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-warning me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">APR</span>30</h4></div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Developer Programe <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                        </div>

                        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                            <div class="bg-primary me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">APR</span>23</h4></div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Aniversary Event <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-xxl-9 col-lg-8">

                    <form id="form-post" method="POST" action="{{route('post.store')}}" enctype="multipart/form-data" class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
                        @csrf
                        <div class="card-body p-0">
                            <button
                                class="btn font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i
                                    class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Đăng bài</button>
                        </div>
                        <div class="card-body p-0 mt-3 position-relative">
                            <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="{{$user->image}}"
                                                                                          style="width: 30px; height: 30px; object-fit: cover"
                                                                                          alt="image"
                                                                                          class="shadow-sm rounded-circle w30">
                            </figure>
                            <textarea name="message"
                                      class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg"
                                      cols="30" rows="10" placeholder="Bạn đang nghĩ gì?"></textarea>
                            <video src="" controls autoplay id="uploaded-video" style="display: none; width: 100%"></video>
                            <input type="hidden" name="id" value="{{auth()->user()->id}}">
                            <div class="card-body d-block p-0">
                                <div class="row ps-2 pe-2" id="image-photo">

                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex p-0 mt-0">
                            <div class="d-flex align-items-center">
                                <input type="file" class="d-none align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4" />
                                <label for="" class="d-inline-flex align-items-center cursor-pointer"><i class="font-md text-danger feather-video me-2"></i><span class="d-none-xs fs-5 fw-500">Live Video</span></label>
                            </div>
                            <div class="d-flex align-items-center mx-4">
                                <input type="file" name="photo[]" multiple id="photo-video" class="d-none align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4" />
                                <label for="photo-video" class="d-inline-flex align-items-center cursor-pointer"><i class="font-md text-success feather-image me-2"></i><span class="d-none-xs fs-5 fw-500">Photo/Video</span></label>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="file" class="d-none align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4" />
                                <label for="" class="d-inline-flex align-items-center cursor-pointer"><i class="font-md text-warning feather-camera me-2"></i><span class="d-none-xs fs-5 fw-500">Feeling/Activity</span></label>
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
                    <input type="hidden" id="id-user" value="{{$user->id}}" >
                    <div id="body-profile"></div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <script src="{{asset('assets/js/lightbox.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easypiechart.min.js')}}"></script>
    <script type="module">
        let route = "{{route("post.show",['id' => '__id__'])}}".replace('__id__',$("#id-user").val());
        window.axios.get(route)
            .then((response) => {
                let data = response.data;
                $("#body-profile").html(data);
            })
    </script>
    <script>
        document.getElementById('photo-video').addEventListener('change', function(e) {
            const files = e.target.files;
            let content = '';
            let box = document.getElementById('image-photo');
            let count = 0;
            for(const file of files){
                let extension = file.name.split('.').pop().toLowerCase();
                if(['jpg','jpeg','png','gif'].includes(extension)){
                    let url = URL.createObjectURL(file);
                    count++;
                    if(count < 3){
                        content += `
                              <div class="col-xs-4 col-sm-4 p-1">
                                  <a href="${url}" data-lightbox="roadtrip">
                                      <img src="${url}" class="rounded-3 w-100" alt="image">
                                  </a>
                              </div>
                          `;
                    }else if(count === 3){
                        content += `
                            <div class="col-xs-4 col-sm-4 p-1">
                              <a href="${url}" data-lightbox="roadtrip" class="position-relative d-block">
                                  <img src="${url}" class="rounded-3 w-100" alt="image">
                                  <span class="img-count font-sm text-white ls-3 fw-600">
                                      <b>+${Object.keys(files).length -2}</b>
                                  </span>
                              </a>
                          </div>
                          `;
                    }
                }else if(['mp4','mov','avi','wmv'].includes(extension)){
                    let url = URL.createObjectURL(file);
                    let video = document.getElementById('uploaded-video');
                    video.src = url;
                    video.style.display = 'block';
                }
            }
            box.innerHTML = content;
        });

        $(document).on('submit',"#form-post",function(e){
            e.preventDefault();
            const form = $(this);
            let text = $("#textmess").val();
            if(text !== ''){
                $.ajax({
                    url: form[0].action,
                    method: form[0].method,
                    data: new FormData(form[0]),
                    contentType: false,
                    processData: false,
                    beforeSend: function (){
                        $("#post-btn").text('Đang tải...');
                    },
                    success: function (post){
                        console.log(post)
                        form[0].reset();
                        $("#post-btn").text(`Đăng bài`);
                        let video = document.getElementById('uploaded-video');
                        video.style.display = 'none';
                        let box = document.getElementById('image-photo');
                        box.innerHTML = "";
                        let img = post.photo
                        let images = '';
                        if(img.length > 0){
                            for(let i = 0; i < img.length; i++){
                                if(i < 2){
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
                        if(img.length >= 2){
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
                        if(post.video.length > 0){
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
                                    `+videos+`
                                        <div class="card-body d-block p-0">
                                            <div class="row ps-2 pe-2">
                                                `+images+`
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
                                    <a href="#" id="dropdownMenu21" data-bs-toggle="dropdown" aria-expanded="false"
                                       class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                                            class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"></i><span
                                            class="d-none-xs">Share</span></a>
                                </div>
                            </div>
                    `;
                        $("#body-profile").prepend(content);
                    }
                });
            }
        });
        $('.chart').easyPieChart({
            easing: 'easeOutElastic',
            delay: 3000,
            barColor: '#3498db',
            trackColor: '#aaa',
            scaleColor: false,
            lineWidth: 5,
            trackWidth: 5,
            size: 50,
            lineCap: 'round',
            onStep: function(from, to, percent) {
                this.el.children[0].innerHTML = Math.round(percent);
            }
        });
    </script>
@endpush
