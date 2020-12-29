<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <noscript>
            <strong>We're sorry but this app doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
        </noscript>
        <div id="app"></div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
