@extends('layouts.sidebar')

@section('container')
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0)" style="color:#fff;">Participants</a>
        </div>
        <ul class="nav navbar-nav">
            <li {{Request::is('bjj-participants') ? 'class=active': '' }}>
                <a href="{{route('bjj-participants.index')}}">BJJ Participants</a>
            </li>
            <li {{Request::is('mma-participants') ? 'class=active': '' }}>
                <a href="{{route('mma-participants.index')}}">MMA Participants</a>
            </li>
        </ul>
    </nav>

    <h1>BJJ Participants</h1>
    
    <hr>

    <a href="{{route('bjj-participants.create')}}" class="btn btn-primary">Create Participant</a>

    <hr>
    
    <!-- will be used to show any messages -->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Event</td>
                <td>Age Group</td>
                <td>Date of birth</td>
                <td>Belt</td>
                <td>Weight Catergory</td>
                <td>Club Name</td>
                <td>Instructor Name</td>
                <td>Phone Number</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        @foreach($participants as $key => $value)
            <tr>
                <td>{{ $value->first_name }}</td>
                <td>{{ $value->last_name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->bjj_event->title }}</td>
                <td>{{ $value->age_group }}</td>
                <td>{{ $value->date_of_birth }}</td>
                <td>{{ $value->belt }}</td>
                <td>{{ $value->weight_category }}</td>
                <td>{{ $value->club_name }}</td>
                <td>{{ $value->instructor_name }}</td>
                <td>{{ $value->phone_number }}</td>
                <td style="text-align:center;">
                    <a href="{{ URL::to('bjj-participants/' . $value->id . '/edit') }}">
                        <i class="fa fa-pencil edit-icon" aria-hidden="true"></i>
                    </a>
                    <a href="{{ URL::to('bjj-participants/' . $value->id) }}"
                            onclick="confirmDelete()">
                        <i class="fa fa-trash delete-icon" aria-hidden="true"></i>
                    </a>
					<form id="delete-{{$value->id}}" action="{{ URL::to('bjj-participants/' . $value->id ) }}" method="POST" style="display: none;">
						{{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
					</form>
                </td>
            </tr>
             <script>
                function confirmDelete(){
                    event.preventDefault();
                    var r = confirm("You are about to delete a participant!");
                    if (r == true) {
                        x = "You pressed OK!";
                        document.getElementById('delete-{{$value->id}}').submit();
                    }
                }
            </script>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{$participants->links()}}
    </div>
@endsection