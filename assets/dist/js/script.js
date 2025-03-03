function generateAvatar() {
    const style = document.getElementById("style-select").value; // on laisse la personne choisir le style de son avatar
    const seed = Math.random().toString(36).substring(7); // on génére une seed unique (un id unique pour l'avatar)
    const url = `https://api.dicebear.com/7.x/${style}/svg?seed=${seed}`;

    fetch(url)
        .then(response => response.text()) 
        .then(svg => {
            document.getElementById("avatar").innerHTML = svg; // on met le svg dans la div pour afficher l'avatar généré (sur l'api, les avatars sont généré au format svg)
        })
        .catch(error => console.error("Erreur lors de la récupération de l'avatar :", error));
}