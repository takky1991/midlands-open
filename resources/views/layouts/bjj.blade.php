@extends('layouts.app')

@section('content')

    @include('bjj.header')

    <div class="bjj-wrapper">
        @yield('container')
    </div>

    @include('bjj.footer')
@endsection