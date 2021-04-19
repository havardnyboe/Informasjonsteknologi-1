function main() {
    if (sessionStorage.getItem('counter')) {
        let page = "pong";
        let counter = Number(sessionStorage.getItem('counter'))

        counter++;
        console.log(counter)

        if (counter % 2 == 0) {
            page = "ping";
            console.log(page);
        } else {
            page = "pong";
            console.log(page);
        }

        sessionStorage.setItem('counter', counter)

        if (counter >= 10) {
            page = "pung";
            console.log(page);
            sessionStorage.setItem('counter', 0)
        }

        console.log(page);
        window.location.href = `${page}.html`
    } else {
        sessionStorage.setItem('counter', 0)
        window.location.reload()
    }
}

window.onload = () => {
    setTimeout(main, 1000);
}