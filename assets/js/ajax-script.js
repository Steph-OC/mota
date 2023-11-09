
(function ($) {
    $(document).ready(function () {
        let currentPage = 0;
        let isSinglePhotoPage = $('body').hasClass('single-photo'); // Vérifiez si c'est la page single-photo
        // Gestionnaire de clics pour les images
        $(document).on('click', '.image-similar', function() {
            // Ici,  ouvrir une lightbox ou exécuter d'autres actions quand on clique sur une image
        });

        // Initialisation du bouton Load More
        $('.btn-all-images').on('click', function (event) {
            event.preventDefault();
            let button = $(this); // le bouton cliqué
            currentPage++; // Incrémente currentPage pour charger la page suivante

            // Accès à l'attribut data du bouton
            const postCat = button.data('taxonomy');

            // Prépare les données de la requête
            let ajaxData = {
                action: 'btn_load_more',
                paged: currentPage,
            };

            // Ajoute la taxonomy si elle est définie
            if (typeof postCat !== 'undefined') {
                ajaxData.taxonomy = postCat;
            }

            $.ajax({
                url: ajaxscript.ajaxurl,
                type: 'POST',
                dataType: 'html',
                data: ajaxData,
                beforeSend: function () {
                    button.attr('disabled', true); // Désactive le bouton pendant le chargement
                },
                success: function (res) {
                    if (res.trim().length) {
                        $('.img-similar-images').append(res);
                        // Si on est sur la single-photo page, cache le bouton après le chargement des images
                        if (isSinglePhotoPage) {
                            button.hide();
                        } else {
                            // Sur la front-page, réactive le bouton pour charger plus d'images
                            button.attr('disabled', false);
                        }
                    } else {
                        button.hide(); 
                    }
                },
                error: function () {
                    button.attr('disabled', false); // Réactive le bouton en cas d'erreur
                }
            });
        });
    });
})(jQuery);

    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////FILTRES FRONT PAGE /////////////////////////////////
    //////////////////////////////////////////////////////////////////////////
    (function ($) {
    $(document).ready(function () {
        $('.categories_filters, .formats_filters').change(function () {
            const category = $('.categories_filters').val();
            const format = $('.formats_filters').val();
            const date = $('.dates_filters').val();

            $.ajax({
                url: ajaxscript.ajaxurl, // URL de l'action Ajax
                method: 'POST', // Méthode de la requête Ajax
                data: {
                    action: 'filters_photos',
                    category: category,
                    format: format,
                    date: date,
                },

                success: function (response) {
                    // Réponse de la requête Ajax
                    $('.image-similar').html(response);
                }
            });
        });
    });

})(jQuery);