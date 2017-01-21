@extends('layouts.sidebar')

@section('container')
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0)" style="color:#fff;">Events</a>
        </div>
        <ul class="nav navbar-nav">
            <li {{Request::is('bjj-events') ? 'class=active': '' }}>
                <a href="{{route('bjj-events.index')}}">BJJ Events</a>
            </li>
            <li {{Request::is('mma-events') ? 'class=active': '' }}>
                <a href="{{route('mma-events.index')}}">MMA Events</a>
            </li>
        </ul>
    </nav>

    <h1>MMA Events</h1>
    
    <hr>

    <a href="{{route('mma-events.create')}}" class="btn btn-primary">Create Event</a>

    <hr>
    
    <!-- will be used to show any messages -->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <p><strong>*Note:</strong> Deleting an event will delete all <strong>participants</strong> and all <strong>results</strong> that are registered to the event.</p>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Title</td>
                <td>Event Start</td>
                <td>Content</td>
                <td>Early reg. fee (in cents)</td>
                <td>Late reg. fee (in cents)</td>
                <td>Teen early reg. fee (in cents)</td>
                <td>Teen late reg. fee (in cents)</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        @foreach($events as $key => $value)
            <tr>
                <td>{{ $value->title }}</td>
                <td>{{ $value->event_start }}</td>
                <td>{{ $value->content }}</td>
                <td>{{ $value->early_reg_fee }}</td>
                <td>{{ $value->late_reg_fee }}</td>
                <td>{{ $value->teen_early_reg_fee }}</td>
                <td>{{ $value->teen_late_reg_fee }}</td>
                <td style="text-align:center;">
                    <a href="{{ URL::to('mma-events/' . $value->id . '/edit') }}">
                        <i class="fa fa-pencil edit-icon" aria-hidden="true"></i>
                    </a>
                    <a href="{{ URL::to('mma-events/' . $value->id) }}"
                            onclick="confirmDelete()">
                        <i class="fa fa-trash delete-icon" aria-hidden="true"></i>
                    </a>
					<form id="delete-{{$value->id}}" action="{{ URL::to('mma-events/' . $value->id ) }}" method="POST" style="display: none;">
						{{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
					</form>
                </td>
            </tr>
            <script>
                function confirmDelete(){
                    event.preventDefault();
                    var r = confirm("You are about to delete an event and all participants and results of this event!");
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
        {{$events->links()}}
    </div>
@endsection