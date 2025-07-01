const slides = document.querySelector('.slides');
const dots = document.querySelectorAll('.dot');
const totalSlides = dots.length;

let index = 0;

function showSlide(i) {
    slides.style.transform = `translateX(-${i * 100}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[i].classList.add('active');
};

function nextSlide() {
    index = (index + 1) % totalSlides;
    showSlide(index);
};

setInterval(nextSlide, 6000);

dots.forEach((dots, i) => {
    dots.addEventListener('click', () => {
        index = i;
        showSlide(index);
    });
});