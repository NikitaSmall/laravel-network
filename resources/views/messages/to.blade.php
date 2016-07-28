@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Messages to {{ Auth::user()->name }}</div>

                <div class="panel-body" id="messages">
                    @foreach($messages as $message)
                        <div class="message">
                            {{ $message->body }}
                            <br /> 
                            from {{ $message->user->name }}
                        </div>                     
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="/js/listen.js"></script>
@endpush

@endsection
