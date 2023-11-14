document.addEventListener('DOMContentLoaded', function () {
    const nextButton = document.querySelector('.lightbox-next');
    const prevButton = document.querySelector('.lightbox-prev');
    let currentIndex = 0;
    let expandIcons = document.querySelectorAll('.icon-expand');

    function fillAndOpenLightbox(imageUrl, category, reference) {
        const lightboxImage = document.querySelector('.lightbox-image');
        const lightboxReference = document.querySelector('.lightbox-reference');
        const lightboxCategory = document.querySelector('.lightbox-category');

        lightboxImage.src = imageUrl;
        lightboxReference.textContent = reference;
        lightboxCategory.textContent = category;

        document.querySelector('.lightbox').classList.add('opened');
    }

    document.addEventListener('click', function (event) {
        const icon = event.target.closest('.icon-expand');
        if (icon) {
            expandIcons = document.querySelectorAll('.icon-expand'); // Mise à jour de la liste des icônes
            currentIndex = Array.from(expandIcons).indexOf(icon);

            const imageUrl = icon.getAttribute('data-url');
            const category = icon.getAttribute('data-category');
            const reference = icon.getAttribute('data-reference');

            fillAndOpenLightbox(imageUrl, category, reference);
        }
    });

    nextButton.addEventListener('click', function () {
        currentIndex = (currentIndex + 1) % expandIcons.length;
        const newIcon = expandIcons[currentIndex];

        fillAndOpenLightbox(newIcon.getAttribute('data-url'), newIcon.getAttribute('data-category'), newIcon.getAttribute('data-reference'));
    });

    prevButton.addEventListener('click', function () {
        currentIndex = (currentIndex - 1 + expandIcons.length) % expandIcons.length;
        const newIcon = expandIcons[currentIndex];

        fillAndOpenLightbox(newIcon.getAttribute('data-url'), newIcon.getAttribute('data-category'), newIcon.getAttribute('data-reference'));
    });

    const closeButton = document.querySelector('.lightbox-close');
    closeButton.addEventListener('click', function () {
        document.querySelector('.lightbox').classList.remove('opened');
    });
});
