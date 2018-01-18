<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
            
        <!-- Menü-Header -->
        <div class="navbar-header">
            <!-- Hamburger für Mobiles -->
            <button class="nav navbar-toggle" data-toggle="collapse" data-target="#mwd-right-menu">
                    <span class="sr-only">Menü aufklappen</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            </button>
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('/') }}">
                <img class="light" src="{{ asset('storage/img/medani-logo-rund.png') }}">
            </a>
        </div>
        
        <!-- Linkes Menü -->
        <div id="mwd-left-menu" class="collapse navbar-collapse navbar-left">
            <ul class="nav nav-tabs">
                <li class="{{ (Request::is('offers') ? 'active' : '') }}" role="presentation">
                        <a href="{{ url('offers') }}">Angebote</a>
                </li>
                <li class="{{ (Request::is('texts') ? 'active' : '') }}" role="presentation">
                        <a href="{{ url('texts') }}">Texte</a>
                </li>
                <li class="{{ (Request::is('customers') ? 'active' : '') }}" role="presentation">
                        <a href="{{ url('customers') }}">Kunden</a>
                </li>
                <li class="{{ (Request::is('settings') ? 'active' : '') }}" role="presentation">
                        <a href="{{ url('settings') }}">Einstellungen</a>
                </li>
            </ul>
        </div>
            
        <!-- Rechtes Menü -->
        <div id="mwd-right-menu" class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                @if (Auth::check())
                    <li><a>
                        <img src="{{ Auth::user()->avatarUrl }}" />
                        {{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}
                    </a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <li><a href="{{ url('/') }}">Login</a></li>
                @endif
            </ul>
        </div>
        
    </div>
</nav>
