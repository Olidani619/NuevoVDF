document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.main-header');
    const headerTitle = document.querySelector('.header-title');

    window.addEventListener('scroll', function () {
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

document.addEventListener('DOMContentLoaded', function () {
    const ministeriosLink = document.getElementById('ministerios-link');
    const dropdownContent = document.getElementById('dropdown-content');

    // Mostrar/ocultar al hacer hover
    ministeriosLink.addEventListener('mouseenter', function () {
        dropdownContent.style.display = 'block';
    });

    // Ocultar al salir del elemento
    ministeriosLink.addEventListener('mouseleave', function () {
        // Pequeño retraso para permitir mover el ratón al dropdown
        setTimeout(function () {
            if (!dropdownContent.matches(':hover')) {
                dropdownContent.style.display = 'none';
            }
        }, 200);
    });

    // Mantener visible si el ratón está en el dropdown
    dropdownContent.addEventListener('mouseenter', function () {
        this.style.display = 'block';
    });

    // Ocultar al salir del dropdown
    dropdownContent.addEventListener('mouseleave', function () {
        this.style.display = 'none';
    });

    // Para dispositivos táctiles (opcional)
    ministeriosLink.addEventListener('click', function (e) {
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

function volverInicio() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

const enlace = document.getElementById("ministerios-link");
const miDiv = document.getElementById("dropdown-content");

// Mostrar el div al hacer clic en el enlace
enlace.addEventListener("click", function (e) {
    e.preventDefault(); // Evita el comportamiento predeterminado del enlace
    miDiv.style.display = "block";
});

// Ocultar el div al hacer clic fuera
document.addEventListener("click", function (e) {
    if (e.target !== miDiv && e.target !== enlace) {
        miDiv.style.display = "none";
    }
});

// Datos de las doctrinas (descripciones extendidas)
const doctrinas = {
    1: {
        title: "2 Timoteo 3:16-17",
        description: "Toda la Escritura es inspirada por Dios, y útil para enseñar, para redargüir, para corregir, para instruir en justicia, a fin de que el hombre de Dios sea perfecto, enteramente preparado para toda buena obra.",
        verse: "Reina Valera Revisión 1960"
    },
    2: {
        title: "1 Juan 5:7",
        description: "Porque tres son los que dan testimonio en el cielo: el Padre, el Verbo y el Espíritu Santo; y estos tres son uno.",
        verse: "Reina Valera Revisión 1960"
    },
    3: {
        title: "Juan 3:16",
        description: "Porque de tal manera amó Dios al mundo, que ha dado a su hijo unigénito, para que todo aquel que en Él cree, no se pierda, mas tenga vida eterna.",
        verse: "Reina Valera Revisión 1960"
    },
    4: {
        title: "Juan 1:12",
        description: "Mas a todos los que le recibieron, a los que creen en su nombre, les dio potestad de ser hechos hijos de Dios.",
        verse: "Reina Valera Revisión 1960"
    },
    5: {
        title: "1 Corintios 12:13",
        description: "Porque por un solo Espíritu fuimos todos bautizados en un cuerpo, sean judíos o griegos, sean esclavos o libres; y a todos se nos dio a beber de un mismo Espíritu.",
        verse: "Reina Valera Revisión 1960"
    },
    6: {
        title: "Romanos 6:4",
        description: "Porque somos sepultados juntamente con él para muerte por el bautismo, a fin de que como Cristo resucitó de los muertos por la gloria del Padre, así también nosotros andemos en vida nueva.",
        verse: "Reina Valera Revisión 1960"
    },
    7: {
        title: "1 Tesalonicenses 4:16-17",
        description: "Porque el Señor mismo con voz de mando, con voz de arcángel, y con trompeta de Dios, descenderá del cielo; y los muertos en Cristo resucitarán primero. Luego nosotros los que vivimos, los que hayamos quedado, seremos arrebatados juntamente con ellos en las nubes para recibir al Señor en el aire, y así estaremos para siempre con el Señor.",
        verse: "Reina Valera Revisión 1960"
    }
};

// Elementos del DOM
const modal = document.getElementById("doctrinaModal");
const modalTitle = document.getElementById("modal-title");
const modalDesc = document.getElementById("modal-description");
const modalVerse = document.getElementById("modal-verse");
const closeBtn = document.querySelector(".close-modal");

// Abrir modal al hacer clic en una tarjeta
document.querySelectorAll(".doctrina-card").forEach((card, index) => {
    card.addEventListener("click", () => {
        const data = doctrinas[index + 1]; // +1 porque el índice empieza en 0
        modalTitle.textContent = data.title;
        modalDesc.textContent = data.description;
        modalVerse.textContent = data.verse;
        modal.style.display = "flex";
    });
});

// Cerrar modal
closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

// Cerrar al hacer clic fuera del contenido
window.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
    }
});

// Cerrar modal con tecla ESC
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modal.style.display === "flex") {
        modal.style.display = "none";
    }
});

function toggleModal() {
    const modal = document.getElementById('donationModal');
    modal.style.display = modal.style.display === 'block' ? 'none' : 'block';
}

// Cerrar modal al hacer clic fuera de él
window.onclick = function (event) {
    const modal = document.getElementById('donationModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


const track = document.querySelector('.responsables');
const sections = document.querySelectorAll('.section');
const visibleCount = 3;
const total = sections.length;
let index = 0;

setInterval(() => {
    index++;
    if (index > total - visibleCount) {
        index = 0;
    }
    const sectionWidth = sections[0].offsetWidth + 20; // 20 = margen horizontal
    const moveX = sectionWidth * index;
    track.style.transform = `translateX(-${moveX}px)`;
}, 3000);

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
