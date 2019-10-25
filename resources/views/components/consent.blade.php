<div id="cookieConsent" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <div class="title is-4 has-text-centered">
                <span class="icon">
                    <img src="/images/icons/cookie.svg" alt="{{ trans('consent.consentText') }}"/>
                </span>
                <br/>
                {{ trans('consent.consent') }}
            </div>
            <p class="has-margin-bottom">{{ trans('consent.consentText') }}</p>

            <div class="columns has-text-centered">
                <div class="column">
                    {{ trans('consent.essential') }}
                    <span class="icon">
                        <img src="/images/icons/check.svg" alt="{{ trans('consent.essential') }}"/>
                    </span>
                </div>
                <div class="column">
                    {{ trans('consent.marketing') }}
                    <span class="icon">
                        <img src="/images/icons/check.svg" alt="{{ trans('consent.marketing') }}"/>
                    </span>
                </div>
                <div class="column">
                    {{ trans('consent.externalMedia') }}
                    <span class="icon">
                        <img src="/images/icons/check.svg" alt="{{ trans('consent.externalMedia') }}"/>
                    </span>
                </div>
            </div>

            <button id="cookieConsentAgree" class="button is-primary is-fullwidth has-text-weight-bold has-margin-bottom">{{ trans('consent.agreeButton') }}</button>
            <button id="cookieConsentDisagree" class="button is-white is-fullwidth has-text-grey is-small">{{ trans('consent.disagreeButton') }}</button>
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