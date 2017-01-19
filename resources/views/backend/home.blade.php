@extends('layouts.sidebar')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome to Midlands Open Dashboard</div>

                    <div class="panel-body">
                        You are logged in! {{Request::path()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
