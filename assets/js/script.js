
window.onload = (event) => {
const openModal = document.querySelector('.openModal');
const siteModal = document.querySelector('.site_modal_contact');
const siteOverlay = document.querySelector('.mask');


openModal.addEventListener('click', (e) => {
    siteModal.style.display = 'block';
    siteOverlay.style.display = 'block';
    e.preventDefault();
});

siteOverlay.addEventListener('click', (event) => {
    if(event.target == siteOverlay) {
       
        siteOverlay.style.display = 'none';
    }
});
}