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
    <style>
        @keyframes blockToHide {
            from{
                opacity: 1;
            }to{
                 opacity: 0;
             }
        }
        .notification{
            width: 380px;
            bottom: 50px;
            border-radius: 3px;
            border-left:8px solid black;
            overflow: hidden;
            right: 40px;
            box-shadow: 0 0 10px 4px rgba(0, 0, 0, 0.3);
            animation: blockToHide linear 0.5s forwards;
            animation-delay: 4s;
        }
        .notification h4{
            margin: 0;
        }
        .notification p{
            margin-top: 5px;
            color: black;
            line-height: 1;
            font-weight: 500;
        }
        .success{
            border-color: #47d864;
        }
        .success .icon-stick, .success h4{
            color: #47d864;
        }
        .info{
            border-color: #2f86eb;
        }
        .info .icon-stick, .info h4{
            color: #2f86eb;
        }
        .error{
            border-color: #ff623d;
        }
        .error .icon-stick, .error h4{
            color: #ff623d;
        }
        .warning{
            border-color: #ffc021;
        }
        .warning .icon-stick, .warning h4{
            color: #ffc021;
        }
    </style>
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
<div id="log"></div>
<script src="{{asset('assets/js/plugin.js')}}"></script>
<script src="{{asset('assets/js/countdown.js')}}"></script>
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
@stack('script')
</body>
</html>
