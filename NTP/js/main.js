window.onload = () => {
    let menu = document.getElementById('navbar-menu');
    let item = document.getElementById('navbar-item');
    let clicked = false

    menu.addEventListener('click', () => {
        if (!clicked) {
            item.style.display = 'block';
            clicked = true
        } else {
            item.style.display = 'none';
            clicked = false
        }
    })
}