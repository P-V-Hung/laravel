@extends('layouts.index')
@section('main')
    <!-- main content -->
    <div class="main-content pt-0 bg-white pe-0 ps-0">
        @yield('content')
    </div>
    <!-- main content -->


    @include('contents.navbar-reponsive')
@endsection
@push('script')
    <script>
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
    </script>
@endpush

