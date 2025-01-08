document.addEventListener("DOMContentLoaded", () => {
    let currentIndex = 0;
    const slides = document.querySelectorAll(".slide");

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove("active");
            if (i === index) {
                slide.classList.add("active");
            }
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    // Show the first slide
    showSlide(currentIndex);

    // Automatically change slides every 5 seconds
    setInterval(nextSlide, 5000);
});

// Get the button
const scrollButton = document.getElementById("get-in-touch");

// Add an event listener to the button to smoothly scroll to the contact section
scrollButton.addEventListener("click", function (event) {
    event.preventDefault();  // Prevent the default link behavior

    // Get the target element (contact section)
    const targetSection = document.querySelector("#contact");

    // Scroll smoothly to the contact section
    targetSection.scrollIntoView({
        behavior: "smooth",
        block: "start"
    });
});

// JavaScript to add sliding effect (assuming you're using a simple manual slide system)
let currentSlide = 0;
const slides = document.querySelectorAll('.explore-us-slide');
const totalSlides = slides.length;

function showSlide(index) {
    // Hide all slides
    slides.forEach(slide => slide.style.display = 'none');

    // Show the selected slide
    slides[index].style.display = 'flex';
}

// Function to go to the next slide
function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

// Function to go to the previous slide
function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
}

// Initially show the first slide
showSlide(currentSlide);

// Auto slide every 6 seconds
setInterval(nextSlide, 6000);

