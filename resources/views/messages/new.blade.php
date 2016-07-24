@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Write message to {{ $user->name }}</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('submit_message', $user->id) }}">
                      {{ csrf_field() }}  
                      <textarea name="body" class="form-control" placeholder="Write your message">
                          
                      </textarea>

                      <input type="submit" value="Send a message" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
