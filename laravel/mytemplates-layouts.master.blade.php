@include('partials.doctype.html5')
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>My Site | @yield('title', 'Home Page')</title>
        
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show
        
        <div class="container">
            @yield('content')
        </div>
        
        @section('footerScripts')
            <script	src="app.js"></script>
        @show
    </body>
</html>
