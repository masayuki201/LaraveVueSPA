<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Vue SPA') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <v-app>
        <header-component></header-component>

        <router-view></router-view>

        <footer-component></footer-component>
    </v-app>
</div>
<!-- Scripts -->
<script src="{{ mix('/js/app.js') }}" defer></script>

{{-- <script>--}}
{{--     new Vue({--}}
{{--         el: '#app',--}}
{{--         vuetify: new Vuetify(),--}}
{{--     })--}}
{{-- </script>--}}
</body>
</html>
