let counter = 0;
let page = "pong";

window.onload = () => {
    counter++;

    if (counter % 2 == 0) {
        page = "ping";
    } else {
        page = "pong";
    }

    if (counter >= 10) {
        page = "pung";
        coutner = 0;
    }
    document.body.innerHTML = `<?php header( " url=${page}.php" ); ?>`;
}