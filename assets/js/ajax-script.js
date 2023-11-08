
(function ($) {
    $(document).ready(function () {
        let currentPage = 0;

        // Gestionnaire de clics pour les images
        $(document).on('click', '.image-similar', function() {
            // Ici, vous pouvez ouvrir une lightbox ou exécuter d'autres actions quand on clique sur une image
        });

        // Initialisation du bouton Load More
        $('.btn-all-images').on('click', function (event) {
            event.preventDefault();
            let button = $(this); // le bouton cliqué
            currentPage++; // Incrémente currentPage pour charger la page suivante

            // Accès à l'attribut data du bouton
            const postCat = button.data('taxonomy');

            // Préparez les données de la requête
            let ajaxData = {
                action: 'btn_load_more',
                paged: currentPage,
            };

            // Ajoutez la taxonomy si elle est définie
            if (typeof postCat !== 'undefined') {
                ajaxData.taxonomy = postCat;
            }

            $.ajax({
                url: ajaxscript.ajaxurl,
                type: 'POST',
                dataType: 'html',
                data: ajaxData,
                beforeSend: function () {
                    button.attr('disabled', true); // Désactivez le bouton pendant le chargement
                },
                success: function (res) {
                    if (res.trim().length) {
                        $('.img-similar-images').append(res);
                        button.attr('disabled', false); // Réactivez le bouton une fois le chargement terminé
                    } else {
                        // Gérez le cas où il n'y a plus d'images à charger
                        button.hide(); // Cachez le bouton si plus rien à charger
                    }
                },
                error: function () {
                    // Gérez les erreurs ici si nécessaire
                    button.attr('disabled', false); // Assurez-vous que le bouton peut être réessayé si l'ajax échoue
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