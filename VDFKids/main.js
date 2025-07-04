const hamburgerBtn = document.getElementById('hamburger-btn');
const mainNav = document.getElementById('main-nav');

// Función para cerrar el menú móvil completamente
function closeMobileMenu() {
    if (window.innerWidth <= 768) {
        hamburgerBtn.classList.remove('active');
        hamburgerBtn.setAttribute('aria-expanded', 'false');
        hamburgerBtn.innerHTML = '&#9776;';
        mainNav.classList.remove('active');
        document.body.style.overflow = '';
    }
}

// Menú hamburguesa
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
            closeMobileMenu();
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!mainNav.contains(e.target) && e.target !== hamburgerBtn) {
            closeMobileMenu();
        }
    });
}

// Dropdown de Ministerios
document.addEventListener('DOMContentLoaded', function() {
    const ministeriosLink = document.getElementById('ministerios-link');
    const dropdownContent = document.getElementById('dropdown-content');
    
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
        const setupMobileBehavior = () => {
            // Eliminar eventos de desktop
            ministeriosLink.removeEventListener('mouseenter', openDropdown);
            const dropdownParent = ministeriosLink.closest('.has-dropdown');
            if (dropdownParent) {
                dropdownParent.removeEventListener('mouseleave', closeDropdown);
            }
            
            // Inicialmente cerrado
            closeDropdown();
            
            // Al hacer clic en Ministerios
            ministeriosLink.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                
                if (isExpanded) {
                    closeDropdown();
                } else {
                    // Abrir dropdown con scroll limitado
                     dropdownContent.style.display = 'block';
                    dropdownContent.style.maxHeight = '60vh';
                    dropdownContent.style.overflowY = 'auto';
                    dropdownContent.scrollTop = 0;
                    ministeriosLink.setAttribute('aria-expanded', 'true');
                    
                    // Asegurar que el dropdown sea visible
                    setTimeout(() => {
                        dropdownContent.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                }
            });
        };
        
        // Comportamiento para desktop
        const setupDesktopBehavior = () => {
            // Eliminar eventos de móvil
            ministeriosLink.removeEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
            });
            
            // Configurar eventos hover
            ministeriosLink.addEventListener('mouseenter', openDropdown);
            
            const dropdownParent = ministeriosLink.closest('.has-dropdown');
            if (dropdownParent) {
                dropdownParent.addEventListener('mouseleave', closeDropdown);
            }
            
            // Resetear estilos
            dropdownContent.style.maxHeight = '';
            dropdownContent.style.overflowY = '';
        };
        
        // Verificar el tamaño inicial
        if (window.innerWidth <= 768) {
            setupMobileBehavior();
        } else {
            setupDesktopBehavior();
        }
        
        // Manejar cambios de tamaño de pantalla
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 768) {
                setupMobileBehavior();
            } else {
                setupDesktopBehavior();
            }
        });
        
        // Cerrar dropdown al hacer clic fuera (solo para móvil)
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                if (!ministeriosLink.contains(e.target) && !dropdownContent.contains(e.target)) {
                    closeDropdown();
                }
            }
        });
    }
});