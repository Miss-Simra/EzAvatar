
// menu

document.getElementById("menuToggle").addEventListener("click", function() {
    document.getElementById("mobileMenu").style.display = "flex";
});

document.getElementById("closeMenu").addEventListener("click", function() {
    document.getElementById("mobileMenu").style.display = "none";
});

document.getElementById("mobileMenu").addEventListener("click", function(e) {
    if (e.target === this) {
        this.style.display = "none";
    }
});


//responsive 

window.addEventListener("resize", function () {
    let img = document.querySelector(".fullscreen-img");
    let title = document.querySelector("h1");

    if (window.innerWidth <= 768) {
        img.style.width = "100%";
        img.style.height = "auto";
        img.style.position = "static";
        img.style.border = "none";
        img.style.borderRadius = "0";
        img.style.margin = "0";
        img.style.padding = "0";

        title.style.textAlign = "center";
        title.style.fontSize = "2rem";
        title.style.maxWidth = "100%";
        title.style.marginTop = "1rem";
    }
});








function updateOptionsVisibility() {
    const style = document.getElementById("style-select").value;
    
    // sélection des éléments
    const hairColorOption = document.querySelector("[data-option='hairColor']");
    const skinColorOption = document.querySelector("[data-option='skinColor']");
    
    // on cache les options si c'est pas dispo pour le style choisi
    if (style === "bottts") {
        hairColorOption.style.display = "none";
        skinColorOption.style.display = "none";
    } else if (style === "micah") {
        hairColorOption.style.display = "block";
        skinColorOption.style.display = "none";
    } else {
        hairColorOption.style.display = "block";
        skinColorOption.style.display = "block";
    }
}

// Une fois ces vérifications faites, on lance la fonction de génération d'avatar
function generateAvatar() { 
    updateOptionsVisibility(); // on utilise la fonction crée plus haut pour cacher les options pas disponibles pour le style choisi (robot = pas de couleur de cheveux et de peau et micah= pas de couleur de peau)

    const style = document.getElementById("style-select").value;
    const seed = Math.random().toString(36).substring(7);
    let params = new URLSearchParams({ seed: seed });

    const hairColorInput = document.getElementById("hair-color-select");
    const skinColorInput = document.getElementById("skin-color-select");
    const backgroundColorInput = document.getElementById("background-color-select");

    if (hairColorInput.offsetParent !== null) { 
        params.append("hairColor", hairColorInput.value.replace("#", ""));
    }

    if (skinColorInput.offsetParent !== null) { 
        params.append("skinColor", skinColorInput.value.replace("#", ""));
    }

    params.append("backgroundColor", backgroundColorInput.value.replace("#", ""));

    const url = `https://api.dicebear.com/7.x/${style}/svg?${params.toString()}`;
    console.log("URL générée :", url);

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erreur API DiceBear : ${response.status}`);
            }
            return response.text();
        })
        .then(svg => {
            document.getElementById("avatar").innerHTML = svg;
        })
        .catch(error => console.error("Erreur lors de la récupération de l'avatar :", error));
}

// détecter si le style est changé
document.getElementById("style-select").addEventListener("change", updateOptionsVisibility);

// quand c'est chargé, vérifie la fonction
updateOptionsVisibility();
