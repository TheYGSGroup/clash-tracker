<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

</head>
<body>
    <x-bladewind.centered-content size="big" class="p-5">
        @yield('content')
    </x-bladewind.centered-content>


    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

    @yield('scripts')
</body>
</html>
