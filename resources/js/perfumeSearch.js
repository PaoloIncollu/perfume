document.addEventListener("DOMContentLoaded", function () {
    console.log("Script per il filtraggio dei profumi ATTIVO!");

    const searchInput = document.getElementById("searchPerfume");

    if (!searchInput) {
        console.error("Elemento #searchPerfume non trovato!");
        return;
    }

    searchInput.addEventListener("keyup", function () {
        console.log("Keyup event triggerato!");
        let filter = searchInput.value.toLowerCase();
        let perfumes = document.querySelectorAll(".perfumes");

        console.log("Filtrando per:", filter);
        console.log("Numero di elementi trovati:", perfumes.length);

        perfumes.forEach(perfume => {
            let brandElement = perfume.querySelector(".my-card .my-col-info h3");

            if (!brandElement) {
                console.error("Elemento h3 non trovato in:", perfume);
                return;
            }

            let brand = brandElement.textContent.toLowerCase();
            console.log("Brand trovato:", brand);

            perfume.classList.toggle("d-none", !brand.includes(filter));

        });
    });
});
