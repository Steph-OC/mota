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

}