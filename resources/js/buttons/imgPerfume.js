document.addEventListener('DOMContentLoaded', () => {
    // Seleziona tutti i contenitori immagine che hanno un ID specifico
    const imageContainers = document.querySelectorAll('[id^="image_container"]');

    // Per ogni contenitore, inizializza la gestione delle immagini
    imageContainers.forEach(container => {
        const id = container.id.replace('image_container', ''); // Estrai l'ID dinamico
        setupImageHandler(id);
    });

    function setupImageHandler(id) {
        const imgInput = document.getElementById(`img_input${id}`);
        const removeImgButton = document.getElementById(`remove_image${id}`);
        const imgPreview = document.getElementById(`img_preview${id}`);
        const removeImgCheckbox = document.getElementById(`removeimage_input${id}`);
        const imgLabel = document.querySelector(`[for="img_input${id}"]`);
        const imageContainer = document.getElementById(`image_container${id}`);

        function toggleImageControls(hasImage) {
            if (imgPreview) imgPreview.style.display = hasImage ? 'block' : 'none';
            if (removeImgButton) removeImgButton.style.display = hasImage ? 'flex' : 'none';
            if (imgLabel) imgLabel.textContent = hasImage ? 'Modifica immagine' : 'Carica una nuova immagine';
        }

        // Inizializza i controlli in base alla presenza di un'immagine
        if (imgPreview && imgPreview.src) {
            toggleImageControls(true);
        } else {
            toggleImageControls(false);
        }

        // Gestione del cambio immagine tramite input
        imgInput?.addEventListener('change', ({ target }) => {
            const file = target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    if (imgPreview) {
                        imgPreview.src = e.target.result;
                        toggleImageControls(true);
                    }
                    if (removeImgCheckbox) removeImgCheckbox.checked = false; // Resetta il checkbox
                };
                reader.readAsDataURL(file);
            }
        });

        // Gestione del click sul pulsante "rimuovi immagine"
        removeImgButton?.addEventListener('click', () => {
            if (removeImgCheckbox) removeImgCheckbox.checked = true; // Imposta il checkbox
            if (imgPreview) imgPreview.src = ''; // Resetta l'anteprima
            if (imgInput) imgInput.value = ''; // Resetta il valore dell'input file
            toggleImageControls(false);

            // Nascondi il contenitore immagine se necessario
            if (imageContainer) {
                imageContainer.style.display = 'none';
            }
        });
    }
});
