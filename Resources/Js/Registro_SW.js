/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

const applicationServerPublicKey = '<BASvDh9ms9D2H__K2CZx1ywMp0obKObq3gHDca7TAh8XdxF-dcAFvdqWsaHqmWbODJI1lpzBSR96oTau5FJ4Y0I>';

//validar si el navegador soporta el service worker y notificaciones push
if('serviceWorker' in navigator && 'PushManager' in window){
    console.log('Service Worker y Push soportados')
    window.addEventListener('load',()=>{
        navigator.serviceWorker.register('./sw.js')
        .then(registration =>{
            console.log(registration)
            console.log('Service Worked registrado con exito',registration.scope)
        })
        .catch(error => console.log('Registro fallido',error))
    })
}else{
    console.warn('Mensajes Push no soportados');
    pushButton.textContent = 'Push no soportado';
}



/*
if('serviceWorker' in navigator){
    //alert("entro¿?");
    window.addEventListener('load',()=>{
        navigator.serviceWorker.register('./sw.js')
        .then(registration =>{
            console.log(registration)
            console.log('Service Worked registrado con exito',registration.scope)
        })
        .catch(error => console.log('Registro fallido',error))
    })
}
*/

