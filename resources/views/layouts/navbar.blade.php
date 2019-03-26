<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{url('/#page-top')}}">victorf</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" 
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{url('/#about')}}">{{__('About')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{url('/#portfolio')}}">{{__('Recent Work')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{url('/#contact')}}">{{__('Contact')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog')}}">{{__('Blog')}}</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">{{__('Dashboard')}}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>