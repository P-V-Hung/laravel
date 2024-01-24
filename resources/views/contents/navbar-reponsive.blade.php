<div class="app-footer border-0 shadow-lg bg-primary-gradiant">
    <a href="{{route('home')}}" class="nav-content-bttn nav-center"><i class="feather-home"></i></a>
    <a href="#" class="nav-content-bttn"><i class="feather-package"></i></a>
    <a href="#" class="nav-content-bttn" data-tab="chats"><i class="feather-layout"></i></a>
    <a href="#" class="nav-content-bttn"><i class="feather-layers"></i></a>
    <a href="{{route('settings')}}" class="nav-content-bttn"><img src="{{asset('images/female-profile.png')}}"
                                                                  alt="user" class="w30 shadow-xss"></a>
</div>

<div class="app-header-search">
    <form class="search-form" method="GET" action="{{route('friend-search')}}">
        <div class="form-group searchbox mb-0 border-0 p-1">
            <input type="text" class="form-control border-0" placeholder="Search...">
            <i class="input-icon">
                <ion-icon name="search-outline" role="img" class="md hydrated"
                          aria-label="search outline"></ion-icon>
            </i>
            <a href="#" class="ms-1 mt-1 d-inline-block close searchbox-close">
                <i class="ti-close font-xs"></i>
            </a>
        </div>
    </form>
</div>
