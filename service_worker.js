// nombre de cache
const CACHE_NAME = 'v1_rutas_del_peru',
    urlsToCache = [
        './',
        'css/estilos.css',
        'bootstrap/css/bootstrap.css',
        'js/script.js',
        'img/bgIndex.jpg',
        'img/iconos/icon512.png',
        'img/iconos/icon256.png',
        'img/machu-picchu.jpg',
        'img/img-regiones/amazonas-chachapoyas.jpg',
        'img/img-regiones/ancash-huascaran.jpg',
        'img/img-regiones/apurimac-sayhuite.JPG',
        'img/img-regiones/arequipa-colca.jpg',
        'img/img-regiones/ayacucho-millpu.jpg',
        'img/img-regiones/cajamarca-ventanillas-de-otuzco.jpg',
        'img/img-regiones/cusco-machu-picchu.jpg',
        'img/img-regiones/huancavelica-plaza-de-armas.jpg',
        'img/start-icon.png'
    ]
//instalacion en cache de archivos estaticos
self.addEventListener('install', e => {
    e.waitUntil(
        caches.open(CACHE_NAME)
        .then(cache => {
            return cache.addAll(urlsToCache)
                .then(() => self.skipWaiting())
        })
        .catch(err => console.log('fallo registro de cache', err))
    )
})

//activa y busca los recursos instalados y funcione sin conexion
self.addEventListener('activate', e => {
    const cacheWhitelist = [CACHE_NAME]

    e.waitUntil(
        caches.keys()
        .then(cacheNames => {
            cacheNames.map(cacheName => {
                //Eliminamos lo que ya no se necesita en cache
                if (cacheWhitelist.indexOf(cacheName) === -1) {
                    return caches.delete(cacheName)
                }
            })
        })
        //lo que indica al SW activar el cache actual
        .then(() => self.clients.claim())
    )
})

//cuando el navegador recupera conexion, actualiza los archivos de cache
self.addEventListener('fetch', e => {
    //Responde ya sea con el objeto en caché o continuar y buscar la url real
    e.respondWith(
        caches.match(e.request)
        .then(res => {
            if (res) {
                //recuperar del cache
                return res
            }
            //recuperar de la peticion a la url
            return fetch(e.request)
        })
    )
})