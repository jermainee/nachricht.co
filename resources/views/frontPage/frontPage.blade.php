@extends('layouts.wireframe')

@section('content')
    <div class="frontPage">
        <section class="hero is-primary has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <div class="box">
                        <form>
                            <textarea class="frontPage__messageField" placeholder="10 lines of textarea" autofocus></textarea>

                            <div class="control has-icons-left has-margin-bottom">
                                <input class="input" type="password" placeholder="Passwort"/>
                                <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            </div>

                            <button class="button is-primary is-fullwidth has-text-weight-bold">Nachricht erstellen</button>
                        </form>
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
                                <h3>Restlose Löschung</h3>
                                <p>Nachrichten zerstören sich nach dem ersten Öffnen selbst. Falls die Nachricht nicht geöffnet wurde, wird sie nach 24 Stunden automatisch gelöscht. Gelöschte Nachrichten können nicht wiederhergestellt werden und sind für immer vernichtet.</p>
                            </div>
                            <div class="column">
                                <h3>Starke Verschlüsselung</h3>
                                <p>Um Nachrichten vor fremden Blicken zu schützen wird jede Nachricht individuell verschlüsselt, genauso wie deine Verbindung zu uns. Hierfür verwenden wir den AES mit einer Schlüssellänge von 256 Bits, welcher für staatliche Dokumente mit höchster Geheimhaltungsstufe zugelassen ist.</p>
                            </div>
                        </div>

                        <div class="columns is-vcentered">
                            <div class="column">
                                <h3>Anonymität</h3>
                                <p>Wir möchten dir eine möglichst anonyme und sichere Kommunikation ermöglichen. Deshalbt speichern und verlangen wir von dir keinerlei personenbezogene Daten oder IP-Adressen.</p>
                            </div>
                            <div class="column">
                                <h3>Optimal für Smartphones und Tablets</h3>
                                <p>Damit du auch unterwegs so sicher wie möglich schreiben kannst, haben wir Nachricht.co auch für deine mobilen Geräte optimiert - schnellere Ladezeiten und automatische Bildschirmanpassung.</p>
                            </div>
                        </div>

                        <div class="columns is-vcentered">
                            <div class="column">
                                <h3>Benutzerorientierte Weiterentwicklung</h3>
                                <p>Unsere Nutzer sind uns sehr wichtig und genau deshalb orientieren wir uns bei der Weiterentwicklung neben größtmöglicher Sicherheit, auch an deinem Feedback.</p>
                            </div>
                            <div class="column">
                                <h3>Benutzerfreundlich</h3>
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
                            <a href="http://www.maedchen.de/" rel="noopener">
                                <img class="image" src="/images/known/maedchen.png" alt="Mädchen.de" />
                            </a>
                        </div>

                        <div class="frontPage__knownLogo">
                            <a href="#" rel="noopener nofollow">
                                <img class="image" src="/images/known/amoranach.svg" alt="amorana.ch" />
                            </a>
                        </div>

                        <div class="frontPage__knownLogo">
                            <a href="http://www.taiber-unternehmensberatung.de/" rel="noopener">
                                <img class="image" src="/images/known/rogertaiber.png" alt="Mädchen.de" />
                            </a>
                        </div>

                        <div class="frontPage__knownLogo">
                            <a href="http://www.startupvalley.news/" rel="noopener">
                                <img class="image" src="/images/known/startupvalleynews.png" alt="StartUpValley.news" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection