@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Messages to {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @foreach($messages as $message)
                        <br>
                        {{ $message->body }} | <form method="POST" action="{{ route('read_message', $message->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <input type="submit" class="btn btn-default" value="Read it!">
                        </form><br>
                        from {{ $message->user->name }}
                            
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
