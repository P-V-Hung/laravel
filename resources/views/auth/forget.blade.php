@extends('layouts.auth')
@section('content')
    <div class="middle-sidebar-bottom mt-5 pt-5">
        <div class="middle-sidebar-left">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-10">
                    <div class="card w-100 border-0 p-0 rounded-3 overflow-hidden bg-image-contain bg-image-center"
                         style="background-image: url(../images/help-bg.png);">
                        <div class="card-body p-md-5 p-4 text-center" style="background-color:rgba(0,85,255,0.8)">
                            <h2 class="fw-700 display2-size text-white display2-md-size lh-2">Quên mật khẩu!</h2>
                            <p class="font-xsss pe-lg-5 ps-lg-5 lh-28 text-grey-200">Vui lòng nhập đúng email! <br>
                                <span class="fw-600 fs-4" >Sau khi tìm thấy tại khoản vui lòng click vào dấu cộng để lấy mail đặt lại mật khẩu.</span>.</p>
                            <form id="form-search-email" action="{{route('auth.search-email')}}" method="GET"
                                  class="form-group w-lg-75 mt-4 border-light border p-1 bg-white rounded-3 me-auto ms-auto">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group icon-input mb-0">
                                            <i class="ti-search font-xs text-grey-400"></i>
                                            <input id="email" type="text" name="email"
                                                   class="style1-input border-0 pe-5 font-xsss mb-0 text-grey-500 w-100 fw-500 bg-transparent"
                                                   placeholder="Tìm kiếm tài khoản..">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" id="btn-search-email"
                                                class="w-100 d-block btn bg-current text-white font-xssss fw-600 ls-3 style1-input p-0 border-0 text-uppercase ">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <p class="fw-600 text-white fs-4" id="error-email"></p>
                        </div>
                    </div>

                    <div class="card w-100 border-0 shadow-none bg-transparent mt-5">
                        <div id="accordion" class="accordion mb-0">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            let form = $("#form-search-email");
            let btn = $("#btn-search-email");
            btn.click(function () {
                $("#error-email").text('');
                $("#accordion").html('')
                let email = $("#email").val();
                $.ajax({
                    url: form.attr('action'),
                    method: "GET",
                    data: {email: email},
                    success: function (data) {
                        let content = `
                        <div class="card shadow-xss">
                                <form method="POST" action="{{route('auth.sendMailRePass')}}" class="card-header d-flex align-items-center" id="headingOne">
                                    @csrf
                                    <img src="${data.image}" width="25px" class="border border-2 me-3" alt="">
                                    <h5 class="mb-0">
                                        <button type="submit" class="btn btn-sendMail btn-link collapsed d-flex align-items-center justify-content-between" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                            ${data.name} - (Đây có phải tài khoản của bạn!)
                                        </button>
                                    </h5>
                                    <input type="hidden" value="${data.id}" name="id_user" />
                                </form>
                            </div>
                        `;
                        $("#accordion").html(content);
                    },
                    error: function (data) {
                        let responseJSON = data.responseJSON.errors;
                        $("#error-email").text(responseJSON['email'][0]);
                    }
                })
            });
        });
    </script>
@endpush

