window.onload = (event) => {
  

    const openModal = document.querySelector('.openModal');
    const modal = document.getElementById('myModal');
        
    openModal.addEventListener('click', (e) => {
        modal.classList.add('show');
        e.preventDefault();
    });
 
    window.addEventListener('click', (event) => {
        if (event.target == modal) {
            modal.classList.remove('show');
        }
    });
 
//on prérempli le champ ref.photo dans la modal
    const refPhoto = document.getElementById('ref').textContent;
    const inputRef = document.querySelector('.input-ref-photo');
    const btnContact = document.querySelector('.btn-interest');
  
    btnContact.addEventListener('click', (e) => {
        modal.classList.add('show');
        inputRef.value = refPhoto;
    })
  
}


