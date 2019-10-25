<div id="cookieConsent" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <div class="title is-4 has-text-centered">
                <span class="icon is-medium">
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

<a id="cookieSettingsButton">
    <span class="is-hidden-mobile has-text-weight-bold has-text-grey">
        {{ trans('consent.consent') }}
    </span>
     <span class="icon is-normal">
        <img src="/images/icons/cookie.svg" alt="{{ trans('consent.consentText') }}"/>
    </span>
</a>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cookieSettingsButton = document.getElementById('cookieSettingsButton');
        const cookieConsent = document.getElementById('cookieConsent');
        const cookieConsentAgree = document.getElementById('cookieConsentAgree');
        const cookieConsentDisagree = document.getElementById('cookieConsentDisagree');

        cookieSettingsButton.addEventListener('click', () => {
            localStorage.removeItem('cookieConsent');
            localStorage.removeItem('cookieConsentTimestamp');
            location.reload(true);
        });

        const cookieConsentDecision = localStorage.getItem('cookieConsent');
        const cookieConsentTimestamp = localStorage.getItem('cookieConsentTimestamp');
        if (cookieConsentDecision) {
            if (cookieConsentDecision === 'disagree'
                && cookieConsentTimestamp
                && (Date.now() - parseInt(cookieConsentTimestamp)) > 59200000000
            ) {
                localStorage.removeItem('cookieConsent');
            }

            setConsentCookie(cookieConsentDecision);
            return;
        }

        cookieConsent.classList.add('is-active');

        cookieConsentAgree.addEventListener('click', () => {
            cookieConsent.classList.remove('is-active');
            setConsentCookie('agree');
            window.localStorage.setItem('cookieConsent', 'agree');
            window.localStorage.setItem('cookieConsentTimestamp', null);
            document.location.reload(true);
        });

        cookieConsentDisagree.addEventListener('click', () => {
            cookieConsent.classList.remove('is-active');
            setConsentCookie('disagree');
            window.localStorage.setItem('cookieConsent', 'disagree');
            window.localStorage.setItem('cookieConsentTimestamp', Date.now().toString());
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