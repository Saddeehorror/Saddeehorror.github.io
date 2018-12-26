/*
 Copyright 2016 Google Inc. Todos los derechos reservados.
  Licencia bajo la Licencia Apache, Versión 2.0 (la "Licencia");
  no puede usar este archivo excepto en conformidad con la Licencia.
  Puede obtener una copia de la Licencia en
  http://www.apache.org/licenses/LICENSE-2.0
  A menos que lo exija la ley aplicable o se acuerde por escrito, el software
  distribuido bajo la Licencia se distribuye "TAL CUAL",
  SIN GARANTÍAS O CONDICIONES DE NINGÚN TIPO, ya sean expresas o implícitas.
  Consulte la Licencia para el idioma específico que rige los permisos y
  limitaciones bajo la licencia.
 */ 

/* 
 * Eventos del service worker ->
 * install: se crea el cache y se inician los activos
 * activate: actualiza el cache
 * fetch: recupera archivos del cache,de la red o de cualquier medio disponible
 * se invoca a si mismo con la palabra reservada self
 */

const PRECACHE = 'ambientalistas_cale-v1';
const RUNTIME = 'runtime';
//const CACHE_NAME = 'pwa-demo-cache-v1';

const URLS_A_CACHE = [
];

self.addEventListener('install', e => {
    console.log('Evento: SW Instalando...', e);
    e.waitUntil(
            caches.open(PRECACHE)
            .then(cache => {
                console.log('Cache abierto, Archivos en cache')
                return cache.addAll(URLS_A_CACHE)
            })
            .then(self.skipWaiting())
            .catch(error => console.log('Fallo registro de cache', error))
            )
})



self.addEventListener('activate', e => {
    console.log('Evento: SW Activando...', e)

    const cacheActual = [PRECACHE, RUNTIME];

    e.waitUntil(
            caches.keys()
            .then(cacheNames => {
                return cacheNames.filter(cacheName => {
                    return !cacheActual.includes(cacheName)
                });
            })
            .then(cachesToDelete => {
                return Promise.all(cachesToDelete.map(cacheToDelete => {
                    return caches.delete(cacheToDelete);
                }));
            })
            .then(() => {
                self.clients.claim()
            })
            .then(() => {
                console.log('El cache esta limpio y actualizado')
                //return self.clients.claim()
            })
            );
});


self.addEventListener('fetch', e => {
    console.log('Evento: SW recuperando', e)
    var queryurl = e.request.url.split("?");
    var phpulr = e.request.url.split(".php");

    var reloadAll = (queryurl.length > 0 || phpulr.length > 0);
    if (e.request.url.startsWith() && e.request.method == "POST" && !reloadAll) {
        e.respondWith(
                caches.match(event.request).then(function (cachedResponse) {
            if (cachedResponse) {
                return cachedResponse;
            }
            return caches.open(RUNTIME).then(function (cache) {
                return fetch(event.request).then(function (response) {
                    // Put a copy of the response in the runtime cache.

                    return cache.put(event.request, response.clone()).then(function () {
                        return response;
                    });
                });
            });
        })
                );
    }
    /*e.respondWith(
     caches.match(e.request)
     .then(response =>{
     if(response){
     return response
     }
     
     //var fetchRequest = e.request.clone();
     
     return fetch(e.request)
     .then(response =>{
     let resToCache = response.clone()
     /*if(!response || response.status !== 200 || response.type !== 'basic'){
     return response;
     }
     var responseToCache = response.clone();*/
    /*
     caches.open(CACHE_NAME)
     .then(cache => {
     cache.put(e.request,resToCache)
     .catch(err => console.log(`${e.request.url}:${err.message}`))
     })
     return response
     }) 
     })
     )*/
});


/* 
 * '/css/materialize.min.css',
 './css/stylesheet.css',
 './sw.js',
 './js/Funciones',
 './js/materialize.min.js',
 'https://code.jquery.com/jquery-3.3.1.min.js',
 'https://use.fontawesome.com/releases/v5.2.0/css/all.css',
 'https://fonts.googleapis.com/icon?family=Material+Icons'
 */
