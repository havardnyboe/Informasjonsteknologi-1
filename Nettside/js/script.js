const gif = document.querySelector('#gif');
const images = ['cat1', 'cat2', 'cat3', 'dance1', 'dance2', 'dance3', 'dog1', 'spiderman1', 'spiderman2'];

function randImg() {
    let i = Math.trunc(Math.random()*images.length)
    gif.innerHTML = `<img src="./Nettside/img/${images[i]}.gif" height="400" alt="cat">`
}

window.onload = randImg
document.querySelector('#gif-button').onclick = randImg
document.querySelector('#gif-button-nav').onclick = randImg
