<section class="hero">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column">
                    <h2>{{ trans('frontpage.welcome') }}</h2>
                    <p>{{ trans('frontpage.welcomeText') }}</p>
                    <a href="https://github.com/jermainee/nachricht.co" class="button" target="_blank" rel="noopener noreferrer">
                        <span class="icon mr-2">
                            <svg viewBox="0 0 16 16" width="100%" height="100%" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path></svg>
                        </span>
                        <span>View on GitHub</span>
                    </a>
                    <br/>
                </div>

                <div class="column is-two-fifths">
                    <img class="image" src="/images/illustrations/guy.svg" alt="Verschlüsselte Einweg-Nachrichten unterwegs versenden"/>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="is-hidden">Nachricht.co Die verschlüsselte Einweg-Nachricht</h1>
            <h2 class="has-text-centered is-hidden">Vorteile einer Einweg-Nachricht</h2>

            <div class="container has-text-left">
                <div class="columns is-vcentered">
                    <div class="column">
                        <figure class=" frontPage__icon">
                            <img class="image" src="/images/icons/404.svg" alt="{{ trans('frontpage.deletion') }}"/>
                        </figure>

                        <h3>{{ trans('frontpage.deletion') }}</h3>
                        <p>{{ trans('frontpage.deletionText') }}</p>
                    </div>
                    <div class="column">
                        <figure class=" frontPage__icon">
                            <img class="image" src="/images/icons/encryption.svg" alt="{{ trans('frontpage.encryption') }}"/>
                        </figure>

                        <h3>{{ trans('frontpage.encryption') }}</h3>
                        <p>{{ trans('frontpage.encryptionText') }}</p>
                    </div>
                </div>

                <div class="columns is-vcentered">
                    <div class="column">
                        <figure class=" frontPage__icon">
                            <img class="image" src="/images/icons/anonymous.svg" alt="{{ trans('frontpage.anonymity') }}"/>
                        </figure>

                        <h3>{{ trans('frontpage.anonymity') }}</h3>
                        <p>{{ trans('frontpage.anonymityText') }}</p>
                    </div>
                    <div class="column">
                        <figure class=" frontPage__icon">
                            <img class="image" src="/images/icons/smartphone.svg" alt="{{ trans('frontpage.responsiveness') }}"/>
                        </figure>

                        <h3>{{ trans('frontpage.responsiveness') }}</h3>
                        <p>{{ trans('frontpage.responsivenessText') }}</p>
                    </div>
                </div>

                <div class="columns is-vcentered">
                    <div class="column">
                        <figure class=" frontPage__icon">
                            <img class="image" src="/images/icons/coding.svg" alt="{{ trans('frontpage.development') }}"/>
                        </figure>

                        <h3>{{ trans('frontpage.development') }}</h3>
                        <p>{{ trans('frontpage.developmentText') }}</p>
                    </div>

                    <div class="column">
                        <figure class=" frontPage__icon">
                            <img class="image" src="/images/icons/customer.svg" alt="{{ trans('frontpage.userfriendly') }}"/>
                        </figure>

                        <h3>{{ trans('frontpage.userfriendly') }}</h3>
                        <p>{{ trans('frontpage.userfriendlyText') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero is-hidden">
    <div class="hero-body">
        <div class="container">
            <h2 class="has-text-centered is-hidden">Bekannt aus</h2>

            <div class="frontPage__knownFrom">
                <div class="frontPage__knownLogo">
                    <a href="http://www.maedchen.de/" rel="noopener" target="_blank">
                        <img class="image" src="/images/known/maedchen.png" alt="Mädchen.de" />
                    </a>
                </div>

                <div class="frontPage__knownLogo">
                    <a href="#" rel="noopener nofollow" target="_blank">
                        <img class="image" src="/images/known/amoranach.svg" alt="amorana.ch" />
                    </a>
                </div>

                <div class="frontPage__knownLogo">
                    <a href="http://www.taiber-unternehmensberatung.de/" rel="noopener" target="_blank">
                        <img class="image" src="/images/known/rogertaiber.png" alt="taiber-unternehmensberatung.de" />
                    </a>
                </div>

                <div class="frontPage__knownLogo">
                    <a href="http://www.startupvalley.news/" rel="noopener" target="_blank">
                        <img class="image" src="/images/known/startupvalleynews.png" alt="StartUpValley.news" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <h2 class="is-hidden">So verschickst du eine Nachricht</h2>

            <div class="columns">
                <div class="column">@lang('frontpage.step1')</div>
                <div class="column">@lang('frontpage.step2')</div>
                <div class="column">@lang('frontpage.step3')</div>
            </div>
        </div>
    </div>
</section>
