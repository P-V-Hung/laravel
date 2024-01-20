<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/feather.css')}}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @yield('style')
    <title>Trang chủ</title>
</head>

<body class="color-theme-blue mont-font">

@include('sweetalert::alert')

<div class="preloader"></div>


<div class="main-wrapper">

    <!-- navigation top-->
    @include('contents.navbar-top')
    <!-- navigation top -->

    @yield('main')

<script src="{{asset('assets/js/plugin.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
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
</script>
@stack('script')
</body>
</html>
