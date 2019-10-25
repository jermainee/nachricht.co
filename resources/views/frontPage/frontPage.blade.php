@extends('layouts.wireframe')

@section('content')
    <div class="frontPage">
        <section class="hero is-primary has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <div class="has-padding-bottom">
                        @include('components.ads')
                    </div>

                    <div class="box">
                        <form id="messageForm" enctype="multipart/form-data" method="post" action="/" name="messageForm">
                            <textarea class="frontPage__messageField" name="message" placeholder="{{ trans('frontpage.messagePlaceholder') }}" autofocus></textarea>
                            <input class="input has-margin-bottom" name="password" type="password" placeholder="{{ trans('frontpage.passwordPlaceholder') }}"/>
                            <button class="button is-primary is-fullwidth has-text-weight-bold">{{ trans('frontpage.createButton') }}</button>
                        </form>
                    </div>

                    <div id="linkForm" class="box is-hidden">
                        <p class="is-size-5 is-marginless">@lang('frontpage.copyText')</p>

                        @include('components.ads')

                        <div class="control has-margin-bottom has-margin-top">
                            <input id="messageLink" class="input" type="text" readonly/>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <a id="shareTelegram" href="https://telegram.me/share/url?url=" class="button is-primary is-fullwidth has-text-weight-bold">
                                    <span class="is-hidden-mobile">Telegram</span>
                                    <span class="icon">
                                        <img src="/images/icons/telegram.svg" alt="Telegram" />
                                    </span>
                                </a>
                            </div>

                            <div class="column">
                                <a id="shareWhatsApp" href="https://wa.me/?text=" class="button is-primary is-fullwidth has-text-weight-bold">
                                    <span class="is-hidden-mobile">WhatsApp</span>
                                    <span class="icon">
                                        <img src="/images/icons/whatsapp.svg" alt="WhatsApp" />
                                    </span>
                                </a>
                            </div>

                            <div class="column">
                                <a id="copyLink" class="button is-primary is-fullwidth has-text-weight-bold">
                                    <span class="is-hidden-mobile">{{ trans('frontpage.copyButton') }}</span>
                                    <span class="icon">
                                        <img src="/images/icons/copy.svg" alt="{{ trans('frontpage.copyButton') }}" />
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('frontPage.content')
    </div>
@endsection

@section('javascript')
    <script src="/js/app.js"></script>
@endsection