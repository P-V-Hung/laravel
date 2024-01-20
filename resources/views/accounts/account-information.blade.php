@extends('layouts.app')
@section('style')
{{--    <link rel="stylesheet" href="{{asset('assets/css/style-rtl.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/css/emoji.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
@endsection
@section('content')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="middle-wrap">
                <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                        <a href="{{route('settings')}}" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                        <h4 class="font-xs text-white fw-600 me-4 mb-0 mt-2">Account Details</h4>
                    </div>
                    <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 text-center">
                                <figure class="avatar me-auto ms-auto mb-0 mt-2 w100"><img src="{{ asset(($user->image))}}" alt="image" class="shadow-sm rounded-3 w-100"></figure>
                                <h2 class="fw-700 font-sm text-grey-900 mt-3">{{$user->name}}</h2>
                                <h4 class="text-grey-500 fw-500 mb-3 font-xsss mb-4">{{$user->email}}</h4>
                                <!-- <a href="#" class="p-3 alert-primary text-primary font-xsss fw-500 mt-2 rounded-3">Upload New Photo</a> -->
                            </div>
                        </div>

                        <form action="{{route('account-information')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">First Name</label>
                                        <input type="text" value="{{old('firstName') ?? $information->first_name}}" name="firstName" class="form-control">
                                        @error('firstName')
                                        <span class="text-danger fw-600 fs-5">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Last Name</label>
                                        <input type="text" value="{{old('lastName') ?? $information->last_name}}" name="lastName" class="form-control">
                                        @error('lastName')
                                        <span class="text-danger fw-600 fs-5">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Birthday</label>
                                        <input type="date" value="{{old('birthday') ?? $information->birthday}}" name="birthday" class="form-control">
                                        @error('birthday')
                                        <span class="text-danger fw-600 fs-5">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Phone</label>
                                        <input type="text" value="{{old('phone') ?? $information->phone}}" name="phone" class="form-control">
                                        @error('phone')
                                        <span class="text-danger fw-600 fs-5">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">From</label>
                                        <input type="text" name="from" value="{{old('from') ?? $information->from}}" class="form-control">
                                        @error('from')
                                        <span class="text-danger fw-600 fs-5">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Address</label>
                                        <input type="text" name="address" value="{{old('address') ?? $information->address}}" class="form-control">
                                        @error('address')
                                        <span class="text-danger fw-600 fs-5">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Age</label>
                                        <input type="text" name="age" value="{{old('age') ?? $information->age}}" class="form-control">
                                        @error('age')
                                        <span class="text-danger fw-600 fs-5">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Relation Status</label>
                                        <input type="text" name="relationStatus" value="{{old('relationStatus') ?? $information->relation_status}}" class="form-control" placeholder="Độc thân ...">
                                        @error('relationStatus')
                                        <span class="text-danger fw-600 fs-5">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <div class="card mt-3 border-0">
                                        <div class="card-body d-flex justify-content-between align-items-end p-0">
                                            <div class="form-group mb-0 w-100">
                                                <input type="file" name="image" id="file" class="input-file">
                                                <label for="file" class="rounded-3 text-center bg-white btn-tertiary js-labelFile p-4 w-100 border-dashed">
                                                    <i class="ti-cloud-down large-icon ms-3 d-block"></i>
                                                    <span class="js-fileName">Click to replace avatar</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label class="mont-font fw-600 font-xsss">Description</label>
                                    <textarea name="desc" class="form-control mb-0 p-3 h100 bg-greylight lh-16" rows="5" placeholder="Write your message..." spellcheck="false">
                                        {{old('desc') ?? $information->desc}}
                                    </textarea>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- <div class="card w-100 border-0 p-2"></div> -->
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{asset('assets/js/scripts-rtl.js')}}"></script>
@endpush
