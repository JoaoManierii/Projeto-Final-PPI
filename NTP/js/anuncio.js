import json from './anuncios.json' assert { type: 'json' };

window.onload = () => {
    const params = new URLSearchParams(parent.document.URL.substring(parent.document.URL.indexOf('?'), parent.document.URL.length)).get('productId');
    loadAd(json[params])
}

function loadAd(data) {
    for (const key in data) {
        document.getElementById(key).innerHTML = data[key];
        document.getElementById(key).src = data[key]
    }
}
