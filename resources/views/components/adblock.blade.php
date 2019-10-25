<?php $randomId = rand(100, 999); ?>
<div id="<?= $randomId ?>" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <div class="title is-4 has-text-centered">
                <span class="icon is-large">
                    <img src="/images/icons/digital.svg" alt="AdBlocker"/>
                </span>
                <br/>
                Du magst keine Werbung?
            </div>
            <p class="has-margin-bottom">
                Das können wir natürlich verstehen.
                Doch um Nachricht.co am Leben zu halten müssen wir monatlich Geld in Dinge wie zum Beispiel angemietete Server investieren.
                Desweiteren stecken wir unser Herzblut in Form von Programmierung, Übersetzung und Support in dieses Projekt.
            </p>
            <p class="has-margin-bottom">
                Wenn du unsere Arbeit und Nachricht.co unterstützen möchtest, dann deaktiviere bitte deinen AdBlocker auf unserer Seite! 😊
            </p>

            <hr/>

            <div class="columns has-text-centered">
                <div class="column">
                    Weiterentwicklung
                    <span class="icon">
                        <img src="/images/icons/time.svg" alt="Code"/>
                    </span>
                </div>
                <div class="column">
                    Servermiete
                    <span class="icon">
                        <img src="/images/icons/money.svg" alt="Server"/>
                    </span>
                </div>
                <div class="column">
                    Deine Unterstützung
                    <span class="icon">
                        <img src="/images/icons/iloveyou.svg" alt="Deine Unterstützung"/>
                    </span>
                </div>
            </div>

            <button class="button is-primary is-fullwidth has-text-weight-bold has-margin-top" onclick="location.reload(true)">Seite neu laden</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cookieConsentDecision = localStorage.getItem('cookieConsent');
        if (!cookieConsentDecision) {
            return;
        }

        const adbModal = document.getElementById('<?= $randomId ?>');
        adbModal.classList.add('is-active');
    });
</script>