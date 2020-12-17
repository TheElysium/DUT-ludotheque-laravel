function filtreMecaniques(...themes) {
    var cartes = document.getElementsByClassName("carte");
    for (let carte of cartes) {
        carte.style.display = "block";
        var found = false;
        for (let tag of carte.getElementsByClassName("tag")) {
            if (tag.innerHTML in themes) {
                found = true; break;
            }
        }
        if (!found) carte.style.display = "none";
    }
}

function filtreEditeurs(...editeurs) {
    var cartes = document.getElementsByClassName("carte");
    for (let carte of cartes) {
        carte.style.display = "block";
        var found = false;
        for (let editeur of carte.getElementsByClassName("editeur")) {
            if (editeur.innerHTML in editeurs) {
                found = true; break;
            }
        }
        if (!found) carte.style.display = "none";
    }
}

function filtreTheme(...themes) {
    var cartes = document.getElementsByClassName("carte");
    for (let carte of cartes) {
        carte.style.display = "block";
        var found = false;
        for (let theme of carte.getElementsByClassName("theme")) {
            if (theme.innerHTML in themes) {
                found = true; break;
            }
        }
        if (!found) carte.style.display = "none";
    }
}
