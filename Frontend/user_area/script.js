document.addEventListener('DOMContentLoaded', () => {
    const slider = document.getElementById('slider');
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;
    const nextButton = document.getElementById('nextButton');
  
    let currentIndex = 0;
  
    function updateSlider() {
      slider.style.transform = `translateX(${-currentIndex * 100}%)`;
    }
  
    function nextSlide() {
      if (currentIndex < totalSlides - 4) {
        currentIndex++;
        updateSlider();
      }
    }
  
    nextButton.addEventListener('click', nextSlide);
  
    // Add event listeners for keyboard navigation
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') {
        nextSlide();
      }
    });
  });