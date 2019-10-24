@extends('layouts.wireframe')

@section('title')
    Häufig gestellte Fragen
@endsection

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">Häufig gestellte Fragen</h1>
            </div>
        </div>
    </section>

    <div class="container">
        <ol>
            <li><a href="" title="">Kann ich Nachricht.co kostenlos benutzen?</a></li>
            <li><a href="" title="">Wie kann ich meine Nachricht verschicken?</a></li>
            <li><a href="" title="">Wie werden die Nachrichten gespeichert?</a></li>
            <li><a href="" title="">Werden gelesene Nachrichten wirklich gelöscht?</a></li>
            <li><a href="" title="">Was ist wenn eine Nachricht nicht geöffnet wird?</a></li>
            <li><a href="" title="">Kann ich Nachrichten an mehrere Empfänger verschicken?</a></li>
            <li><a href="" title="">Ist es möglich gelesene Nachrichten mittels des Browser-Verlaufes erneut zu lesen?</a></li>
        </ol>

        <article>
            <h2>Kann ich Nachricht.co kostenlos benutzen?</h2>
            <p>Ja, du kannst Nachricht.co völlig kostenfrei benutzen. Damit das auch so bleibt, sind wir darauf angewiesen Werbeanzeigen auf unserer Seite zu schalten.</p>
        </article>

        <article>
            <h2>Wie kann ich meine Nachricht verschicken?</h2>
            <p>Um eine Nachricht zu verschicken musst du in das Textfeld auf https://nachricht.co die gewünschte Nachricht eintippen und anschließend auf ‚Nachricht erstellen’ klicken.</p>
            <p>Daraufhin wird dir ein Link ausgegeben, welchen du dem gewünschtem Gesprächspartner senden kannst. Dein Gesprächspartner kann jetzt auf den Link klicken und die Nachricht ein einziges Mal lesen, da sie sich daraufhin selbst zerstört.</p>
        </article>

        <article>
            <h2>Wie werden die Nachrichten gespeichert?</h2>
            <p>Alle Nachrichten werden mittels des Advanced Encryption Standart (kurz AES) und einem individuell generiertem, 256 Bit langem Schlüssel verschlüsselt und anschließend auf unserem Server gespeichert. Dieser Verschlüsselungsalgorithmus ist weiterverbreitet, gilt als einer der sichersten und ist für staatliche Dokumente mit höchster Geheimaltungsstufe zugelassen.</p>
            <p>Die jeweiligen Schlüssel werden nicht gespeichert und lediglich in codierter Form im erstellten Link an den Benutzer übergeben. Dieses Verfahren ermöglicht, dass nur der Besitzer des Links die Nachricht entschlüsseln kann.</p>
            <p>Die Verbindung zwischen dir und unserem Server wird übrigens auch von uns Verschlüsselt und ist somit gegen Abhören und Manipulationen geschützt. Hierfür verwenden wir das Transport Layer Security Protocol - kurz TLS.</p>
        </article>

        <article>
            <h2>Werden gelesene Nachrichten wirklich gelöscht?</h2>
            <p>Kurz gesagt, ja. Jede geöffnete Nachricht wird automatisch, ohne Verzögerung und restlos gelöscht. Gelöschte Nachrichten können nicht wiederhergestellt werden.</p>
        </article>

        <article>
            <h2>Was ist wenn eine Nachricht nicht geöffnet wird?</h2>
            <p>Falls eine Nachricht innerhalb von 24 Stunden nicht geöffnet wird, wir diese automatisch und restlos von uns gelöscht. Die Nachricht kann nicht wiederhergestellt werden.</p>
        </article>

        <article>
            <h2>Kann ich Nachrichten an mehrere Empfänger verschicken?</h2>
            <p>Nein. Da jede Nachricht nur einmal geöffnet werden kann und sich darauf hin selbst zerstört, musst du für jeden Empfänger eine eigene Nachricht erstellen und ihm den Link schicken. So funktioniert die Einweg-Nachricht.</p>
        </article>

        <article>
            <h2>Ist es möglich gelesene Nachrichten mittels des Browser-Verlaufes erneut zu lesen?</h2>
            <p>Nein. Bereits gelesene Nachrichten können nicht im Browserverlauf erneut geöffnet und gelesen werden.</p>
        </article>
    </div>
@endsection