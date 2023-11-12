@extends('app')


@section('content')
<a href="{{route('accounts.index')}}">Back</a>

@if (!is_null($account->player_data))
    <h1>Townhall: {{$account->player_data["townHallLevel"]}}</h1>

    @if($account->player_data["townHallLevel"] >= 7)
        <div>
            <h2>Heroes</h2>
            @foreach($account->player_data["heroes"] as $hero)
                <p>{{$hero["name"]}}: <progress value="{{$hero["level"]}}" max="{{$hero["maxLevel"]}}"></progress> {{ $hero["level"] / $hero["maxLevel"] }} </p>
            @endforeach
        </div>
    @endif

    <div>
        <h2>Spells</h2>
        @foreach($account->player_data["spells"] as $spell)
            <p>{{$spell["name"]}}: <progress value="{{$spell["level"]}}" max="{{$spell["maxLevel"]}}"></progress></p>
        @endforeach
    </div>

    <div>
        <h2>Troops</h2>
        @foreach($account->player_data["troops"] as $troop)
            <p>{{$troop["name"]}}: <progress value="{{$troop["level"]}}" max="{{$troop["maxLevel"]}}"></progress></p>
        @endforeach
    </div>
@endif


@endsection
