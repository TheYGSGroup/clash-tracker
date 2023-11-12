@extends('app')

@section('content')

<div>
    <a href="{{route('accounts.create')}}">Track New Account</a>
</div>
<div>
    <table>
        <thead>
            <tr>
                <th>Player Tag</th>
                <th>Last Updated</th>
                <th>Has Been Pulled</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>
                        <a href="{{route('accounts.show', $account->id)}}">{{$account->player_tag}}</a>
                    </td>
                    <td>{{$account->updated_at}}</td>
                    <td>{{is_null($account->player_data) ? 'No' : 'Yes'}}</td>
                    <td>
                        <form action="{{route('accounts.destroy', $account->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {{$accounts->links()}}
</div>

@endsection
