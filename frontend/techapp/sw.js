self.addEventListener('install', e=>{
  e.waitUntil(caches.open('dams-tech-v1').then(c=>c.addAll(['./index.html','./techapp.js','./idb.js'])));
});
self.addEventListener('fetch', e=>{
  e.respondWith(fetch(e.request).catch(()=>caches.match(e.request)));
});
