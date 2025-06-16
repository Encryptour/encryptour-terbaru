document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navbar = document.querySelector('.navbar');

    menuToggle.addEventListener('click', function() {
        navbar.classList.toggle('active');
    });


});
const slider = document.getElementById("slider");
const indicators = document.querySelectorAll(".slider-indicator");
const prevButton = document.getElementById("prev");
const nextButton = document.getElementById("next");

let currentSlide = 0;

function updateSlider() {
    slider.style.transform = `translateX(-${currentSlide * 100}%)`;
    updateIndicators();
}

function updateIndicators() {
    indicators.forEach((indicator, index) => {
        if (index === currentSlide) {
            indicator.classList.add("active");
        } else {
            indicator.classList.remove("active");
        }
    });
}

prevButton.addEventListener("click", () => {
    currentSlide = currentSlide === 0 ? indicators.length - 1 : currentSlide - 1;
    updateSlider();
});

nextButton.addEventListener("click", () => {
    currentSlide = currentSlide === indicators.length - 1 ? 0 : currentSlide + 1;
    updateSlider();
});
const sliderV2 = document.getElementById("slider-v2");
const indicatorsV2 = document.querySelectorAll(".slider-indicator-v2");
const prevButtonV2 = document.getElementById("prev-v2");
const nextButtonV2 = document.getElementById("next-v2");

let currentSlideV2 = 0;

function updateSliderV2() {
    sliderV2.style.transform = `translateX(-${currentSlideV2 * 100}%)`;
    updateIndicatorsV2();
}

function updateIndicatorsV2() {
    indicatorsV2.forEach((indicator, index) => {
        if (index === currentSlideV2) {
            indicator.classList.add("active");
        } else {
            indicator.classList.remove("active");
        }
    });
}

prevButtonV2.addEventListener("click", () => {
    currentSlideV2 = currentSlideV2 === 0 ? indicatorsV2.length - 1 : currentSlideV2 - 1;
    updateSliderV2();
});

nextButtonV2.addEventListener("click", () => {
    currentSlideV2 = currentSlideV2 === indicatorsV2.length - 1 ? 0 : currentSlideV2 + 1;
    updateSliderV2();
});   