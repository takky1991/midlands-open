@extends('layouts.sidebar')

@section('container')
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0)" style="color:#fff;">Results</a>
        </div>
        <ul class="nav navbar-nav">
            <li {{Request::is('bjj-results') ? 'class=active': '' }}>
                <a href="{{route('bjj-results.index')}}">BJJ Results</a>
            </li>
            <li {{Request::is('mma-results') ? 'class=active': '' }}>
                <a href="{{route('mma-results.index')}}">MMA Results</a>
            </li>
        </ul>
    </nav>

    <h1>MMA Results</h1>
    
    <hr>

    <a href="{{route('mma-results.create')}}" class="btn btn-primary">Create Result</a>

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
                <td>Event</td>
                <td>Title</td>
                <td>Place</td>
                <td>Name and Surname</td>
                <td>Club Name</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        @foreach($results as $key => $value)
            <tr>
                <td>{{ $value->mma_event->title }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->place }}</td>
                <td>{{ $value->name_and_surname }}</td>
                <td>{{ $value->club_name }}</td>
                <td style="text-align:center;">
                    <a href="{{ URL::to('mma-results/' . $value->id . '/edit') }}">
                        <i class="fa fa-pencil edit-icon" aria-hidden="true"></i>
                    </a>
                    <a href="{{ URL::to('mma-results/' . $value->id) }}"
                            onclick="{{'confirmDelete' . $value->id . '()'}}">
                        <i class="fa fa-trash delete-icon" aria-hidden="true"></i>
                    </a>
					<form id="delete-{{$value->id}}" action="{{ URL::to('mma-results/' . $value->id ) }}" method="POST" style="display: none;">
						{{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
					</form>
                </td>
            </tr>
            <script>
                function {{'confirmDelete' . $value->id . '()'}}{
                    event.preventDefault();
                    var r = confirm("You are about to delete a result!");
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
        {{$results->links()}}
    </div>
@endsection