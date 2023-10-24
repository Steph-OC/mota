
window.onload = (event) => {

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

    //////////////////////////////////////////////////////////////////////////////
    //Afficher image au hover fleches
    //image actuelle
    let imageMiniature = document.querySelector('.photo-interest > img')
    // image d'origine
    const urlImgOrigine = imageMiniature.src;
    const leftNav = document.querySelector('.left > img');
    const rightNav = document.querySelector('.right');

    leftNav.addEventListener('mouseover', (e) => {
        let imgPrev = e.target.dataset.prev;
        imageMiniature.src = imgPrev;
        imageMiniature.srcset = imgPrev;
    });

    leftNav.addEventListener('mouseout', (e) => {
        imageMiniature.src = urlImgOrigine;
        imageMiniature.srcset = urlImgOrigine;
    });

    rightNav.addEventListener('mouseover', (e) => {
        let imgNext = e.target.dataset.next;
        imageMiniature.src = imgNext;
        imageMiniature.srcset = imgNext;
    });

    rightNav.addEventListener('mouseout', () => {
        imageMiniature.src = urlImgOrigine;
        imageMiniature.srcset = urlImgOrigine;
    });





}