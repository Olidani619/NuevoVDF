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

// --- CÓDIGO PARA EL MENÚ MÓVIL ---
document.addEventListener("DOMContentLoaded", () => {
    // Creamos contenedor del menú, si no existe
    let container = document.getElementById('menu-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'menu-container';
        document.body.appendChild(container);
    }

    // Insertamos el menú en el contenedor
    container.innerHTML = `
    <div class="portada-header mobile-menu" style="display:none;">
      <div class="mobile-menu-header">
        <button class="close-mobile-menu" aria-label="Cerrar menú">&times;</button>
      </div>
      <nav class="main-nav">
        <ul>
          <li><a href="main.php"><i class="fas fa-home"></i> Inicio</a></li>
          <li><a href="nosotros.html"><i class="fas fa-users"></i> Nosotros</a></li>
          <li><a href="https://wa.me/584145064924"><i class="fab fa-whatsapp"></i> Contacto</a></li>
          <li><a href="#"><i class="fas fa-user-plus"></i> Registro</a></li>
          <li class="mobile-dropdown">
            <a href="#" id="ministerios-link" class="mobile-dropdown-toggle">
              <i class="fas fa-church"></i> Ministerios <span class="arrow">&#x25BC;</span>
            </a>
            <div class="dropdown-content" id="dropdown-content">
                      <a href="../Alabanza/alabanzayadoracion.html">Adoración</a>
                      <a href="#">Amor y Misericordia</a>
                      <a href="../Diseño y Ambiente/index.html">Diseño y Ambiente</a>
                      <a href="../Danza/index.html">Danza</a>
                      <a href="../Alabanza/Intersecion.html">Intercesión</a>
                      <a href="#">Operaciones</a>
                      <a href="#">Protocolo</a>
                      <a href="../registro_seguimiento/index.php">Registro y Seguimiento</a>
                      <a href="#">UMAV</a>
                      <a href="#">VDF KIDS</a>
                      <a href="../Escuela de la Vision/index.html">Escuela de la Visión</a>
                      <a href="#">Evangelismo</a>
            </div>
          </li>
          
        </ul>
      </nav>
    </div>
    `;

    // --- ESTILOS DINÁMICOS PARA EL MENÚ MÓVIL ---
    if (!document.getElementById('mobile-menu-styles')) {
        const style = document.createElement('style');
        style.id = 'mobile-menu-styles';
        style.innerHTML = `
        .mobile-menu {
            position: fixed !important;
            top: 0; right: 0;
            width: 85vw; max-width: 340px;
            height: 100vh;
            background: #2d0a18;
            color: #fff;
            z-index: 2000;
            box-shadow: -2px 0 16px rgba(0,0,0,0.25);
            animation: slideInMenu .3s;
            display: flex; flex-direction: column;
        }
        @keyframes slideInMenu {
            from { right: -400px; opacity: 0; }
            to { right: 0; opacity: 1; }
        }
        .mobile-menu-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem 1.5rem 1rem 1.5rem;
            border-bottom: 1px solid #fff2;
        }
        .mobile-menu-title {
            font-size: 1.3rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .close-mobile-menu {
            background: none;
            border: none;
            color: #fff;
            font-size: 2rem;
            cursor: pointer;
            transition: color 0.2s;
        }
        .close-mobile-menu:hover { color: #f8d347; }
        .mobile-menu nav.main-nav ul {
            list-style: none;
            padding: 1.5rem 0 0 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .mobile-menu nav.main-nav li {
            margin: 0;
            padding: 0;
        }
        .mobile-menu nav.main-nav a {
            display: flex;
            align-items: center;
            gap: 0.8em;
            color: #fff;
            text-decoration: none;
            font-size: 1.15rem;
            padding: 0.9em 2em;
            border-radius: 6px;
            transition: background 0.2s, color 0.2s;
        }
        .mobile-menu nav.main-nav a:hover,
        .mobile-menu nav.main-nav .mobile-dropdown-toggle.active {
            background: #f8d347;
            color: #2d0a18;
        }
        .mobile-dropdown .arrow {
            margin-left: auto;
            font-size: 1em;
            transition: transform 0.2s;
        }
        .mobile-dropdown.open .arrow {
            transform: rotate(180deg);
        }
        .mobile-dropdown .dropdown-content {
            display: none;
            flex-direction: column;
            background: #3e1430;
            margin: 0.2em 1.5em 0.5em 1.5em;
            border-radius: 5px;
            box-shadow: 0 2px 8px #0002;
            overflow-y: auto;
            max-height: 50vh;
            /* Fix overflow on small screens */
            min-width: 0;
            width: 100%;
        }
        .mobile-dropdown.open .dropdown-content {
            display: flex;
        }
        .mobile-dropdown .dropdown-content a {
            font-size: 1rem;
            color: #fff;
            padding: 0.7em 1.2em;
            border-bottom: 1px solid #fff1;
            transition: background 0.2s, color 0.2s;
        }
        .mobile-dropdown .dropdown-content a:last-child {
            border-bottom: none;
        }
        .mobile-dropdown .dropdown-content a:hover {
            background: #f8d347;
            color: #2d0a18;
        }
        @media (max-width: 400px) {
            .mobile-menu { width: 100vw; max-width: 100vw; }
            .mobile-menu-header { padding: 1rem 1rem 0.7rem 1rem; }
        }
        `;
        document.head.appendChild(style);
    }
    // --- FIN ESTILOS DINÁMICOS ---

    const menu = container.querySelector('.mobile-menu');
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const closeBtn = container.querySelector('.close-mobile-menu');
    const ministeriosLink = container.querySelector('#ministerios-link');
    // const dropdownContent = container.querySelector('#dropdown-content');
    const mobileDropdown = container.querySelector('.mobile-dropdown');

    // Mostrar/Ocultar menú hamburguesa al click
    hamburgerBtn.addEventListener('click', () => {
        menu.style.display = 'flex';
        setTimeout(() => { menu.focus && menu.focus(); }, 10);
    });

    // Cerrar menú con botón X
    closeBtn.addEventListener('click', () => {
        menu.style.display = 'none';
        // Cierra también el dropdown
        mobileDropdown.classList.remove('open');
        ministeriosLink.classList.remove('active');
    });

    // Cerrar menú si se hace click fuera
    document.addEventListener('click', (e) => {
        if (!menu.contains(e.target) && e.target !== hamburgerBtn) {
            menu.style.display = 'none';
            mobileDropdown.classList.remove('open');
            ministeriosLink.classList.remove('active');
        }
    });

    // Mostrar/Ocultar dropdown ministerios al click
    ministeriosLink.addEventListener('click', (e) => {
        e.preventDefault();
        mobileDropdown.classList.toggle('open');
        ministeriosLink.classList.toggle('active');
    });

    // Evitar que el menú se cierre al hacer click dentro
    menu.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    // Cerrar menú con tecla ESC
    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape" && menu.style.display === 'flex') {
            menu.style.display = 'none';
            mobileDropdown.classList.remove('open');
            ministeriosLink.classList.remove('active');
        }
    });
});


// --- CÓDIGO PARA EL DROPDOWN DE MINISTERIOS ---

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

document.addEventListener("DOMContentLoaded", () => {
    // Creamos contenedor del menú, si no existe
    let container = document.getElementById('menu-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'menu-container';
        document.body.appendChild(container);
    }

    // Insertamos el menú en el contenedor
    container.innerHTML = `
    <div class="portada-header" style="display:none; position: fixed; top: 50px; right: 0; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.3); width: 80vw; max-width: 300px; height: 100vh; overflow-y: auto; z-index: 1000; padding: 20px;">
      <div class="links">
        <nav class="main-nav">
          <ul style="list-style:none; padding: 0; margin: 0;">
            <li style="margin-bottom:10px;"><a href="main.php">Inicio</a></li>
            <li style="margin-bottom:10px;"><a href="nosotros.html">Nosotros</a></li>
            <li style="margin-bottom:10px; position: relative;">
              <a href="#" id="ministerios-link" style="cursor:pointer; display: flex; justify-content: space-between; align-items: center;">
                Ministerios <span style="font-size: 0.8em;">&#x25BC;</span>
              </a>
              <div class="dropdown-content" id="dropdown-content" style="display:none; padding-left: 15px; margin-top: 5px;">
                <a href="#">Adoración</a><br/>
                <a href="#">Amor y Misericordia</a><br/>
                <a href="#">Diseño y Ambiente</a><br/>
                <a href="#">Danza</a><br/>
                <a href="#">Intercesión</a><br/>
                <a href="#">Operaciones</a><br/>
                <a href="#">Protocolo</a><br/>
                <a href="#">Registro y Seguimiento</a><br/>
                <a href="#">UMAV</a><br/>
                <a href="#">VDF KIDS</a><br/>
                <a href="#">Escuela de la Visión</a><br/>
                <a href="#">Evangelismo</a>
              </div>
            </li>
            <li style="margin-bottom:10px;"><a href="https://wa.me/584145064924">Contacto</a></li>
            <li><a href="#">Registro</a></li>
          </ul>
        </nav>
      </div>
    </div>
  `;

    const menu = container.querySelector('.portada-header');
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const ministeriosLink = document.getElementById('ministerios-link');
    const dropdownContent = document.getElementById('dropdown-content');

    // Mostrar/Ocultar menú hamburguesa al click
    hamburgerBtn.addEventListener('click', () => {
        if (menu.style.display === 'none' || menu.style.display === '') {
            menu.style.display = 'block';
        } else {
            menu.style.display = 'none';
            dropdownContent.style.display = 'none';
        }
    });

    // Mostrar/Ocultar dropdown ministerios al click
    ministeriosLink.addEventListener('click', (e) => {
        e.preventDefault();
        if (dropdownContent.style.display === 'none' || dropdownContent.style.display === '') {
            dropdownContent.style.display = 'block';
        } else {
            dropdownContent.style.display = 'none';
        }
    });

    // Cerrar menú si se hace click fuera
    document.addEventListener('click', (e) => {
        if (!menu.contains(e.target) && e.target !== hamburgerBtn) {
            menu.style.display = 'none';
            dropdownContent.style.display = 'none';
        }
    });
});
