@extends('layouts.mma')

@section('container')

    <div class="mma-contact-page">
        @if(session()->has('status'))
            <div class="alert alert-success" role="alert">{{session()->get('status')}}</div>
        @endif
        <form action="{{route('mma_contact_form_send')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email address" value="{{old('email')}}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('message') ? 'has-error' : ''}}">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Type your message here" value="{{old('message')}}"></textarea>
                @if ($errors->has('message'))
                    <span class="help-block">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-default">Send</button>
        </form>
    </div>

@endsection