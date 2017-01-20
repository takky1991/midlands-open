@extends('layouts.bjj')

@section('container')

    <div class="bjj-events-page">
        @if(session()->has('status'))
            <div class="alert alert-success" role="alert">{{session()->get('status')}}</div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">{{session()->get('error')}}</div>
        @endif
        <h2>Upcoming event</h2>
        @foreach($upcomingEvents as $event)
            <div class="list-group">
                <div class="list-group-item bjj-list-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-9">
                            <h3 class="list-group-item-heading">{{$event->title}}</h3>
                            <h4><strong>Event start date:</strong> {{$event->event_start->format('l jS F Y')}}</h4>
                            <h5>{{$event->content}}</h5>
                            <a href="{{route('bjj_register')}}" class="bjj-register-button">Register for this event</a>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <img class="bjj-logo" src="{{asset('images/final_bjj_logo.png')}}" alt="">
                        </div>
                    </div>
                    @include('bjj.competitor_table', ['event' => $event])
                </div>
            </div>
        @endforeach

        @if($upcomingEvents->isEmpty())
            <h4>No upcoming events for now</h4>
        @endif

        <h2>Past events</h2>
        @foreach($pastEvents as $event)
            <div class="list-group">
                <div class="list-group-item bjj-list-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-9">
                            <h3 class="list-group-item-heading">{{$event->title}}</h3>
                            <h4><strong>Event start date:</strong> {{$event->event_start->format('l jS F Y')}}</h4>
                            <h5>{{$event->content}}</h5>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <img class="bjj-logo" src="{{asset('images/final_bjj_logo.png')}}" alt="">
                        </div>
                    </div>
                    <br>
                    @foreach($event->results->groupBy('title') as $category)
                        @include('bjj.table', ['results' => $category->sortBy('place')])
                    @endforeach
                </div>
            </div>
        @endforeach

        @if($pastEvents->isEmpty())
            <h4>No past events for now</h4>
        @endif
    </div>

@endsection