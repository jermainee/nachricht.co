const CACHE = "nachrichtco-cache-v14";

self.addEventListener("install", function (event) {
    console.log("[ServiceWorker] Install Event processing");

    console.log("[ServiceWorker] Skip waiting on install");
    self.skipWaiting();

    event.waitUntil(
        caches.open(CACHE).then(function (cache) {
            console.log("[ServiceWorker] Caching pages during install");
        })
    );
});

self.addEventListener("activate", function (event) {
    console.log("[ServiceWorker] Claiming clients for current page");
    event.waitUntil(self.clients.claim());
});

self.addEventListener("fetch", function (event) {
    console.log("[ServiceWorker] Skip caching"); // temporary disable caching
});
