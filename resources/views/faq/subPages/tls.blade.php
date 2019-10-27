@extends('layouts.wireframe')

@section('title')
    Transport Layer Security (TLS)
@endsection

@section('metatags')
    <meta property="og:title" content="Transport Layer Security (TLS) - Nachricht.co"/>
@endsection

@section('content')
    <section class="hero is-primary has-text-centered">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">Transport Layer Security (TLS)</h1>
            </div>
        </div>
    </section>

    <div class="smallContainer has-margin-top-double has-margin-bottom-double">
        <div class="has-padding-bottom">
            @include('components.ads')
        </div>

        <p>Zum Schutz persönlicher Daten bei der Datenübertragung zwischen unserem Server und deinem Gerät benutzen wir <a href="https://de.wikipedia.org/wiki/Transport_Layer_Security" title="Transport Layer Security
" target="_blank">TLS (Transport Layer Security)</a>, den Nachfolger von SSL (Secure Sockets Layer). Dieses Protokoll stellt sicher, dass kein unbefugter Dritter die Kommunikation abhören oder manipulieren kann.</p>
        <p>TLS besteht aus den Ebenen TLS Record Protocol und TLS Handshake Protocol. Für die Sicherung der Verbindung, durch Methoden wie dem Data Encryption Standard (DES), ist das TLS Record Protocol zuständig. Während dessen ist das TLS Handshake Protocol für die Authentifizierung von Server und Client, sowie den Austausch kryptographischer Schlüssel vor der Dateiübertragung zuständig.</p>
        <p>Das TLS Protokoll basiert auf dem SSL 3.0 Protokoll von Netscape, ist allerdings mit SSL nicht interoperabel. Daher enthält das TLS Protokoll eine Funktion, mit der die Verbindung im Notfall auf SSL 3.0 zurückgestuft werden kann. Nahezu alle aktuellen Browser unterstützen TLS.</p>
    </div>
@endsection