@include('partials.doctype')
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>{{ config('app.name') }} | @yield('title')</title>
        
        @include('assets.favicon')
        
        @include('assets.fonts')

        @include('assets.styles')
    </head>
    <body>
        <div class="container-overflow-wrap">
            <div class="container">
                @include('layouts.header')
                
                @yield('content')
                
                @include('layouts.footer')
            </div>
        </div>
        
        @include('assets.scripts')
    </body>
</html>
