document.addEventListener('DOMContentLoaded', () => {
    const carouselInner = document.querySelector('.carousel-inner');
    const carouselItems = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.carousel-nav.prev');
    const nextBtn = document.querySelector('.carousel-nav.next');

    let currentIndex = 0;
    let itemWidth; // This will be calculated dynamically

    // Function to update the item width (card width + total horizontal margin)
    function updateItemWidth() {
        if (carouselItems.length > 0) {
            const itemStyle = getComputedStyle(carouselItems[0]);
            itemWidth = carouselItems[0].offsetWidth +
                        parseFloat(itemStyle.marginLeft) +
                        parseFloat(itemStyle.marginRight);
        } else {
            itemWidth = 0; // No items, no width
        }
    }

    // Function to update the carousel position and active state
    function updateCarousel() {
        updateItemWidth(); // Always update width before positioning

        if (itemWidth === 0) return; // Prevent errors if no items

        const carouselContainer = document.querySelector('.carousel-container');
        if (!carouselContainer) return;

        const containerWidth = carouselContainer.offsetWidth;
        // Calculate the offset to center the active item
        const centerOffset = (containerWidth / 2) - (itemWidth / 2);

        // Calculate the final transform value to position the active item in the center
        const transformValue = centerOffset - (currentIndex * itemWidth);
        carouselInner.style.transform = `translateX(${transformValue}px)`;

        // Update active class for visual emphasis
        carouselItems.forEach((item, index) => {
            if (index === currentIndex) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    }

    // Navigation functions
    function nextSlide() {
        currentIndex = (currentIndex + 1) % carouselItems.length;
        updateCarousel();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
        updateCarousel();
    }

    // Event Listeners for navigation buttons
    if (prevBtn) {
        prevBtn.addEventListener('click', prevSlide);
    }
    if (nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
    }

    // Initial load: Set the first item as active and position the carousel
    updateCarousel();

    // Recalculate and update on window resize
    window.addEventListener('resize', updateCarousel);

    // Optional: Auto-slide (uncomment to enable)
    // setInterval(nextSlide, 5000); // Auto-slides every 5 seconds
});
