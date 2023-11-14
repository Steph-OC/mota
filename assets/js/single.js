///////////////////////////////////////////////////////////////////////
            // Rempli le champs ref de la modal//
///////////////////////////////////////////////////////////////////////
window.addEventListener('load', (event) => {

    //on prérempli le champ ref.photo dans la modal
    const modal = document.getElementById('myModal');
    const refPhoto = document.getElementById('ref').textContent;
    const inputRef = document.querySelector('.input-ref-photo');
    const btnContact = document.querySelector('.btn-interest');

    btnContact.addEventListener('click', (e) => {
        modal.classList.add('show');
        inputRef.value = refPhoto;
    });
    window.addEventListener('click', (event) => {
        if (event.target == modal) {
            modal.classList.remove('show');
        }
    });

    //Ouverture de la modal par le lien contact du menu
    const openModal = document.querySelector('.openModal');

    openModal.addEventListener('click', (e) => {
        modal.classList.add('show');
        e.preventDefault();
    });
});

//////////////////////////////////////////////////////////////////////////////
                //Affiche image au hover fleches//
                //renvoie sur la description de l'image au clic//
//////////////////////////////////////////////////////////////////////////////
  
// Sélectionne toutes les images pour le carrousel
document.addEventListener('DOMContentLoaded', function() {
    
    let imageMiniature = document.querySelector('.photo-interest > img');
    // image d'origine pour la réinitialisation au mouseout
    const urlImgOrigine = imageMiniature.src;
    const leftNav = document.querySelector('.left > img');
    const rightNav = document.querySelector('.right > img');

    console.log('Left Nav:', leftNav);
    console.log('Right Nav:', rightNav);

    leftNav.addEventListener('mouseover', (e) => {
        console.log('Left hover');
        let imgPrev = e.target.dataset.prev;
        console.log('Prev Image URL:', imgPrev);
        if (imgPrev) {
            imageMiniature.src = imgPrev;
            imageMiniature.srcset = imgPrev;
        }
    });

    leftNav.addEventListener('mouseout', (e) => {
        console.log('Left out');
        imageMiniature.src = urlImgOrigine;
        imageMiniature.srcset = urlImgOrigine;
    });

    rightNav.addEventListener('mouseover', (e) => {
        console.log('Right hover');
        let imgNext = e.target.dataset.next;
        console.log('Next Image URL:', imgNext);
        if (imgNext) {
            imageMiniature.src = imgNext;
            imageMiniature.srcset = imgNext;
        }
    });

    rightNav.addEventListener('mouseout', (e) => {
        console.log('Right out');
        imageMiniature.src = urlImgOrigine;
        imageMiniature.srcset = urlImgOrigine;
    });
});

