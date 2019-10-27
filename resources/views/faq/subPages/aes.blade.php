@extends('layouts.wireframe')

@section('title')
    Advanced Encryption Standard (AES)
@endsection

@section('metatags')
    <meta property="og:title" content="Advanced Encryption Standard (AES) - Nachricht.co"/>
@endsection

@section('content')
    <section class="hero is-primary has-text-centered">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">Advanced Encryption Standard (AES)</h1>
            </div>
        </div>
    </section>

    <div class="smallContainer has-margin-top-double has-margin-bottom-double">
        <div class="has-padding-bottom">
            @include('components.ads')
        </div>
        <p>Nachricht.co verwendet viele Technologien um eure Kommunikation noch sicherer und einfacher zu machen. Eine dieser Technologien ist der <a href="https://de.wikipedia.org/wiki/Advanced_Encryption_Standard" title="Advanced Encryption Standard" target="_blank">Advanced Encryption Standard - kurz AES</a>.</p>
        <p>Dieser Verschlüsselungsalgorithmus verschlüsselt und entschlüsselt Daten in Blöcken von 128 Bits mit kryptographischen Schlüsseln in einer Länge von 128 Bits, 192 Bits und 256 Bits. Wir verwenden an dieser Stelle die sichereren 256-Bit-Schlüssel.</p>
        <p>Verfahren mit symmetrischen oder geheimen Schlüsseln verwenden den gleichen Schlüssel zur Ver- und Entschlüsselung von Daten. Daher müssen sowohl der Absender als auch der Empfänger denselben geheimen Schlüssel kennen und einsetzen. Dieser Schlüssel wird von uns nicht gespeichert und lediglich im erstellen Link an den Benutzer übergeben. So ist es selbst für uns als Betreiber unmöglich Nachrichten zu entschlüsseln.</p>
        <p>Die Verschlüsselung erfolgt in zehn Runden für die 128 Bit-Schlüssel, 12 Runden für die 192 Bit-Schlüssel und 14 Runden für die 256-Bit-Schlüssel: Eine Runde besteht aus mehreren Verarbeitungsschritten wie Substitution, Umstellen und Mischen des Quell-Klartextes bis hin zur endgültigen Ausgabe des chiffrierten Textes.</p>
    </div>
@endsection