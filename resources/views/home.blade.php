@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <br>
                    Current Odessa temperature is: {{ $weather->temp }} C. 
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }}</div>

                <div class="panel-body">
                    <img src="{{ $user->avatar }}">
                    <div>{{ $user->email }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Friendlist</div>

                <div class="panel-body">
                    <form class="form-inline" method="GET" action="{{ route('search_friend') }}">
                        <input name="username" type="text" class="form-control" placeholder="Search a friend" id="friend-search">
                    </form>
                    <br>
                    
                    <div id="friends">
                        @foreach($user->friends() as $friend)
                            <div>{{ $friend->name }} <a href="{{ route('send_message', $friend->id) }}">Send a message</a>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Become a friend of that user!</div>

                <div class="panel-body">
                    <form  class="form-inline" method="GET" action="{{ route('search_user') }}">
                        <input type="text" name="username" placeholder="User name query" class="form-control" required="true">
                        <input type="submit" class="btn btn-default" value="Search!">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
