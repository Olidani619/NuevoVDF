document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.main-header');
    const headerTitle = document.querySelector('.header-title');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
            
            // Cambiar a color más oscuro con más scroll
            if (window.scrollY > 200) {
                header.classList.add('more-scroll');
            } else {
                header.classList.remove('more-scroll');
            }
        } else {
            header.classList.remove('scrolled');
            header.classList.remove('more-scroll');
        }
    });
    
    // Resto de tu código (carrusel, dropdown, etc.)
});

document.addEventListener('DOMContentLoaded', function() {
    const ministeriosLink = document.getElementById('ministerios-link');
    const dropdownContent = document.getElementById('dropdown-content');
    
    // Mostrar/ocultar al hacer hover
    ministeriosLink.addEventListener('mouseenter', function() {
        dropdownContent.style.display = 'block';
    });
    
    // Ocultar al salir del elemento
    ministeriosLink.addEventListener('mouseleave', function() {
        // Pequeño retraso para permitir mover el ratón al dropdown
        setTimeout(function() {
            if (!dropdownContent.matches(':hover')) {
                dropdownContent.style.display = 'none';
            }
        }, 200);
    });
    
    // Mantener visible si el ratón está en el dropdown
    dropdownContent.addEventListener('mouseenter', function() {
        this.style.display = 'block';
    });
    
    // Ocultar al salir del dropdown
    dropdownContent.addEventListener('mouseleave', function() {
        this.style.display = 'none';
    });
    
    // Para dispositivos táctiles (opcional)
    ministeriosLink.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) { // Solo para móviles
            e.preventDefault();
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
            } else {
                dropdownContent.style.display = 'block';
            }
        }
    });
});

// Efecto parallax ligero solo para desktop
if (window.innerWidth > 768) {
    const cards = document.querySelectorAll('.secciones-card');
    
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const xAxis = (card.offsetWidth / 2 - e.offsetX) / 10;
            const yAxis = (card.offsetHeight / 2 - e.offsetY) / 10;
            card.style.transform = `translateY(-5px) rotateY(${xAxis}deg) rotateX(${yAxis}deg) scale(1.03)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(-5px) scale(1.03)';
        });
    });
}