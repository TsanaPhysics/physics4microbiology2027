const CACHE_NAME = 'phys4microb-aruco-v2027-10';
const ASSETS = [
  './ar_aruco_textbook.html',
  './aruco_marker_sheet.html',
  './chewa_welcome_intro.js',
  './chewa_pixar_ghibli_welcome.jpg',
  './audio/intro_slide_1.mp3',
  './audio/intro_slide_2.mp3',
  './audio/intro_slide_3.mp3',
  './audio/intro_slide_4.mp3',
  './audio/chewa_welcome_full.mp3',
  './manifest.json'
];

self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open(CACHE_NAME).then((cache) => cache.addAll(ASSETS))
  );
  self.skipWaiting();
});

self.addEventListener('activate', (e) => {
  e.waitUntil(
    caches.keys().then((keys) =>
      Promise.all(keys.filter((k) => k !== CACHE_NAME).map((k) => caches.delete(k)))
    )
  );
  self.clients.claim();
});

self.addEventListener('fetch', (e) => {
  e.respondWith(
    fetch(e.request)
      .then((res) => {
        const clone = res.clone();
        caches.open(CACHE_NAME).then((cache) => cache.put(e.request, clone));
        return res;
      })
      .catch(() => caches.match(e.request))
  );
});
