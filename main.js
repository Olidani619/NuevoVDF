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
