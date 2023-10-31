(function ($) {
    $(document).ready(function () {
        let currentPage = 0;
        $('.btn-all-images').on('click', function (event) {
            currentPage++; //on fait currentPage + 1, car nous voulons charger la page suivante
            event.preventDefault();

            // Accès à l'attribut data du bouton
            const postCat = $(this).data('taxonomy');
            //pour le bouton de la single page
            if (typeof postCat !== 'undefined') {

                $.ajax({
                    url: ajaxscript.ajaxurl,
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        action: 'btn_load_more',
                        paged: currentPage,
                        taxonomy: postCat,
                    },

                    success: function (res) {
                        $('.img-similar-images').append(res);
                    }
                });
                //quand toutes les images sont affichées on cache le bouton
                $(".btn-all-images").hide();
            }

            //pour le bouton de la page d'accueil
            //si aucune taxonomy n'est passé on affiche tout
            else {
                $.ajax({
                    url: ajaxscript.ajaxurl,
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        action: 'btn_load_more',
                        paged: currentPage,
                    },

                    success: function (res) {
                        $('.img-similar-images').append(res);
                    }
                });
            }
        });
    });
    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////FILTRES FRONT PAGE /////////////////////////////////
    //////////////////////////////////////////////////////////////////////////

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
                    $('.container-images').html(response);
                }
            });
        });
    });

})(jQuery);