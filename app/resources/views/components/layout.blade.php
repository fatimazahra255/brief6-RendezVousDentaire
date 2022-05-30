<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'dentist' }}</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/navigation.css">
    @stack('styles')
</head>

<body>
    {{-- <a href="{{ createLink('/') }}">create</a> --}}
    {{-- <a href="{{ createLink('/history')}}">history</a> --}}
    {{-- <a href="{{ createLink('/logout')}}">logout</a> --}}
    @if (isLoggedIn())
        @component('components.Navigation')
        @endcomponent
    @endif
    {{ $slot }}
</body>

</html>
