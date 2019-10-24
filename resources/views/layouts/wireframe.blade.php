<!DOCTYPE html>
<html class="has-navbar-fixed-top" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @if (Request::path() === '/')
            <title>Nachricht.co - Die verschlüsselte Einweg-Nachricht</title>
        @else
            <title>@yield('title') - Nachricht.co</title>
        @endif
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @yield('metatags')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <link rel="canonical" href="https://nachricht.co{{ Request::path() === '/' ? '' : Request::path() }}" />
    </head>
    <body>
        <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="/images/logo.png" height="25"/>
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item">
                        Home
                    </a>

                    <a class="navbar-item">
                        Documentation
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            More
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                About
                            </a>
                            <a class="navbar-item">
                                Jobs
                            </a>
                            <a class="navbar-item">
                                Contact
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                                Report an issue
                            </a>
                        </div>
                    </div>
                </div>

                @if (Route::has('login'))
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            @auth
                                <a class="button is-light" href="{{ url('/home') }}">
                                    <strong>Mein Konto</strong>
                                </a>
                            @else
                                @if (Route::has('register'))
                                <a class="button is-primary" href="{{ route('register') }}">
                                    <strong>Registrieren</strong>
                                </a>
                                @endif
                            <a class="button is-light" href="{{ route('login') }}">
                                Login
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </nav>

        <div class="content is-marginless">
            @yield('content')
        </div>

        <footer class="footer has-background-light">
            <div class="content has-text-centered">
                <p><strong>Nachricht.co</strong>, seit 2014 für dich da.</p>
            </div>
        </footer>
    </body>
</html>