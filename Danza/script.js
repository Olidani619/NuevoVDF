// script.js - Versión integrada y optimizada

document.addEventListener('DOMContentLoaded', function() {
    // ========== ANIMACIONES INICIALES ==========
    const heroH1 = document.querySelector('.hero h1');
    const heroP = document.querySelector('.hero p');

    if (heroH1 && heroP) {
        heroH1.style.opacity = 0;
        heroP.style.opacity = 0;
        heroH1.style.transform = 'translateY(20px)';
        heroP.style.transform = 'translateY(20px)';

        setTimeout(() => {
            heroH1.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
            heroP.style.transition = 'opacity 1s ease-out 0.3s, transform 1s ease-out 0.3s';
            heroH1.style.opacity = 1;
            heroP.style.opacity = 1;
            heroH1.style.transform = 'translateY(0)';
            heroP.style.transform = 'translateY(0)';
        }, 100);
    }

    // ========== SCROLL HEADER ==========
    const header = document.querySelector('.main-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
                header.classList.toggle('more-scroll', window.scrollY > 200);
            } else {
                header.classList.remove('scrolled', 'more-scroll');
            }
        });
    }

    // ========== MENÚ HAMBURGUESA ==========
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mainNav = document.querySelector('.main-nav');
    
    if (hamburgerBtn && mainNav) {
        // Solo inicializar hamburguesa en móvil
        if (window.innerWidth <= 768) {
            hamburgerBtn.style.display = 'block';
            mainNav.style.display = 'none';
        }

        hamburgerBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            this.classList.toggle('active');
            mainNav.classList.toggle('active');
            
            // Actualizar display y contenido del botón
            if (window.innerWidth <= 768) {
                mainNav.style.display = isExpanded ? 'none' : 'block';
            }
            this.innerHTML = this.classList.contains('active') ? '✕' : '&#9776;';
        });

        document.querySelectorAll('.main-nav a').forEach(link => {
            link.addEventListener('click', () => {
                mainNav.classList.remove('active');
                if (hamburgerBtn) {
                    hamburgerBtn.classList.remove('active');
                    hamburgerBtn.setAttribute('aria-expanded', 'false');
                    hamburgerBtn.innerHTML = '&#9776;';
                    if (window.innerWidth <= 768) {
                        mainNav.style.display = 'none';
                    }
                }
            });
        });

        document.addEventListener('click', (e) => {
            if (!mainNav.contains(e.target) && e.target !== hamburgerBtn) {
                mainNav.classList.remove('active');
                if (hamburgerBtn) {
                    hamburgerBtn.classList.remove('active');
                    hamburgerBtn.setAttribute('aria-expanded', 'false');
                    hamburgerBtn.innerHTML = '&#9776;';
                    if (window.innerWidth <= 768) {
                        mainNav.style.display = 'none';
                    }
                }
            }
        });
    }

    // ========== DROPDOWN MINISTERIOS ==========
    // ========== DROPDOWN MINISTERIOS ==========
const ministeriosLink = document.getElementById('ministerios-link');
const dropdownContent = document.getElementById('dropdown-content');
const ministeriosItem = ministeriosLink ? ministeriosLink.closest('li') : null;

if (ministeriosLink && dropdownContent && ministeriosItem) {
    // Desktop (hover)
    if (window.innerWidth > 768) {
        ministeriosItem.addEventListener('mouseenter', () => {
            dropdownContent.style.display = 'block';
        });

        ministeriosItem.addEventListener('mouseleave', () => {
            setTimeout(() => {
                if (!dropdownContent.matches(':hover')) {
                    dropdownContent.style.display = 'none';
                }
            }, 200);
        });

        dropdownContent.addEventListener('mouseleave', () => {
            dropdownContent.style.display = 'none';
        });
    } else {
        // Mobile (click)
        ministeriosLink.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            dropdownContent.style.display = isExpanded ? 'none' : 'block';
            
            // Evitar que el menú principal se cierre
            if (hamburgerBtn && mainNav) {
                hamburgerBtn.classList.add('active');
                hamburgerBtn.setAttribute('aria-expanded', 'true');
                mainNav.classList.add('active');
                mainNav.style.display = 'block';
            }
        });

        // Cerrar dropdown al hacer clic fuera en móvil
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                if (!ministeriosItem.contains(e.target) && 
                    e.target !== hamburgerBtn && 
                    !mainNav.contains(e.target)) {
                    dropdownContent.style.display = 'none';
                    ministeriosLink.setAttribute('aria-expanded', 'false');
                }
            }
        });
    }

    // Manejar cambios de tamaño de pantalla
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            // Resetear estilos para desktop
            dropdownContent.style.display = '';
            ministeriosLink.setAttribute('aria-expanded', 'false');
        } else {
            // Resetear estilos para móvil
            if (!ministeriosLink.getAttribute('aria-expanded') === 'true') {
                dropdownContent.style.display = 'none';
            }
        }
    });
}

    // ========== ANIMACIÓN SECCIONES ==========
    const sections = document.querySelectorAll('section');
    if (sections.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                    entry.target.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        sections.forEach(section => {
            section.style.opacity = 0;
            section.style.transform = 'translateY(50px)';
            observer.observe(section);
        });
    }

    // ========== MODAL DOCTRINAS ==========
    const modal = document.getElementById("doctrinaModal");
    if (modal) {
        const closeBtn = modal.querySelector(".close-modal");
        if (closeBtn) {
            closeBtn.addEventListener("click", () => {
                modal.style.display = "none";
            });
        }

        window.addEventListener("click", (e) => {
            if (e.target === modal) modal.style.display = "none";
        });

        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && modal.style.display === "flex") {
                modal.style.display = "none";
            }
        });

        document.querySelectorAll(".doctrina-card").forEach((card, index) => {
            card.addEventListener("click", () => {
                const doctrinas = {
                    1: { title: "2 Timoteo 3:16-17", description: "Toda la Escritura es inspirada por Dios...", verse: "Reina Valera" },
                    // ... otras doctrinas
                };
                const data = doctrinas[index + 1];
                if (data) {
                    document.getElementById("modal-title").textContent = data.title;
                    document.getElementById("modal-description").textContent = data.description;
                    document.getElementById("modal-verse").textContent = data.verse;
                    modal.style.display = "flex";
                }
            });
        });
    }

    // ========== CARRUSEL ==========
    const track = document.querySelector('.responsables');
    if (track) {
        const carouselSections = document.querySelectorAll('.section');
        if (carouselSections.length > 0) {
            let index = 0;
            setInterval(() => {
                index = (index + 1) % carouselSections.length;
                const sectionWidth = carouselSections[0].offsetWidth + 20;
                track.style.transform = `translateX(-${sectionWidth * index}px)`;
            }, 3000);
        }
    }

    // ========== MODAL DONACIONES ==========
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

// ========== FUNCIONES GLOBALES ==========
function volverInicio() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}