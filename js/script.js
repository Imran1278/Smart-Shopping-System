let currentIndex = 0;
const backgrounds = ['background-1', 'background-2', 'background-3'];
const body = document.body;

function changeBackground() {
    body.classList.remove(...backgrounds);
    currentIndex = (currentIndex + 1) % backgrounds.length;
    body.classList.add(backgrounds[currentIndex]);
}

setInterval(changeBackground, 3000); // Change background every 3 seconds

// Activate the first background initially
document.addEventListener("DOMContentLoaded", () => {
    body.classList.add(backgrounds[currentIndex]);
});
let slideIndex = 0; // Start from first slide
showSlides(); // Call function to show slides

function showSlides() {
    let i;
    const slides = document.getElementsByClassName("mySlides"); // Get all slides
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; // Hide each slide
    }
    slideIndex++; // Move to next slide
    if (slideIndex > slides.length) {slideIndex = 1} // Reset to first slide
    slides[slideIndex - 1].style.display = "block"; // Show current slide
    setTimeout(showSlides, 3000); // Change slide every 3 seconds
}
// JavaScript for Hover Animation on Social Media Icons
document.querySelectorAll('.social-media a').forEach((icon) => {
    icon.addEventListener('mouseover', () => {
        icon.style.transform = 'scale(1.2)';
        icon.style.transition = 'transform 0.3s';
    });

    icon.addEventListener('mouseout', () => {
        icon.style.transform = 'scale(1)';
    });
});


function changeLanguage(language) {
    // Hide all language content
    const content = document.querySelectorAll('[data-lang]');
    content.forEach((element) => {
        element.style.display = 'none'; // Hide all elements
    });

    // Show the selected language content
    const selectedContent = document.querySelectorAll(`[data-lang="${language}"]`);
    selectedContent.forEach((element) => {
        element.style.display = 'block'; // Show the selected language
    });
}
