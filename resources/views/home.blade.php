@extends('user.app')

@section('bg-img', asset('user/img/post-bg.jpg'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <span>Hello, </span> {{Auth::user()->name}}
                        <p>You are logged in!</p>
                        <p>Yur ID is: </p>{{Auth::user()->id}}
                    </div>


            </div>
        </div>
    </div>
</div>
@endsection
