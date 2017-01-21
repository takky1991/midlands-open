@extends('layouts.sidebar')

@section('container')
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0)" style="color:#fff;">Results</a>
        </div>
        <ul class="nav navbar-nav">
            <li {{(Request::is('bjj-results') || Request::is('bjj-results/*')) ? 'class=active': '' }}>
                <a href="{{route('bjj-results.index')}}">BJJ Results</a>
            </li>
            <li {{(Request::is('mma-results') || Request::is('mma-results/*')) ? 'class=active': '' }}>
                <a href="{{route('mma-results.index')}}">MMA Results</a>
            </li>
        </ul>
    </nav>
    <h1>New MMA Result</h1>

    <hr>

    <div class="col-md-8 col-md-offset-2">
        <form role="form" action="{{route('mma-results.store')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="mma_event_id">Event</label>
                        <select class="form-control" id="mma_event_id" name="mma_event_id">
                            @foreach($events as $event)
                                <option value="{{$event->id}}" {{old('mma_event_id') == $event->id ? 'selected' : ''}}>{{$event->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                        <label for="title">Title of category</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="For example: 60kg Man" value="{{old('title')}}">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('place') ? 'has-error' : ''}}">
                        <label for="place">Rank</label>
                        <input type="text" class="form-control" id="place" name="place" placeholder="For example: 1st" value="{{old('place')}}">
                        @if ($errors->has('place'))
                            <span class="help-block">
                                <strong>{{ $errors->first('place') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('name_and_surname') ? 'has-error' : ''}}">
                        <label for="name_and_surname">Name and Surname</label>
                        <input type="text" class="form-control" id="name_and_surname" name="name_and_surname" placeholder="Name and Surname" value="{{old('name_and_surname')}}">
                        @if ($errors->has('name_and_surname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name_and_surname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('club_name') ? 'has-error' : ''}}">
                        <label for="club_name">Club Name</label>
                        <input type="text" class="form-control" id="club_name" name="club_name" placeholder="Club Name" value="{{old('club_name')}}">
                        @if ($errors->has('club_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('club_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection