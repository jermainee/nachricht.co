const CACHE = "nachrichtco-cache-v14";
const precacheFiles = [];

self.addEventListener("install", function (event) {
    console.log("[ServiceWorker] Install Event processing");

    console.log("[ServiceWorker] Skip waiting on install");
    self.skipWaiting();

    event.waitUntil(
        caches.open(CACHE).then(function (cache) {
            console.log("[ServiceWorker] Caching pages during install");
            return cache.addAll(precacheFiles);
        })
    );
});

// Allow sw to control of current page
self.addEventListener("activate", function (event) {
    console.log("[ServiceWorker] Claiming clients for current page");
    event.waitUntil(self.clients.claim());
});

// If any fetch fails, it will look for the request in the cache and serve it from there first
self.addEventListener("fetch", function (event) {
    console.log("[ServiceWorker] Skip caching");
    return; // temporary disable caching

    if (event.request.url.includes('/n') || /^https:\/\/nachricht\.co\/(.*?)_(.*?)$/.test(event.request.url)) {
        console.log("[ServiceWorker] Skip caching here because of sensitive data");
        return;
    }
});
