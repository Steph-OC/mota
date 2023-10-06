window.onload = (event) => {
    const openModal = document.querySelector('.openModal');
    // Get the modal
    const modal = document.getElementById('myModal');

    // When the user clicks on the button, open the modal
    openModal.addEventListener('click', (e) => {
        modal.classList.add('show');
        e.preventDefault();
    });
    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', (event) => {
        if (event.target == modal) {
            modal.classList.remove('show');
        }
    });

}
