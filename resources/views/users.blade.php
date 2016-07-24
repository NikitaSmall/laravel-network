@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> User search</div>

                <div class="panel-body">
                    Search result:
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Userlist</div>

                <div class="panel-body">
                    @foreach($users as $user)
                        <div>{{ $user->name }} 
                            @if(Auth::user()->isFriend($user))
                                <form method="POST" action="{{ route('remove_friend', $user->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-warning" type="submit" value="Remove a friend">
                                </form>
                            @else
                                <form method="POST" action="{{ route('create_friend', ['user_id' => Auth::user()->id, 'other_id' => $user->id]) }}">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-success" value="Become a friends!">
                                </form>
                            @endif
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
