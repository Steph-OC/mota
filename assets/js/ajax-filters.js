(function ($) {

    $(document).ready(function () {
          // Gestionnaire de clics pour les images
          $(document).on('click', '.img-similar-images .image-similar', function() {
           
        });
        // Lorsque le formulaire de filtrage est soumis
        $('#photos_filters').on('change', 'select', function (e) {
            e.preventDefault();

            const categorie = $('#categories-select').val();
            let format = $('#formats-select').val();
            const date = $('#date-select').val();
            // Vérifie si la valeur est la valeur par défaut et, 
            //dans ce cas, on la définit sur une chaîne vide
            if (format === 'Formats') {
                format = '';
            }
            const data = {
                action: 'filters_photos',
                categorie: categorie,
                format: format,
                date: date,
                photos_filter_nonce: $('#photos_filter_nonce').val() // Ajout du nonce pour la sécurité
            };

            $.ajax({
                url: ajaxscript.ajaxurl, //variable globale pour l'URL de l'API Ajax de WordPress
                type: 'POST',
                dataType: 'html',
                data: data,
                

                success: function (response) {
                    $('.img-similar-images').empty(); // Supprime le contenu précédent
                    $('.img-similar-images').append(response);
                },
                error: function () {
                    alert('Erreur lors de la requête AJAX.');
                }
            });
        });
    });
})(jQuery);