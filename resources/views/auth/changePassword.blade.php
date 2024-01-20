@extends('layouts.auth')
@section('content')
    <div class="row">
        <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url({{asset('images/login-bg-2.jpg')}});"></div>
        <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
            <div class="card shadow-none border-0 ms-auto me-auto login-card">
                <div class="card-body rounded-0 text-left">
                    <h2 class="fw-700 display1-size display2-md-size mb-4">Change <br>your password</h2>
                    <form method="POST" id="form-changePassword" action="{{route('auth.changePassword')}}">
                        @csrf
                        <div class="form-group icon-input mb-3">
                            <input type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" name="password" placeholder="New Password">
                            <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            <p class="error error-password text-danger fw-600 fs-4"></p>
                        </div>
                        <div class="form-group icon-input mb-3">
                            <input type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" name="rePassword" placeholder="Re Password">
                            <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            <p class="error error-rePassword text-danger fw-600 fs-4"></p>
                        </div>
                        <input type="hidden" value="{{$id}}" name="id"/>
                        <div class="col-sm-12 p-0 text-left">
                            <div class="form-group mb-1"><button id="btn-changePassword" type="button" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Change Password</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            btn = $("#btn-changePassword");
            form = $("#form-changePassword");
            btn.click(function (){
                $(".error").text('');
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    data: new FormData(form.get(0)),
                    success: function (data){
                        window.location.href = data.redirect;
                    },
                    error: function (data){
                        let responseJSON = data.responseJSON.errors;
                        for(const [type,item] of Object.entries(responseJSON)){
                            $(".error-"+type).text(item[0]);
                        }
                    }
                });
            });
        });
    </script>
@endpush
