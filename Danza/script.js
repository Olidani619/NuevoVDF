document.addEventListener('DOMContentLoaded', function() {
    // Header scroll effect
    const header = document.querySelector('.main-header');
    if (header) {
        window.addEventListener('scroll', function() {
            const shouldAddClass = window.scrollY > 50;
            header.classList.toggle('scrolled', shouldAddClass);
            header.classList.toggle('more-scroll', window.scrollY > 200);
        });
    }

    // Hamburger menu functionality - Modificado
const hamburgerBtn = document.getElementById('hamburger-btn');
const mainNav = document.getElementById('main-nav');

if (hamburgerBtn && mainNav) {
    hamburgerBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', !isExpanded);
        this.classList.toggle('active');
        mainNav.classList.toggle('active');
        this.innerHTML = isExpanded ? '&#9776;' : '✕';
        
        // Habilitar/deshabilitar scroll cuando el menú está abierto
        document.body.style.overflow = !isExpanded ? 'hidden' : '';
    });

    // Close menu when clicking on links except ministerios
    document.querySelectorAll('.main-nav a:not(#ministerios-link)').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                hamburgerBtn.classList.remove('active');
                hamburgerBtn.setAttribute('aria-expanded', 'false');
                hamburgerBtn.innerHTML = '&#9776;';
                mainNav.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!mainNav.contains(e.target) && e.target !== hamburgerBtn) {
            hamburgerBtn.classList.remove('active');
            hamburgerBtn.setAttribute('aria-expanded', 'false');
            hamburgerBtn.innerHTML = '&#9776;';
            mainNav.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
}

    // Ministerios dropdown functionality - Versión corregida
// Dropdown de Ministerios - Versión definitiva
document.addEventListener('DOMContentLoaded', function() {
    const ministeriosLink = document.getElementById('ministerios-link');
    const dropdownContent = document.getElementById('dropdown-content');
    const hamburgerBtn = document.getElementById('hamburger-btn');
    
    if (ministeriosLink && dropdownContent) {
        // Función para cerrar el dropdown
        const closeDropdown = () => {
            dropdownContent.style.maxHeight = '0';
            ministeriosLink.setAttribute('aria-expanded', 'false');
        };
        
        // Función para abrir el dropdown
        const openDropdown = () => {
            dropdownContent.style.maxHeight = dropdownContent.scrollHeight + 'px';
            ministeriosLink.setAttribute('aria-expanded', 'true');
        };
        
        // Comportamiento para móvil
        if (window.innerWidth <= 768) {
            // Inicialmente cerrado
            closeDropdown();
            
            // Al hacer clic en Ministerios
           // Modificación del evento click
ministeriosLink.addEventListener('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    const isExpanded = this.getAttribute('aria-expanded') === 'true';
    const dropdownContent = document.getElementById('dropdown-content');
    
    if (isExpanded) {
        // Cerrar dropdown
        dropdownContent.style.maxHeight = '0';
    } else {
        // Abrir dropdown con scroll
        dropdownContent.style.maxHeight = '60vh'; // 60% del viewport height
        dropdownContent.scrollTop = 0; // Resetear posición del scroll
        
        // Opcional: Asegurar que el dropdown sea visible en pantalla
        setTimeout(() => {
            dropdownContent.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 100);
    }
    
    this.setAttribute('aria-expanded', !isExpanded);
});
            
            // Cerrar al hacer clic fuera
            document.addEventListener('click', function(e) {
                if (!ministeriosLink.contains(e.target) && !dropdownContent.contains(e.target)) {
                    closeDropdown();
                }
            });
        }
        
        // Comportamiento para desktop
        else {
            ministeriosLink.addEventListener('mouseenter', openDropdown);
            
            const dropdownParent = ministeriosLink.closest('.has-dropdown');
            dropdownParent.addEventListener('mouseleave', closeDropdown);
        }
        
        // Manejar cambios de tamaño de pantalla
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                // Restablecer para desktop
                dropdownContent.style.maxHeight = '';
                dropdownContent.style.display = '';
                ministeriosLink.setAttribute('aria-expanded', 'false');
            } else {
                // Asegurarse de que esté cerrado en móvil
                closeDropdown();
            }
        });
    }
});



    // Section animations
    const sections = document.querySelectorAll('section');
    if (sections.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        sections.forEach(section => {
            section.style.opacity = 0;
            section.style.transform = 'translateY(50px)';
            section.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
            observer.observe(section);
        });
    }

    // Donation modal
    const donationModal = document.getElementById('donationModal');
    if (donationModal) {
        window.toggleModal = function() {
            donationModal.style.display = donationModal.style.display === 'block' ? 'none' : 'block';
        };

        window.addEventListener('click', function(event) {
            if (event.target == donationModal) {
                donationModal.style.display = "none";
            }
        });
    }
});

// Scroll to top function
function volverInicio() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
