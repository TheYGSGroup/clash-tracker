<a href="{{route('accounts.index')}}">Back</a>

<h1>{{$account->player_tag}}</h1>


@if (!is_null($account->player_data))
    <p>Player Data</p>
    <pre>
        <code>{{$account->player_data}}</code>
    </pre>
@endif

