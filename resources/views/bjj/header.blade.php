<nav class="navbar navbar-default bjj-header">
    <div class="container-fluid max-width">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('bjj_index')}}">
            <img src="{{asset('images/final_bjj_logo.png')}}" alt="">
        </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li {{Request::is('bjj/about') ? 'class=active' : '' }}>
                <a href="{{route('bjj_about')}}" class="bjj-header-link">About</a>
            </li>
            <li {{Request::is('bjj/rules') ? 'class=active' : '' }}>
                <a href="{{route('bjj_rules')}}" class="bjj-header-link">Rules</a>
            </li>
            <li {{Request::is('bjj/events') ? 'class=active' : '' }}>
                <a href="{{route('bjj_events')}}" class="bjj-header-link">Events</a>
            </li>
            <li {{Request::is('bjj/register') ? 'class=active' : '' }}>
                <a href="{{route('bjj_register')}}" class="bjj-header-link">Register</a>
            </li>
            <li {{Request::is('bjj/gallery') ? 'class=active' : '' }}>
                <a href="{{route('bjj_gallery')}}" class="bjj-header-link">Gallery</a>
            </li>
            <li {{Request::is('bjj/location') ? 'class=active' : '' }}>
                <a href="{{route('bjj_location')}}" class="bjj-header-link">Location</a>
            </li>
            <li {{Request::is('bjj/contact') ? 'class=active' : '' }}>
                <a href="{{route('bjj_contact')}}" class="bjj-header-link">Contact</a>
            </li>
        </ul>
        <ul class="nav navbar-nav" style="float:right;">
            <li>
                <a href="{{route('homepage')}}" class="bjj-header-link">Midlands Open</a>
            </li>
        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>