<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title') | CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/0527a7a8a4.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Laravel Toast -->
    <livewire:toasts />

    @yield('content')

    <!-- Laravel Toast -->
    @livewireScriptConfig
</body>

</html>
