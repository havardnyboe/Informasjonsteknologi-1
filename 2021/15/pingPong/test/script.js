function main() {
    if (localStorage.getItem('counter')) {
        let page = "pong";
        let counter = Number(localStorage.getItem('counter'))

        counter++;
        console.log(counter)

        if (counter % 2 == 0) {
            page = "ping";
            console.log(page);
        } else {
            page = "pong";
            console.log(page);
        }

        localStorage.setItem('counter', counter)

        if (counter >= 10) {
            page = "pung";
            console.log(page);
            localStorage.setItem('counter', 0)
        }

        console.log(page);
        window.location.href = `${page}.html`
    } else {
        localStorage.setItem('counter', 0)
        window.location.reload()
    }
}

window.onload = () => {
    setTimeout(main, 1000);
}