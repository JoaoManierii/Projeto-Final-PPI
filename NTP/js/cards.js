import json from './anuncios.json' assert { type: 'json' };

window.onload = () => {
    loadCards(json);
}

function loadCards(data) {
    for (const id in data) {
        let stringFragment = `
        <div class="card">
            <a href="./pages/anuncio.html?productId=${id}">
                <div class="product-item">
                    <div class="img">
                        <img src="${data[id].productPhoto}">
                    </div>
                    <div class="txt">
                        <p class="product-title">${data[id].productTitle}</p>
                        <p class="product-price">R$ ${data[id].productPrice}</p>
                    </div>
                </div>
            </a>
        </div>`;

        const docFragment = document.createRange().createContextualFragment(stringFragment);
        document.getElementById('cards').appendChild(docFragment)
    }
}