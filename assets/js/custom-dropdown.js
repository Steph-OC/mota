document.addEventListener("DOMContentLoaded", function () {
    const customDropdowns = document.querySelectorAll('.custom-dropdown');

    customDropdowns.forEach(dropdown => {
        const arrowDiv = dropdown.querySelector('.arrow');
        const selectedOptionDiv = dropdown.querySelector('.selected-option');
        dropdown.addEventListener('click', function () {
            arrowDiv.classList.toggle('open');
            selectedOptionDiv.classList.toggle('open');
        });
    });

    function fillDropdownOptions() {
        customDropdowns.forEach(dropdown => {
            const associatedSelect = document.getElementById(dropdown.getAttribute('data-associated-select'));
            const divOptions = dropdown.querySelector('.options');
            Array.from(associatedSelect.options).forEach(option => {
                const div = document.createElement('div');
                div.setAttribute('data-value', option.value);
                div.textContent = option.text;
                divOptions.appendChild(div);
            });
        });
    }

    function setupDropdownInteractions() {
        customDropdowns.forEach(dropdown => {
            const selectedOptionDiv = dropdown.querySelector('.selected-option');
            const selectedTextSpan = selectedOptionDiv.querySelector('.selected-text');
            const divOptions = dropdown.querySelector('.options');
            const associatedSelect = document.getElementById(dropdown.getAttribute('data-associated-select'));

            selectedOptionDiv.addEventListener('click', () => {
                if (divOptions.classList.contains('visible')) {
                    divOptions.classList.remove('visible');
                    divOptions.classList.add('hiding');
                    setTimeout(() => {
                        divOptions.classList.remove('hiding');
                    }, 300); // le même temps que la durée de l'animation
                } else {
                    divOptions.classList.add('visible');
                }
            });
            
            divOptions.addEventListener('click', (event) => {
                event.stopPropagation();
                if (event.target.tagName.toLowerCase() === 'div') {
                    const value = event.target.getAttribute('data-value');
            
                    divOptions.querySelectorAll('div').forEach(div => div.classList.remove('option-selected'));
                    event.target.classList.add('option-selected');
                    associatedSelect.value = value;
                    Array.from(associatedSelect.options).forEach(opt => opt.selected = opt.value === value);
                    selectedTextSpan.textContent = event.target.textContent;
            
                    divOptions.classList.add('hiding');  // Ajoute la classe 'hiding' pour commencer l'animation de fermeture
            
                    setTimeout(() => {  // Après la durée de l'animation, retirez 'visible' et 'hiding'
                        divOptions.classList.remove('visible', 'hiding');
                    }, 700); // la durée de l'animation, soit 0.7s
            
                    dropdown.classList.remove('active');
                    jQuery(associatedSelect).trigger('change');
                    const arrowDiv = dropdown.querySelector('.arrow');
                    arrowDiv.classList.toggle('open');
                    selectedOptionDiv.classList.remove('open');
                }
            });
            

            document.addEventListener('click', (event) => {
                if (!event.target.closest('.custom-dropdown')) {
                    customDropdowns.forEach(dropdown => {
                        dropdown.querySelector('.options').classList.remove('visible');
                        dropdown.classList.remove('active'); // Suppression de la classe 'active' lorsqu'on clique en dehors du menu déroulant
                    });
                }
            });
        });
    }

    fillDropdownOptions();
    setupDropdownInteractions();
});
