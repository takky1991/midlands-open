@extends('layouts.app')

@section('content')

    @include('mma.header')

    <div class="mma-wrapper">
        @yield('container')
    </div>

    @include('mma.footer')

@endsection