  <!DOCTYPE html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <title>{{ trans('Admin Control Panel') }}</title>
    @include('admin.global-partials.style')
    @include('admin.global-partials.script')
 