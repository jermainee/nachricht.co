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
                {{ trans('adblock.headline') }}
            </div>
            <p class="has-margin-bottom">
                {{ trans('adblock.text') }}
            </p>
            <p class="has-margin-bottom has-text-weight-bold">
                {{ trans('adblock.boldText') }}
            </p>

            <hr/>

            <div class="columns has-text-centered is-gapless">
                <div class="column">
                    {{ trans('adblock.development') }}
                    <span class="icon">
                        <img src="/images/icons/time.svg" alt="{{ trans('adblock.development') }}"/>
                    </span>
                </div>
                <div class="column">
                    {{ trans('adblock.servers') }}
                    <span class="icon">
                        <img src="/images/icons/money.svg" alt="{{ trans('adblock.servers') }}"/>
                    </span>
                </div>
                <div class="column">
                    {{ trans('adblock.help') }}
                    <span class="icon">
                        <img src="/images/icons/iloveyou.svg" alt="{{ trans('adblock.help') }}"/>
                    </span>
                </div>
            </div>

            <button id="adbAgree" class="button is-primary is-fullwidth has-text-weight-bold has-margin-top">
                {{ trans('adblock.reloadButton') }}
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const adbAgree = document.getElementById('adbAgree');

        const cookieConsentDecision = localStorage.getItem('cookieConsent');
        if (!cookieConsentDecision) {
            return;
        }

        if(window.hasAds !== true){
            adbAgree.addEventListener('click', () => {
                setConsentCookie('agree');
                window.localStorage.setItem('cookieConsent', 'agree');
                window.localStorage.setItem('cookieConsentTimestamp', null);
                location.reload(true);
            });

            const adbModal = document.getElementById('<?= $randomId ?>');
            adbModal.classList.add('is-active');
        }
    });
</script>