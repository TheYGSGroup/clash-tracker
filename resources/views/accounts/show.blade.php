@extends('app')


@section('content')
<a href="{{route('accounts.index')}}">Back</a>

<x-bladewind.card has_shadow="true" title="Information">
    <p><b>Name:</b> {{$account->player_data["name"]}}</p>
</x-bladewind.card>

<x-bladewind.card has_shadow="true" class="mt-2" title="Heroes">
    @if(count($account->player_data["heroes"]) > 0)
        @foreach($account->player_data["heroes"] as $hero)
            <p>{{$hero["name"]}} ({{$hero["level"]}})</p>

            @php
                $percentage = round($hero["level"]/$hero["maxLevel"]*100);
            @endphp

            <x-bladewind.progress-bar percentage="{{($percentage > 100) ? 100 : $percentage}}" show_percentage_label_inline="false"
                percentage_label_position="top right"
                show_percentage_label="true"/>
        @endforeach
    @else
        <p class="text-center">No Heroes available</p>
    @endif

</x-bladewind.card>

<x-bladewind.card has_shadow="true" class="mt-2" title="Spells">
    @foreach($account->player_data["spells"] as $spell)
        <p>{{$spell["name"]}} ({{$spell["level"]}})</p>

        @php
            $percentage = round($spell["level"]/$spell["maxLevel"]*100);
        @endphp

        <x-bladewind.progress-bar percentage="{{($percentage > 100) ? 100 : $percentage}}" show_percentage_label_inline="false"
            percentage_label_position="top right"
            show_percentage_label="true"/>
    @endforeach
</x-bladewind.card>

<x-bladewind.card has_shadow="true" class="mt-2" title="Troops">
    @foreach($account->player_data["troops"] as $troop)
        <p>{{$troop["name"]}} ({{$troop["level"]}})</p>

        @php
            $percentage = round($troop["level"]/$troop["maxLevel"]*100);
        @endphp

        <x-bladewind.progress-bar percentage="{{($percentage > 100) ? 100 : $percentage}}" show_percentage_label_inline="false"
            percentage_label_position="top right"
            show_percentage_label="true"/>
    @endforeach
</x-bladewind.card>

@endsection
