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
        <link rel="canonical" href="https://nachricht.co/{{ Request::path() === '/' ? '' : Request::path() }}" />
        @include('components.analytics')
    </head>
    <body>
        <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="/images/logo.png" height="25"/>
                </a>
            </div>

            <div class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        @php $locale = session()->get('locale'); @endphp
                        <a class="navbar-link">
                            @switch($locale)
                                @case('en')
                                    <img src="/images/languages/en.svg" class="navbar__language" alt="English"/> English
                                    @break
                                @case('es')
                                    <img src="/images/languages/es.svg" class="navbar__language" alt="Spanish"/> Spanish
                                    @break
                                @case('ru')
                                    <img src="/images/languages/ru.svg" class="navbar__language" alt="Russian"/> Russian
                                    @break
                                @default
                                    <img src="/images/languages/de.svg" class="navbar__language" alt="Deutsch"/> Deutsch
                            @endswitch
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/lang/de">
                                <img src="/images/languages/de.svg" class="navbar__language" alt="Deutsch"/> Deutsch
                            </a>
                            <a class="navbar-item" href="/lang/en">
                                <img src="/images/languages/en.svg" class="navbar__language" alt="English"/> English
                            </a>
                            <!--<a class="navbar-item"  href="/lang/es">
                                <img src="/images/languages/es.svg" class="navbar__language" alt="Spanish"/> Spanish
                            </a>
                            <a class="navbar-item"  href="/lang/ru">
                                <img src="/images/languages/ru.svg" class="navbar__language" alt="Russian"/> Russian
                            </a>-->
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
                <div class="has-margin-bottom">
                    <a href="/faq" title="Häufig gestellte Fragen" class="has-text-grey">Häufig gestellte Fragen</a>
                    &middot;
                    <a href="/datenschutz" title="Datenschutz" class="has-text-grey">Datenschutz</a>
                    &middot;
                    <a href="/impressum" title="Impressum" class="has-text-grey">Impressum</a>
                </div>

                <p><strong>Nachricht.co</strong>, seit 2014 für dich da.</p>
            </div>
        </footer>
        <script src="/js/ads.js"></script>
        @include('components.adblock')
        @include('components.consent')
        @yield('javascript')
    </body>
</html>