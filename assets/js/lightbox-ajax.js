jQuery(document).ready(function($) {

    // Gestionnaire de clic pour ouvrir la lightbox
    $(document).on('click', '.icon-expand', function() {
        var postID = $(this).data('postid'); 
        loadPostData(postID);
        $('#lightbox').addClass('opened'); 
    });

    // Gestionnaire de clic pour fermer la lightbox
    $('.lightbox-close').on('click', function() {
        $('#lightbox').removeClass('opened');
    });

    // Gestionnaire de clic pour le bouton suivant
    $('.lightbox-next').on('click', function() {
        var nextPostID = $(this).data('postid-next');
        loadPostData(nextPostID);
    });

    // Gestionnaire de clic pour le bouton précédent
    $('.lightbox-prev').on('click', function() {
        var prevPostID = $(this).data('postid-prev');
        loadPostData(prevPostID);
    });

    function loadPostData(postID) {
        $.ajax({
            url: ajax_object.ajaxurl, 
            type: 'POST',
            data: {
                'action': 'load_lightbox_content',
                'postID': postID
            },
            success: function(response) {
                var data = JSON.parse(response);
                if(data) {
                    // Mettre à jour le contenu de la lightbox
                    $('.lightbox-image').attr('src', data.img);
                    $('.lightbox-reference').text(data.ref);
                    $('.lightbox-category').text(data.taxo);
                }
            }
        });
    }
});
