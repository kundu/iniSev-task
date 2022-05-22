<!DOCTYPE html>
<html lang="en">

    @php
        $settingsData = \Cache::get('settings');
    @endphp

<head>
    @include('frontend.layout.header')

    {!!  $settingsData['live_chat_code'] ?? "" !!}
</head>

<body>

    @include('frontend.layout.loader')

    @include('frontend.layout.menu')

    @yield('content')

    @include('frontend.layout.footer')

    @include('frontend.layout.js')
    @include('admin-panel.partial._message')
    @include('admin-panel.partial.error-message')

</body>

</html>
