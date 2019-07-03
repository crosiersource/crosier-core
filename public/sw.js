"use strict";

self.addEventListener('push', function (event) {
    console.log('[Service Worker] Push Received.');
    console.log(`[Service Worker] Push had this data: "${event.data.text()}"`);


    const title = 'Push Codelab';
    const options = {
        body: 'Yay it works.',
        icon: 'images/icon.png',
        badge: 'images/badge.png'
    };

    event.waitUntil(self.registration.showNotification(title, options));
});

self.addEventListener('notificationclick', function (event) {
    console.log('[Service Worker] Notification click Received.');

    event.notification.close();

    event.waitUntil(
        clients.openWindow('https://developers.google.com/web/')
    );
});

const es = new EventSource('http://localhost:3000/hub?topic=' + encodeURIComponent('http://example.com/books/1'));
es.onmessage = e => {
    console.log('[Service Worker] Push Received.');
    console.dir(e);
    // console.log(`[Service Worker] Push had this data: "${event.data.text()}"`);
    //
    //
    const title = 'Push Codelab';
    const options = {
        body: 'Yay it works.',
        icon: 'images/icon.png',
        badge: 'images/badge.png'
    };

    e.waitUntil(self.registration.showNotification(title, options));

}