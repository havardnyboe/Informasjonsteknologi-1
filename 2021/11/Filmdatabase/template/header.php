<script>
function menyToggle(x) {

    let meny = document.querySelector('#meny-wrapper');
    let searchBox = document.querySelector('.searchBox');

    if (meny.style.display != 'none') {
        meny.style.display = 'none';
        searchBox.style.display = 'block';

    } else {
        meny.style.display = 'flex';
        searchBox.style.display = 'none';
    }

    x.classList.toggle("change");
}
</script>

<nav class="menu-bar">
    <span class="logo"><a href="/~haa0110/filmdatabase/home/">!IMDb</a></span>

    <form class="searchForm" action="../php/search.php" method="POST">
        <input class="searchBox" type="search" name="searchBox" id="searchBox"
            placeholder="Søk etter tittel, forfatter, utgiver eller medie">
    </form>

    <span id="meny-wrapper" style="display: none; align-items: center;">
        <ul>
            <li><a href="/~haa0110/filmdatabase/php/filmer.php">Filmer</a></li>
            <li><a href="/~haa0110/filmdatabase/php/serier.php">Serier</a></li>
            <li><a href="/~haa0110/filmdatabase/php/boker.php">Bøker</a></li>
            <li><a href="/~haa0110/filmdatabase/php/registrer.php">Legg til</a></li>
        </ul>
    </span>
    <div class="container" onclick="menyToggle(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
</nav>