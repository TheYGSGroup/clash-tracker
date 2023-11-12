@extends('app')

@section('content')
<a href="{{route('accounts.index')}}">Back</a>


<form action="{{route('accounts.store')}}" method="POST">
    @csrf
    <input type="text" name="player_tag" id="player_tag">

    @error('player_tag')
        {{$message}}
    @enderror
    <input type="submit" value="Track">
</form>

@endsection
