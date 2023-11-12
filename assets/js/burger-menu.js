document.addEventListener('DOMContentLoaded', function() {
    const burger = document.querySelector('.burger');
    const menuMobile = document.querySelector('.menu-mobile');
    const siteHeaderMenu = document.querySelector('.site_header_menu');

    burger.addEventListener('click', function() {
        toggleMenu();
    });

    // Fonction pour basculer l'état du menu
    function toggleMenu() {
        burger.classList.toggle('active');
        siteHeaderMenu.classList.toggle('active');

        if (menuMobile.classList.contains('active')) {
            menuMobile.classList.add('closing');
        } else {
            menuMobile.classList.add('active');
        }

        menuMobile.addEventListener('animationend', function() {
            if (menuMobile.classList.contains('closing')) {
                menuMobile.classList.remove('active', 'closing');
            }
        }, { once: true });//garantit que l'écouteur d'événements s'exécute une seule fois après la fin de l'animation 
    }

    // Gestion des clics en dehors du menu
    document.addEventListener('click', function(event) {
        const clickedInsideMenu = menuMobile.contains(event.target) || burger.contains(event.target);

        if (!clickedInsideMenu && menuMobile.classList.contains('active')) {
            toggleMenu();
        }
    });
});
