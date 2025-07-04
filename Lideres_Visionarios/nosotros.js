// Espera a que el DOM esté completamente cargado

/**
 * Carrusel con enfoque en tarjeta central.
 * Inicialmente se centra la tarjeta con índice 1 (la segunda).
 */
document.addEventListener('DOMContentLoaded', () => {
  const carouselInner = document.querySelector('.carousel-inner');
  const carouselItems = document.querySelectorAll('.carousel-item');
  const prevButton = document.querySelector('.carousel-nav.prev');
  const nextButton = document.querySelector('.carousel-nav.next');

  let currentIndex = 1; // Tarjeta centrada al cargar: segunda tarjeta (índice 1)

  const updateCarousel = () => {
    if (!carouselItems[currentIndex]) return;

    const activeItemLeft = carouselItems[currentIndex].offsetLeft;
    const activeItemWidth = carouselItems[currentIndex].offsetWidth;
    const containerWidth = carouselInner.parentElement.offsetWidth;

    const offset = activeItemLeft - (containerWidth / 2) + (activeItemWidth / 2);
    carouselInner.style.transform = `translateX(${-offset}px)`;

    // Activar solo la tarjeta del centro
    carouselItems.forEach((item, index) => {
      item.classList.toggle('active', index === currentIndex);
    });
  };

  const nextSlide = () => {
    currentIndex = (currentIndex + 1) % carouselItems.length;
    updateCarousel();
  };

  const prevSlide = () => {
    currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
    updateCarousel();
  };

  prevButton.addEventListener('click', prevSlide);
  nextButton.addEventListener('click', nextSlide);
  window.addEventListener('resize', updateCarousel);

  // Inicializar
  updateCarousel();
});

const forceRedraw = (el) => {
  el.style.display = 'none';
  el.offsetHeight; // Trigger reflow
  el.style.display = '';
};

// Después de movimiento o scroll:
setTimeout(() => {
  document.querySelectorAll('.pastor-image').forEach(forceRedraw);
}, 300);
