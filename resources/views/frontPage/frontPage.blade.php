@extends('layouts.wireframe')

@section('content')
    <div class="frontPage">
        <section class="hero is-primary has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <div class="box">
                        <form id="messageForm" enctype="multipart/form-data" method="post" action="/" name="messageForm">
                            <textarea class="frontPage__messageField" name="message" placeholder="10 lines of textarea" autofocus></textarea>
                            <input class="input has-margin-bottom" name="password" type="password" placeholder="Passwort"/>
                            <button class="button is-primary is-fullwidth has-text-weight-bold">Nachricht erstellen</button>
                        </form>
                    </div>

                    <div id="linkForm" class="box is-hidden">
                        <p>Kopiere diesen Link und sende ihn wem du möchtest.<br>Die erstellte Nachricht wird sofort gelöscht, nachdem sie das erste Mal geöffnet wurde.</p>

                        <div class="control has-icons-left has-margin-bottom">
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
                                <a class="button is-primary is-fullwidth has-text-weight-bold">
                                    <span class="is-hidden-mobile">Link kopieren</span>
                                    <span class="icon">
                                        <img src="/images/icons/copy.svg" alt="Link kopieren" />
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