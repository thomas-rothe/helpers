<html>
    <head>
        <title>My Site | @yield('title', 'Home Page')</title>
        
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
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
