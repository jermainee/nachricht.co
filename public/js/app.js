document.addEventListener("DOMContentLoaded", () => {
    const messageSettings = document.getElementById('messageSettings');
    const settingsToggle = document.getElementById('settingsToggle');
    const messageForm = document.getElementById('messageForm');
    const messageField = document.getElementById('messageField');
    const linkForm = document.getElementById('linkForm');
    const messageLink = document.getElementById('messageLink');
    const shareWhatsApp = document.getElementById('shareWhatsApp');
    const shareTelegram = document.getElementById('shareTelegram');
    const copyLink = document.getElementById('copyLink');

    messageForm.addEventListener('submit', event => {
        event.preventDefault();

        const data = new URLSearchParams();
        for (const pair of new FormData(messageForm)) {
            data.append(pair[0], pair[1]);
        }

        fetch('/api/message/create.json', {
            method: 'post',
            body: data,
        })
            .then(response => response.json())
            .then(response => {
                if (!response || !response.success || !response.link) {
                    console.log('error');
                    return;
                }

                if (response.shareUrls) {
                    shareWhatsApp.href = response.shareUrls.whatsApp;
                    shareTelegram.href = response.shareUrls.telegram;
                }

                messageLink.value = response.link;
                linkForm.classList.remove('is-hidden');
                messageForm.parentElement.classList.add('is-hidden');
            });
    });

    settingsToggle.addEventListener('click', event => {
        event.preventDefault();
        messageSettings.classList.toggle('is-hidden');
        messageField.classList.toggle('frontPage__messageField--reduced');
    });

    copyLink.addEventListener('click', () => {
        messageLink.select();
        document.execCommand('copy');
        copyLink.innerHTML = '<span class="icon"><img src="/images/icons/check-white.svg" /></span>';
    });

    const mobileLanguageButton = document.getElementById('mobileLanguageButton');
    const mobileLanguageMenu = document.getElementById('mobileLanguageMenu');
    mobileLanguageButton.addEventListener('click', () => {
        mobileLanguageMenu.classList.toggle('is-block');
    });
});