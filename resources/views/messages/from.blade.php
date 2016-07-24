@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Messages from {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @foreach($messages as $message)
                        {{ $message->body }} <br>
                        to {{ $message->recipient()->name }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
