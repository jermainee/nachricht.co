<section class="hero">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column">
                    <h2>{{ trans('frontpage.welcome') }}</h2>
                    <p>{{ trans('frontpage.welcomeText') }}</p>
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

<section class="hero">
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
                        <img class="image" src="/images/known/rogertaiber.png" alt="Mädchen.de" />
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