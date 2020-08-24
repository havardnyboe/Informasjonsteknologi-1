const out = document.querySelector('#RNG');

window.onload = () => {
    document.querySelector('#btnRNG').onclick = () => {
        let rnd = Math.trunc(Math.random() * 100)
        out.value = rnd;
    }
}