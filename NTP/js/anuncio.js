import json from './anuncios.json' assert { type: 'json' };

window.onload = () => {
    const params = new URLSearchParams(parent.document.URL.substring(parent.document.URL.indexOf('?'), parent.document.URL.length)).get('productId')
    
    const data = json[params]

    document.getElementById("title").innerHTML = data.title
    document.getElementById("published").innerHTML = "Publicado em " + data.published
    document.getElementById("price").innerHTML = "R$ " + data.price
    document.getElementById("description").innerHTML = data.description
    document.getElementById("name").innerHTML = data.advertiser.name
    document.getElementById("tel").innerHTML = data.advertiser.tel
}



