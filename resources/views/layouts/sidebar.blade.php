@extends('layouts.backend')

@section('content')
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{route('backend.home')}}">
                        Midlands Open
                    </a>
                </li>
                <li class="sidebar-user">
                    <a href="#user" data-toggle="collapse" class="collapsed">
                        {{Auth::user()->name}}<i class="fa fa-angle-up" aria-hidden="true"></i>
                    </a>
                    <div id="user" class="collapse">
                        <a href="{{ url('/logout') }}"
						    onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
                            Logout
                        </a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
                    </div>
                </li>
                <li {{Request::is('home') ? 'class=active': '' }}>
                    <a href="{{route('backend.home')}}">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li {{(Request::is('bjj-participants')
                    || Request::is('bjj-participants/*') 
                    || Request::is('mma-participants') 
                    || Request::is('mma-participants/*')) ? 'class=active': '' }}>
                    <a href="{{route('bjj-participants.index')}}">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>Participants</p>
                    </a>
                </li>
            </ul>
            <i id="menu-toggle" class="fa fa-caret-left menu-toggle" aria-hidden="true"></i>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            @yield('container')
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection