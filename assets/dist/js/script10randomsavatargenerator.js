function loadRandomAvatars() {
    const container = document.getElementById("avatars-container2");
    container.innerHTML = ""; // efface les avatars précédents

    for (let i = 0; i < 10; i++) {
        const seed = Math.random().toString(36).substring(7);
        const randomStyle = styles[Math.floor(Math.random() * styles.length)];
        const url = `https://api.dicebear.com/7.x/${randomStyle}/svg?seed=${seed}`;

        const avatarDiv = document.createElement("div");
        avatarDiv.classList.add("col-md-3", "mb-4", "text-center");

        const img = document.createElement("img");
        img.src = url;
        img.alt = "Avatar aléatoire";
        img.classList.add("img-fluid", "rounded");
        img.dataset.seed = seed; // sauvegarde la seed
        img.dataset.style = randomStyle; // sauvegarde le style

        // sélécteur de coulkeurs
        const hairColorInput = document.createElement("input");
        hairColorInput.title = "Couleur des cheveux";
        hairColorInput.type = "color";
        hairColorInput.classList.add("form-control", "form-control-color", "mb-2");
        hairColorInput.value = "#000000";
        hairColorInput.addEventListener("input", () => updateAvatar(img));

        const skinColorInput = document.createElement("input");
        skinColorInput.title = "Couleur de la peau";
        skinColorInput.type = "color";
        skinColorInput.classList.add("form-control", "form-control-color", "mb-2");
        skinColorInput.value = "#ffcc99";
        skinColorInput.addEventListener("input", () => updateAvatar(img));

        const bgColorInput = document.createElement("input");
        bgColorInput.title = "Couleur de l'arrière-plan";
        bgColorInput.type = "color";
        bgColorInput.classList.add("form-control", "form-control-color", "mb-2");
        bgColorInput.value = "#ffffff";
        bgColorInput.addEventListener("input", () => updateAvatar(img));

        avatarDiv.appendChild(img);
        avatarDiv.appendChild(hairColorInput);
        avatarDiv.appendChild(skinColorInput);
        avatarDiv.appendChild(bgColorInput);

        container.appendChild(avatarDiv);
        

    }
}

let updateTimeout;

function updateAvatar(img) {
    clearTimeout(updateTimeout);

    updateTimeout = setTimeout(() => {
        const seed = img.dataset.seed;
        const style = img.dataset.style;
        const hairColor = img.nextSibling.value.replace("#", "");
        const skinColor = img.nextSibling.nextSibling.value.replace("#", "");
        const backgroundColor = img.nextSibling.nextSibling.nextSibling.value.replace("#", "");

        let params = new URLSearchParams({ seed });

        if (style !== "bottts") {
            params.append("hairColor", hairColor);
        }

        if (style !== "bottts" && style !== "micah") {
            params.append("skinColor", skinColor);
        }

        params.append("backgroundColor", backgroundColor);

        img.src = `https://api.dicebear.com/7.x/${style}/svg?${params.toString()}`;
    }, 300); // attendre 300ms avant de mettre à jour l'avatar pour éviter que l'utilisateur spam
}

// quand la page est chargée, exécute la fonction
document.addEventListener("DOMContentLoaded", loadRandomAvatars);

// bouton pour régénérer
document.getElementById("generate-btn").addEventListener("click", loadRandomAvatars);