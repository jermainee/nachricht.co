<div id="cookieConsent" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <div class="title is-4 has-text-centered">
                <span class="icon">
                    <img src="/images/icons/cookie.svg" alt="Cookie Einstellungen"/>
                </span>
                <br/>
                Cookie-Einstellungen
            </div>
            <p class="has-margin-bottom">Wir setzen auf unserer Website Cookies ein. Einige dieser Cookies sind essenziell notwendig (z.B. für die Sprachauswahl), während andere uns helfen Nachricht.co noch besser zu machen und dabei wirtschaftlich zu bleiben. Du kannst akzeptieren und uns damit maßgeblich unterstützen oder ablehnen. Nähere Informationen hierzu findest du in unserer Datenschutzerklärung.</p>

            <div class="columns has-text-centered">
                <div class="column">
                    Essenziell
                    <span class="icon">
                        <img src="/images/icons/check.svg" alt="Essenziell"/>
                    </span>
                </div>
                <div class="column">
                    Marketing
                    <span class="icon">
                        <img src="/images/icons/check.svg" alt="Marketing"/>
                    </span>
                </div>
                <div class="column">
                    Externe Medien
                    <span class="icon">
                        <img src="/images/icons/check.svg" alt="Externe Medien"/>
                    </span>
                </div>
            </div>

            <button id="cookieConsentAgree" class="button is-primary is-fullwidth has-text-weight-bold has-margin-bottom">Ich aktzeptiere!</button>
            <button id="cookieConsentDisagree" class="button is-white is-fullwidth has-text-grey is-small">Nur essenzielle Cookies akzeptieren</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cookieConsent = document.getElementById('cookieConsent');
        const cookieConsentAgree = document.getElementById('cookieConsentAgree');
        const cookieConsentDisagree = document.getElementById('cookieConsentDisagree');

        const cookieConsentDecision = localStorage.getItem('cookieConsent');
        if (cookieConsentDecision) {
            if (cookieConsentDecision === 'disagree') {
                localStorage.removeItem('cookieConsent');
            }
            setConsentCookie(cookieConsentDecision);
            return;
        }

        cookieConsent.classList.add('is-active');

        cookieConsentAgree.addEventListener('click', () => {
            cookieConsent.classList.remove('is-active');
            window.localStorage.setItem('cookieConsent', 'agree');
            document.location.reload(true);
        });

        cookieConsentDisagree.addEventListener('click', () => {
            cookieConsent.classList.remove('is-active');
            window.localStorage.setItem('cookieConsent', 'disagree');
            document.location.reload(true);
        });
    });

    const setConsentCookie = (cookieConsentDecision) => {
        const date = new Date();
        date.setTime(date.getTime() + ((cookieConsentDecision === 'agree' ? 365 : 3)*24*60*60*1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = 'cookieConsent' + "=" + cookieConsentDecision + ";" + expires + ";path=/";
    }
</script>