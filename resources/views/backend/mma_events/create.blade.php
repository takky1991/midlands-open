@extends('layouts.sidebar')

@section('container')
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0)" style="color:#fff;">Events</a>
        </div>
        <ul class="nav navbar-nav">
            <li {{(Request::is('bjj-events') || Request::is('bjj-events/*')) ? 'class=active': '' }}>
                <a href="{{route('bjj-events.index')}}">BJJ Events</a>
            </li>
            <li {{(Request::is('mma-events') || Request::is('mma-events/*')) ? 'class=active': '' }}>
                <a href="{{route('mma-events.index')}}">MMA Events</a>
            </li>
        </ul>
    </nav>
    <h1>New MMA Event</h1>

    <hr>

    <div class="col-md-8 col-md-offset-2">
        <form role="form" action="{{route('mma-events.store')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{old('title')}}">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('event_start') ? 'has-error' : ''}}">
                        <label for="datetimepicker1">Event Start</label>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" placeholder="Event start date" name="event_start" value="{{old('event_start')}}">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            @if ($errors->has('event_start'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('event_start') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('content') ? 'has-error' : ''}}">
                        <label for="content">Content</label>
                        <input type="text" class="form-control" id="content" name="content" placeholder="Content" value="{{old('content')}}">
                        @if ($errors->has('content'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('early_reg_fee') ? 'has-error' : ''}}">
                        <label for="early_reg_fee">Early reg. fee (in cents)</label>
                        <input type="number" class="form-control" id="early_reg_fee" name="early_reg_fee" placeholder="For example: 1500" value="{{old('early_reg_fee')}}">
                        @if ($errors->has('early_reg_fee'))
                            <span class="help-block">
                                <strong>{{ $errors->first('early_reg_fee') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('late_reg_fee') ? 'has-error' : ''}}">
                        <label for="late_reg_fee">Late reg. fee (in cents)</label>
                        <input type="number" class="form-control" id="late_reg_fee" name="late_reg_fee" placeholder="For example: 1500" value="{{old('late_reg_fee')}}">
                        @if ($errors->has('late_reg_fee'))
                            <span class="help-block">
                                <strong>{{ $errors->first('late_reg_fee') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('teen_early_reg_fee') ? 'has-error' : ''}}">
                        <label for="teen_early_reg_fee">Teen early reg. fee (in cents)</label>
                        <input type="number" class="form-control" id="teen_early_reg_fee" name="teen_early_reg_fee" placeholder="For example: 1500" value="{{old('teen_early_reg_fee')}}">
                        @if ($errors->has('teen_early_reg_fee'))
                            <span class="help-block">
                                <strong>{{ $errors->first('teen_early_reg_fee') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('teen_late_reg_fee') ? 'has-error' : ''}}">
                        <label for="teen_late_reg_fee">Teen late reg. fee (in cents)</label>
                        <input type="number" class="form-control" id="teen_late_reg_fee" name="teen_late_reg_fee" placeholder="For example: 1500" value="{{old('teen_late_reg_fee')}}">
                        @if ($errors->has('teen_late_reg_fee'))
                            <span class="help-block">
                                <strong>{{ $errors->first('teen_late_reg_fee') }}</strong>
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
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD hh:mm:ss'
            });
        });
    </script>
@endsection