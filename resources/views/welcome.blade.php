@extends('layouts.homepage')

@section('content')

    <div class="homepage-container">
        <div class="homepage-logo-container">
            <div class="col-xs-12">
                <h1 class="homepage-title">MIDLANDS <br> OPEN</h1>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-12 col-sm-6 logo-responsive">
                    <a href="{{route('bjj_index')}}">
                        <img src="{{asset('images/final_bjj_logo.png')}}" alt="" class="homepage-logo hvr-grow">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 logo-responsive">
                    <a href="{{route('mma_index')}}">
                        <img src="{{asset('/images/mma_logo.png')}}" alt="" class="homepage-logo hvr-grow">
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
