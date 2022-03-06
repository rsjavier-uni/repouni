<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon"/>
    <title>{{ trans($ajustes->titulo_sitio) }}</title>
    @include('sites.global-partials.style')
    @include('sites.global-partials.script')
</head>
