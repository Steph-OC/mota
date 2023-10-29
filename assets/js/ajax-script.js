(function ($) {
    $(document).ready(function () {
        let currentPage = 0;
        $('.btn-all-images').on('click', function (event) {
            currentPage++; //on fait currentPage + 1, car nous voulons charger la page suivante
            event.preventDefault();

            // Accès à l'attribut data du bouton
            const postCat = $(this).data('taxonomy');

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
})(jQuery);