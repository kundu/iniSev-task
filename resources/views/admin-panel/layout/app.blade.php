<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@if(isset($title)) {{$title}}  @endif</title>

    @include('admin-panel.partial.css')
</head>

<body>
    <div class="container-scroller">

        @include('admin-panel.partial.left-menu')

        <div class="container-fluid page-body-wrapper">

            @include('admin-panel.partial.header')

          <div class="main-panel">

                @yield('content')
                @include('admin-panel.partial.footer')

          </div>
        </div>
    </div>
    @include('admin-panel.partial.js')
    @include('admin-panel.partial._message')
    @include('admin-panel.partial.error-message')

</body>

</html>
