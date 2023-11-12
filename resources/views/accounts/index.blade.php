@extends('app')

@section('content')


    <div class="mb-5">
        <a href="{{route('accounts.create')}}">Track New Account</a>
    </div>

    <x-bladewind.table>
        <x-slot name="header">
            <th>Player Tag</th>
            <th>Last Updated</th>
        </x-slot>

        @foreach ($accounts as $account)
            <tr>
                <td><a href="{{route('accounts.show', $account->id)}}">{{$account->player_tag}}</a></td>
                <td>{{$account->updated_at}}</td>
            </tr>
        @endforeach
    </x-bladewind.table>

@endsection
