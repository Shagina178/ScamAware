// Accordion Functionality
const accordionButtons = document.querySelectorAll('.accordion-button');

accordionButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Toggle the 'active' class on the button
        button.classList.toggle('active');

        // Get the panel, which is the next element
        const panel = button.nextElementSibling;

        // Check if the panel is open or closed
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            panel.style.padding = "0 1.5rem"; 
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
            panel.style.padding = "1.5rem"; 
        } 
    });
});