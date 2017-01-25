@extends('layouts.sidebar')

@section('container')
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0)" style="color:#fff;">Participants</a>
        </div>
        <ul class="nav navbar-nav">
            <li {{(Request::is('bjj-participants') || Request::is('bjj-participants/*')) ? 'class=active': '' }}>
                <a href="{{route('bjj-participants.index')}}">BJJ Participants</a>
            </li>
            <li {{(Request::is('mma-participants') || Request::is('mma-participants/*')) ? 'class=active': '' }}>
                <a href="{{route('mma-participants.index')}}">MMA Participants</a>
            </li>
        </ul>
    </nav>
    <h1>New MMA Participant</h1>

    <hr>

    <div class="col-md-8 col-md-offset-2">
        <form role="form" action="{{route('mma-participants.store')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group {{$errors->has('first_name') ? 'has-error' : ''}}">
                        <label for="first_name">First name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Name" value="{{old('first_name')}}">
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('last_name') ? 'has-error' : ''}}">
                        <label for="last_name">Last name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Surname" value="{{old('last_name')}}">
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="Male" {{old('gender') == 'Male' ? 'selected' : ''}}>Male</option>
                            <option value="Female" {{old('gender') == 'Female' ? 'selected' : ''}}>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mma_event_id">Event</label>
                        <select class="form-control" id="mma_event_id" name="mma_event_id">
                                @foreach($events as $event)
                                <option value="{{$event->id}}" {{old('mma_event_id') == $event->id ? 'selected' : ''}}>{{$event->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age_group">Age group</label>
                        <select class="form-control" id="age_group" name="age_group">
                            <option value="Teen" {{old('age_group') == 'Teen' ? 'selected' : ''}}>Teen</option>
                            <option value="Adult" {{old('age_group') == 'Adult' ? 'selected' : ''}}>Adult</option>
                            <option value="Master" {{old('age_group') == 'Master' ? 'selected' : ''}}>Master</option>
                        </select>
                    </div>
                    <div class="form-group {{$errors->has('date_of_birth') ? 'has-error' : ''}}">
                        <label for="datetimepicker1">Date of birth</label>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" placeholder="Date of birth" name="date_of_birth" value="{{old('date_of_birth')}}">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            @if ($errors->has('date_of_birth'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" id="level" name="level">
                            <option value="Beginner - 1 year" {{old('level') == 'Beginner - 1 year' ? 'selected' : ''}}>Beginner - 1 year</option>
                            <option value="Intermediate - 2 years" {{old('level') == 'Intermediate - 2 years' ? 'selected' : ''}}>Intermediate - 2 years</option>
                            <option value="Advanced +2 years" {{old('level') == 'Advanced +2 years' ? 'selected' : ''}}>Advanced +2 years</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="weight">Weight Category</label>
                        <select class="form-control" id="weight" name="weight_category">
                            <option value="50kg" {{old('weight_category') == '50kg' ? 'selected' : ''}}>50kg</option>
                            <option value="55kg" {{old('weight_category') == '55kg' ? 'selected' : ''}}>55kg</option>
                            <option value="60kg" {{old('weight_category') == '60kg' ? 'selected' : ''}}>60kg</option>
                            <option value="65kg" {{old('weight_category') == '65kg' ? 'selected' : ''}}>65kg</option>
                            <option value="70kg" {{old('weight_category') == '70kg' ? 'selected' : ''}}>70kg</option>
                            <option value="75kg" {{old('weight_category') == '75kg' ? 'selected' : ''}}>75kg</option>
                            <option value="80kg" {{old('weight_category') == '80kg' ? 'selected' : ''}}>80kg</option>
                            <option value="85kg" {{old('weight_category') == '85kg' ? 'selected' : ''}}>85kg</option>
                            <option value="90kg" {{old('weight_category') == '90kg' ? 'selected' : ''}}>90kg</option>
                            <option value="90+kg" {{old('weight_category') == '90+kg' ? 'selected' : ''}}>90+kg</option>
                        </select>
                    </div>
                    <div class="form-group {{$errors->has('years_training') ? 'has-error' : ''}}">
                        <label for="years_training">Years training</label>
                        <input type="number" class="form-control" id="years_training" placeholder="Number of years training" name="years_training" value="{{old('years_training')}}">
                        @if ($errors->has('years_training'))
                            <span class="help-block">
                            <strong>{{ $errors->first('years_training') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('club_name') ? 'has-error' : ''}}">
                        <label for="club_name">Club</label>
                        <input type="text" class="form-control" id="club_name" placeholder="Club name" name="club_name" value="{{old('club_name')}}">
                        @if ($errors->has('club_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('club_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('instructor_name') ? 'has-error' : ''}}">
                        <label for="instructor_name">Coach</label>
                        <input type="text" class="form-control" id="instructor_name" placeholder="Coach name" name="instructor_name" value="{{old('instructor_name')}}">
                        @if ($errors->has('instructor_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('instructor_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}" novalidate>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('phone_number') ? 'has-error' : ''}}">
                        <label for="phone_number">Phone</label>
                        <input type="text" class="form-control" id="phone_number" placeholder="Phone number" name="phone_number" value="{{old('phone_number')}}">
                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
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
                format: 'DD-MM-YYYY'
            });
        });
    </script>
@endsection