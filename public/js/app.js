(function () {
    'use strict';

    const messageForm = document.getElementById('messageForm');

    messageForm.addEventListener('onsubmit', event => {
        event.preventDefault();
        console.log('sdf');
    });

}());
