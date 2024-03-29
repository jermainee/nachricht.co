<!DOCTYPE html>
<html class="has-navbar-fixed-top" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @if (in_array(Request::path(), ['/', 'de', 'en', 'ru']))
            <title>@lang('meta.title')</title>
            <meta name="description" content="@lang('meta.description')"/>
            <meta property="og:title" content="@lang('meta.title')"/>
            <meta property="og:description" content="@lang('meta.description')"/>
            <meta property="og:site_name" content="Nachricht.co"/>
            <meta property="og:url" content="https://nachricht.co"/>
            <meta property="og:image" content=""/>
        @else
            <title>@yield('title') - Nachricht.co</title>
            @yield('metatags')
        @endif
        <meta name="application-name" content="Nachricht.co"/>
        <meta name="theme-color" content="#fff" />
        <meta name="apple-mobile-web-app-status-bar-style" content="default" />
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="/images/appicons/mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="/images/appicons/mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="/images/appicons/mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="/images/appicons/mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="/images/appicons/mstile-310x310.png" />
        <meta name="webutation-site-verification" content="webutation8f2544e8c2d2354f473c00eed107c837"/>
        <link rel="manifest" href="manifest.json">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/images/appicons/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/appicons/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/appicons/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/appicons/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/images/appicons/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/images/appicons/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/images/appicons/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/images/appicons/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="/images/appicons/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="/images/appicons/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="/images/appicons/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/images/appicons/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="/images/appicons/favicon-128.png" sizes="128x128" />
        <link type="text/css" rel="stylesheet" media="screen" href="{{ asset('css/app.css') }}"/>
        <link rel="canonical" href="https://nachricht.co/{{ Request::path() === '/' ? '' : Request::path() }}" />
    </head>
    <body>
        <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
            @php $locale = session()->get('locale'); @endphp
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="/images/logo.png" height="25" alt="Nachricht.co"/>
                </a>

                <a id="mobileLanguageButton" role="button" class="navbar__mobileLanguage burger" aria-label="menu" aria-expanded="false">
                    @switch($locale)
                        @case('en')
                        <img src="/images/languages/en.svg" class="navbar__language" alt="English"/>
                        @break
                        @case('es')
                        <img src="/images/languages/es.svg" class="navbar__language" alt="Spanish"/>
                        @break
                        @case('ru')
                        <img src="/images/languages/ru.svg" class="navbar__language" alt="русский"/>
                        @break
                        @default
                        <img src="/images/languages/de.svg" class="navbar__language" alt="Deutsch"/>
                    @endswitch
                </a>
            </div>

            <div id="mobileLanguageMenu" class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link is-hidden-mobile">
                            @switch($locale)
                                @case('en')
                                    <img src="/images/languages/en.svg" class="navbar__language" alt="English"/> English
                                    @break
                                @case('es')
                                    <img src="/images/languages/es.svg" class="navbar__language" alt="Spanish"/> Spanish
                                    @break
                                @case('nl')
                                    <img src="/images/languages/nl.svg" class="navbar__language" alt="Nederlands"/> Nederlands
                                    @break
                                @case('ru')
                                    <img src="/images/languages/ru.svg" class="navbar__language" alt="русский"/> русский
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
                            <a class="navbar-item"  href="/lang/nl">
                                <img src="/images/languages/nl.svg" class="navbar__language" alt="Nederlands"/> Nederlands
                            </a>
                            <a class="navbar-item"  href="/lang/ru">
                                <img src="/images/languages/ru.svg" class="navbar__language" alt="русский"/> русский
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
        @yield('javascript')
        <script defer src="/register.js"></script>
        <script async defer src="/js/github-button.js"></script>
    </body>
</html>
