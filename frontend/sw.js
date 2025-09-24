self.addEventListener('install', (e) => {
  e.waitUntil(caches.open('dams-v1').then(c => c.addAll(['/offline.html'])));
});
self.addEventListener('fetch', (e) => {
  e.respondWith(fetch(e.request).catch(() => caches.match('/offline.html')));
});
