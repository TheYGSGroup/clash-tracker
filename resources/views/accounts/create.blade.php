@extends('app')

@section('content')
<div class="mb-5">
    <a href="{{route('accounts.index')}}">Back</a>
</div>

<form action="{{route('accounts.store')}}" method="POST">
    @csrf

    <x-bladewind.input type="text" name="player_tag" label="Player Tag" placeholder="#OOOOOOOO"/>

    @error('player_tag')
        <x-bladewind.alert
            type="error" show_close_icon="false">
        {{$message}}
        </x-bladewind.alert>
    @enderror

    <x-bladewind.button
    can_submit="true"
    class="mx-auto block">Track Account</x-bladewind.button>
</form>

@endsection
