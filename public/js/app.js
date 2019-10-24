document.addEventListener("DOMContentLoaded", () => {
    const messageForm = document.getElementById('messageForm');
    const linkForm = document.getElementById('linkForm');
    const messageLink = document.getElementById('messageLink');
    const shareWhatsApp = document.getElementById('shareWhatsApp');
    const shareTelegram = document.getElementById('shareTelegram');

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
});