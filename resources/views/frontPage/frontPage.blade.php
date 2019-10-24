@extends('layouts.wireframe')

@section('content')
    <div class="frontPage">
        <section class="hero is-primary has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <div class="box">
                        <form id="messageForm" enctype="multipart/form-data" method="post" action="/" name="messageForm">
                            <textarea class="frontPage__messageField" name="message" placeholder="10 lines of textarea" autofocus></textarea>

                            <div class="control has-icons-left has-margin-bottom">
                                <input class="input" name="password" type="password" placeholder="Passwort"/>
                                <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            </div>

                            <button class="button is-primary is-fullwidth has-text-weight-bold">Nachricht erstellen</button>
                        </form>
                    </div>

                    <div id="linkForm" class="box is-hidden">
                        <p>Kopiere diesen Link und sende ihn wem du möchtest.<br>Die erstellte Nachricht wird sofort gelöscht, nachdem sie das erste Mal geöffnet wurde.</p>

                        <div class="control has-icons-left has-margin-bottom">
                            <input id="messageLink" class="input" type="text" value="https://nachricht.co/296141983619_3fKztCV9vhPx3rUh" readonly/>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
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

        <section class="hero">
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-vcentered">
                        <div class="column">
                            <h2>Was ist Nachricht.co?</h2>
                            <p>Mit Nachricht.co kannst du sich selbstzerstörende und verschlüsselte Einweg-Nachrichten über das Internet verschicken. Du musst nichtmal auf den Messenger oder das soziale Netzwerk deiner Wahl verzichten. Unabhängig, sicher und kostenlos!</p>
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
                    <h2 class="has-text-centered is-hidden">Benefits</h2>

                    <div class="container has-text-left">
                        <div class="columns is-vcentered">
                            <div class="column">
                                <figure class="image is-48x48 is-marginless">
                                    <img class="image" src="/images/icons/404.svg" alt="Restlose Löschung"/>
                                </figure>

                                <h3>Restlose Löschung</h3>
                                <p>Nachrichten zerstören sich nach dem ersten Öffnen selbst. Falls die Nachricht nicht geöffnet wurde, wird sie nach 24 Stunden automatisch gelöscht. Gelöschte Nachrichten können nicht wiederhergestellt werden und sind für immer vernichtet.</p>
                            </div>
                            <div class="column">
                                <figure class="image is-48x48 is-marginless">
                                    <img class="image" src="/images/icons/encryption.svg" alt="Starke Verschlüsselung"/>
                                </figure>

                                <h3>Starke Verschlüsselung</h3>
                                <p>Um Nachrichten vor fremden Blicken zu schützen wird jede Nachricht individuell verschlüsselt, genauso wie deine Verbindung zu uns. Hierfür verwenden wir den AES mit einer Schlüssellänge von 256 Bits, welcher für staatliche Dokumente mit höchster Geheimhaltungsstufe zugelassen ist.</p>
                            </div>
                        </div>

                        <div class="columns is-vcentered">
                            <div class="column">
                                <figure class="image is-48x48 is-marginless">
                                    <img class="image" src="/images/icons/anonymous.svg" alt="Anonymität"/>
                                </figure>

                                <h3>Anonymität</h3>
                                <p>Wir möchten dir eine möglichst anonyme und sichere Kommunikation ermöglichen. Deshalbt speichern und verlangen wir von dir keinerlei personenbezogene Daten oder IP-Adressen.</p>
                            </div>
                            <div class="column">
                                <figure class="image is-48x48 is-marginless">
                                    <img class="image" src="/images/icons/smartphone.svg" alt="Optimal für Smartphones und Tablets"/>
                                </figure>

                                <h3>Optimal für Smartphones und Tablets</h3>
                                <p>Damit du auch unterwegs so sicher wie möglich schreiben kannst, haben wir Nachricht.co auch für deine mobilen Geräte optimiert - schnellere Ladezeiten und automatische Bildschirmanpassung.</p>
                            </div>
                        </div>

                        <div class="columns is-vcentered">
                            <div class="column">
                                <figure class="image is-48x48 is-marginless">
                                    <img class="image" src="/images/icons/coding.svg" alt="Benutzerorientierte Weiterentwicklung"/>
                                </figure>

                                <h3>Benutzerorientierte Weiterentwicklung</h3>
                                <p>Unsere Nutzer sind uns sehr wichtig und genau deshalb orientieren wir uns bei der Weiterentwicklung neben größtmöglicher Sicherheit, auch an deinem Feedback.</p>
                            </div>

                            <div class="column">
                                <figure class="image is-48x48 is-marginless">
                                    <img class="image" src="/images/icons/customer.svg" alt="Benutzerfreundlichkeit"/>
                                </figure>

                                <h3>Benutzerfreundlichkeit</h3>
                                <p>Wir legen großen Wert auf übersichtliches und einfaches Design, damit du dich so gut wie möglich zurecht findest. Außerdem werden Hyperlinks und Smileys automatisch erkannt und umgewandelt.</p>
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
                        <div class="column">
                            <b>Schritt 1:</b> Nachricht erstellen
                            Tippe die gewünschte Nachricht in das Textfeld oben auf der Seite ein und klicke auf 'Nachricht erstellen'.
                        </div>
                        <div class="column">
                            <b>Schritt 2:</b> Link verschicken
                            Kopiere den Link, der dir daraufhin angezeigt wird und verschicke ihn an den gewünschten Gesprächspartner - z.B. via Facebook oder WhatsApp.
                        </div>
                        <div class="column">
                            <b>Schritt 3:</b> Nachricht lesen
                            Nun klickt der Gesprächspartner auf den Link und kann die Nachricht ein einziges Mal lesen, da diese sich daraufhin selbst zerstört.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('javascript')
    <script src="/js/app.js"></script>
@endsection