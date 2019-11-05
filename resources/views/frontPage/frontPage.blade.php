@extends('layouts.wireframe')

@section('content')
    <div class="frontPage">
        <section class="hero is-primary has-text-centered is-small">
            <div class="hero-body">
                <div class="container">
                    <div class="has-padding-bottom">
                        @include('components.ads')
                    </div>

                    <div class="box">
                        <form id="messageForm" class="frontPage__messageForm" enctype="multipart/form-data" method="post" action="/" name="messageForm" autocomplete="off">
                            <textarea id="messageField" class="frontPage__messageField" name="message" placeholder="{{ trans('frontpage.messagePlaceholder') }}" autofocus></textarea>

                            <div id="settingsToggle" class="frontPage__settingsIcon">
                                <img src="/images/icons/settings.svg" alt="settings"/>
                            </div>

                            <div id="messageSettings" class="frontPage__settings is-hidden">
                                <div class="columns is-vcentered">
                                    <div class="column">
                                        <div class="field has-addons">
                                            <div class="control">
                                                <a class="button is-static">
                                                    {{ trans('frontpage.passwordLabel') }}
                                                </a>
                                            </div>
                                            <div class="control is-expanded">
                                                <input class="input" name="password" type="password" placeholder="{{ trans('frontpage.passwordPlaceholder') }}" maxlength="32"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="column is-narrow">
                                        <div class="field has-addons">
                                            <div class="control">
                                                <a class="button is-static">
                                                    {{ trans('frontpage.deadlineLabel') }}
                                                </a>
                                            </div>
                                            <div class="control is-expanded">
                                                <div class="select is-fullwidth">
                                                    <select name="deletion">
                                                        <option value="2">2 {{ trans('frontpage.hours') }}</option>
                                                        <option value="12">12 {{ trans('frontpage.hours') }}</option>
                                                        <option value="24">24 {{ trans('frontpage.hours') }}</option>
                                                        <option value="48" selected>2 {{ trans('frontpage.days') }}</option>
                                                        <option value="168">7 {{ trans('frontpage.days') }}</option>
                                                        <option value="336">14 {{ trans('frontpage.days') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="column is-narrow">
                                        <div class="control">
                                            <input id="deleteAfterRead" type="checkbox" name="deleteAfterRead" class="switch" checked="checked">
                                            <label for="deleteAfterRead">{{ trans('frontpage.deleteAfterReadLabel') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

        @include('frontPage.components.content')
    </div>
@endsection

@section('javascript')
    <script src="/js/app.js"></script>
@endsection