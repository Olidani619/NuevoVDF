<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2) {
    include('../conexion.php');
    $id = $_SESSION['id'];
    $ident = $_SESSION['ident'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../fontawesome-free-6.7.2-web/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Registro de Creyentes</title>
</head>
<body>
    <div class="container">
         <header>
            <h1>Ministerio Apostólico y Profético "Visión de Familia"</h1>
            <p>Ministerio de Registro y Seguimiento</p>
        </header>

        <nav class="navbar">
            <ul>
                <li><a href="principal.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="#logout" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
            </ul>
        </nav>

        <main>

                <div class="quick-actions">
                <a href="registro_personal.php" class="quick-action">
                    <i class="fas fa-user-plus"></i>
                    Nuevo Miembro
                </a>

                <a href="seguimiento.php" class="quick-action">
                    <i class="fas fa-chart-line"></i>
                    Seguimiento
                </a>

                <a href="exportacion.php" class="quick-action">
                    <i class="fas fa-file-export"></i>
                    Exportar Datos
                </a>
                
                <a href="peticiones.php" class="quick-action">
                    <i class="fas fa-pray"></i>
                    Peticiones
                </a>
                
                <a href="ministerio.php" class="quick-action">
                    <i class="fas fa-hands-praying"></i>
                    Ministerios
                </a>
                
                <a href="hcm.php" class="quick-action">
                       <i class="fas fa-home"></i>
                    HCM
                </a>
            </div>
            <br>
            <h2>Registro de Creyentes</h2>
            
            <div class="form-options">
                <button type="submit" name="nuevo" form="nuevo-form">
                    <i class="fas fa-user-plus"></i> Nuevo
                </button>
                <button type="submit" name="consolidado" form="consolidado-form">
                    <i class="fas fa-user-check"></i> Consolidado
                </button>
            </div>
            
            <form id="nuevo-form" action="registro_personal.php" method="post"></form>
            <form id="consolidado-form" action="registro_personal.php" method="post"></form>

            <?php if (isset($_POST['nuevo'])): ?>
                <?php $queryhcm = mysqli_query($conn,"SELECT * FROM hcm"); ?>
                <?php $comprobacion_hcm = mysqli_num_rows($queryhcm); ?>
                
                <div class="form-container">
                    <h2>Nuevo Creyente</h2>
                    <form id="simpleForm" action="Nuevo.php" method="POST" autocomplete="off">
                        <div class="slider">
                            <!-- Paso 1 -->
                            <div class="slide active">
                                <div class="form-group">
                                    <label for="txtnombre">Nombres</label>
                                    <input class="input-style letters-only" type="text" id="txtnombre" name="txtnombreN" minlength="3" maxlength="15" class="letters-only" required />
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtapellido">Apellidos</label>
                                    <input class="input-style letters-only" type="text" id="txtapellido" name="txtapellido" minlength="3" maxlength="15" class="letters-only" required />
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtcedula">Cédula</label>
                                    <input class="input-style numbers-only" type="text" id="txtcedula" name="txtcedula" minlength="7" maxlength="8" class="numbers-only" required />
                                </div>
                                
                                <div class="form-group">
                                    <label>Género</label><br>
                                    <div class="radio-group">
                                        <div class="radio-option">
                                            <input class="input-style" type="radio" id="genero-m" name="txtsexo" value="M" required>
                                            <label for="genero-m">Masculino</label>
                                        </div>
                                        <div class="radio-option">
                                            <input class="input-style" type="radio" id="genero-f" name="txtsexo" value="F">
                                            <label for="genero-f">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Paso 2 -->
                            <div class="slide">
                                <div class="form-group">
                                    <label for="txtedad">Fecha de nacimiento</label>
                                    <input class="input-style" type="date" id="txtedad" name="txtedad" max="<?php echo date('Y-m-d'); ?>" required />
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtfecha">Fecha de registro</label>
                                    <input class="input-style" type="date" id="txtfecha" name="txtfecha" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="txttelefono">Teléfono</label>
                                    <input class="input-style" type="tel" id="txttelefono" name="txttelefono" minlength="11" maxlength="11" class="numbers-only" required />
                                </div>
                                
                                <div class="form-group">
                                   <label for="ocupaciones">Ocupación</label>
<select id="ocupaciones" name="ocupaciones" required>
  <option value="">-- Seleccione una ocupación --</option>
  <option value="Otros">Otros</option>
  <option value="Actores/Actrices">Actores/Actrices</option>
  <option value="Agente de ventas">Agente de ventas</option>
  <option value="Albañil">Albañil</option>
  <option value="Alfombrista">Alfombrista</option>
  <option value="Almacenista">Almacenista</option>
  <option value="Ama de casa/Amo de casa">Ama de casa/Amo de casa</option>
  <option value="Animador/a de eventos">Animador/a de eventos</option>
  <option value="Asistente personal">Asistente personal</option>
  <option value="Ayudante general">Ayudante general</option>
  <option value="Barnizador">Barnizador</option>
  <option value="Barman">Barman</option>
  <option value="Barista">Barista</option>
  <option value="Bombero">Bombero</option>
  <option value="Buzo">Buzo</option>
  <option value="Cajero/a">Cajero/a</option>
  <option value="Carpintero">Carpintero</option>
  <option value="Cazador/a">Cazador/a</option>
  <option value="Cerrajero">Cerrajero</option>
  <option value="Chapista">Chapista</option>
  <option value="Cocinero/a">Cocinero/a</option>
  <option value="Conductor/a">Conductor/a</option>
  <option value="Conductor de autobús">Conductor de autobús</option>
  <option value="Conductor de camión">Conductor de camión</option>
  <option value="Conductor de Uber/Didi">Conductor de Uber/Didi</option>
  <option value="Conserje">Conserje</option>
  <option value="Consultor/a (en general)">Consultor/a (en general)</option>
  <option value="Corrector/a de estilo">Corrector/a de estilo</option>
  <option value="Cristalero">Cristalero</option>
  <option value="Cuidador/a de ancianos">Cuidador/a de ancianos</option>
  <option value="Decorador">Decorador</option>
  <option value="Despachador">Despachador</option>
  <option value="Diseñador/a gráfico (en general)">Diseñador/a gráfico (en general)</option>
  <option value="Editor/a de textos (en general)">Editor/a de textos (en general)</option>
  <option value="Electricista">Electricista</option>
  <option value="Empacador/a">Empacador/a</option>
  <option value="Empapelador">Empapelador</option>
  <option value="Encuadernador">Encuadernador</option>
  <option value="Encuestador/a">Encuestador/a</option>
  <option value="Escritor/a (en general)">Escritor/a (en general)</option>
  <option value="Estudiante">Estudiante</option>
  <option value="Entrenador/a personal">Entrenador/a personal</option>
  <option value="Fresador">Fresador</option>
  <option value="Fontanero">Fontanero</option>
  <option value="Fotógrafo/a (en general)">Fotógrafo/a (en general)</option>
  <option value="Guardia (sin grado)">Guardia (sin grado)</option>
  <option value="Guardia de seguridad">Guardia de seguridad</option>
  <option value="Grabador">Grabador</option>
  <option value="Guía turístico/a">Guía turístico/a</option>
  <option value="Herrero">Herrero</option>
  <option value="Impresor">Impresor</option>
  <option value="Inspector">Inspector</option>
  <option value="Influencer/Creador de contenido">Influencer/Creador de contenido</option>
  <option value="Intérprete">Intérprete</option>
  <option value="Investigador/a de mercado">Investigador/a de mercado</option>
  <option value="Jardinero/a">Jardinero/a</option>
  <option value="Joyero">Joyero</option>
  <option value="Jubilado/a">Jubilado/a</option>
  <option value="Limpiador/a">Limpiador/a</option>
  <option value="Militar (sin grado)">Militar (sin grado)</option>
  <option value="Mensajero">Mensajero</option>
  <option value="Mensajero/a">Mensajero/a</option>
  <option value="Mecánico (en general)">Mecánico (en general)</option>
  <option value="Modelos">Modelos</option>
  <option value="Montacarguista">Montacarguista</option>
  <option value="Montador">Montador</option>
  <option value="Músicos">Músicos</option>
  <option value="Niñero/a">Niñero/a</option>
  <option value="Obrero/a de construcción">Obrero/a de construcción</option>
  <option value="Operador/a de maquinaria">Operador/a de maquinaria</option>
  <option value="Operador de máquinas herramienta">Operador de máquinas herramienta</option>
  <option value="Paseador/a de perros">Paseador/a de perros</option>
  <option value="Pescador/a">Pescador/a</option>
  <option value="Policía (sin grado)">Policía (sin grado)</option>
  <option value="Programador/a (en general)">Programador/a (en general)</option>
  <option value="Pulidor">Pulidor</option>
  <option value="Relojero">Relojero</option>
  <option value="Reparador">Reparador</option>
  <option value="Reponedor">Reponedor</option>
  <option value="Representante de atención al cliente">Representante de atención al cliente</option>
  <option value="Repartidor/a">Repartidor/a</option>
  <option value="Rotulista">Rotulista</option>
  <option value="Salvavidas">Salvavidas</option>
  <option value="Sastre">Sastre</option>
  <option value="Seguridad/Vigilante">Seguridad/Vigilante</option>
  <option value="Serigrafista">Serigrafista</option>
  <option value="Soldador">Soldador</option>
  <option value="Socorrista">Socorrista</option>
  <option value="Técnico/a de soporte (sin título específico)">Técnico/a de soporte (sin título específico)</option>
  <option value="Tapicero">Tapicero</option>
  <option value="Teleoperador/a">Teleoperador/a</option>
  <option value="Traductor/a">Traductor/a</option>
  <option value="Transcriptor/a">Transcriptor/a</option>
  <option value="Videógrafo/a (en general)">Videógrafo/a (en general)</option>
  <option value="Vendedor/a ambulante">Vendedor/a ambulante</option>
  <option value="Zapatero">Zapatero</option>
</select>
                                </div>
                            </div>
                            
                            <!-- Paso 3 -->
                            <div class="slide">
                                <div class="form-group">
                                    <label for="profesiones">Profesión</label>
<select id="profesiones" name="profesiones" required>
  <option value="">-- Seleccione una profesión --</option>
  <option value="Otros">Otros</option>
  <option value="Abogado/a">Abogado/a</option>
  <option value="Actor/Actriz (con formación académica específica)">Actor/Actriz (con formación académica específica)</option>
  <option value="Administrado/a de Empresas">Administrador/a de Empresas</option>
  <option value="Agente de Aduanas">Agente de Aduanas</option>
  <option value="Agente de Bienes Raíces (con licencia y formación)">Agente de Bienes Raíces (con licencia y formación)</option>
  <option value="Agente de Seguros (con licencia y formación)">Agente de Seguros (con licencia y formación)</option>
  <option value="Analista de Riesgos">Analista de Riesgos</option>
  <option value="Analista de Sistemas">Analista de Sistemas</option>
  <option value="Analista Financiero/a">Analista Financiero/a</option>
  <option value="Antropólogo/a">Antropólogo/a</option>
  <option value="Arquitecto/a">Arquitecto/a</option>
  <option value="Asesor/a Legal">Asesor/a Legal</option>
  <option value="Auditor/a">Auditor/a</option>
  <option value="Bailarín/a profesional">Bailarín/a profesional</option>
  <option value="Barnizador">Barnizador</option>
  <option value="Biólogo Marino">Biólogo Marino</option>
  <option value="Bibliotecólogo/a">Bibliotecólogo/a</option>
  <option value="Capacitador/a">Capacitador/a</option>
  <option value="Capitán/a de Barco">Capitán/a de Barco</option>
  <option value="Cartógrafo/a">Cartógrafo/a</option>
  <option value="Científico/a (Biólogo, Químico, Físico, Matemático, etc.)">Científico/a (Biólogo, Químico, Físico, Matemático, etc.)</option>
  <option value="Científico/a de Datos">Científico/a de Datos</option>
  <option value="Cónsul">Cónsul</option>
  <option value="Compositor/a">Compositor/a</option>
  <option value="Comunicador/a Social/Periodista">Comunicador/a Social/Periodista</option>
  <option value="Consultor/a de Empresas">Consultor/a de Empresas</option>
  <option value="Coreógrafo/a">Coreógrafo/a</option>
  <option value="Criminalista">Criminalista</option>
  <option value="Criminólogo/a">Criminólogo/a</option>
  <option value="Detective privado/a (con licencia y formación)">Detective privado/a (con licencia y formación)</option>
  <option value="Director/a de Cine">Director/a de Cine</option>
  <option value="Director/a de Orquesta">Director/a de Orquesta</option>
  <option value="Diseñador/a de Iluminación">Diseñador/a de Iluminación</option>
  <option value="Diseñador/a de Interiores">Diseñador/a de Interiores</option>
  <option value="Diseñador/a de Moda">Diseñador/a de Moda</option>
  <option value="Diseñador/a de Sonido">Diseñador/a de Sonido</option>
  <option value="Diseñador/a Gráfico/a (con título)">Diseñador/a Gráfico/a (con título)</option>
  <option value="Desarrollador/a de Software/Programador/a (con título)">Desarrollador/a de Software/Programador/a (con título)</option>
  <option value="Diplomático/a">Diplomático/a</option>
  <option value="Editor/a Audiovisual">Editor/a Audiovisual</option>
  <option value="Editor/a de Libros">Editor/a de Libros</option>
  <option value="Educador/a Social">Educador/a Social</option>
  <option value="Enfermero/a">Enfermero/a</option>
  <option value="Especialista en Inteligencia Artificial">Especialista en Inteligencia Artificial</option>
  <option value="Especialista en Marketing Digital">Especialista en Marketing Digital</option>
  <option value="Especialista en Robótica">Especialista en Robótica</option>
  <option value="Especialista en Seguridad Informática">Especialista en Seguridad Informática</option>
  <option value="Escenógrafo/a">Escenógrafo/a</option>
  <option value="Filósofo/a">Filósofo/a</option>
  <option value="Fiscal">Fiscal</option>
  <option value="Fisioterapeuta">Fisioterapeuta</option>
  <option value="Geólogo/a">Geólogo/a</option>
  <option value="Geógrafo/a">Geógrafo/a</option>
  <option value="Gerente de Proyectos">Gerente de Proyectos</option>
  <option value="Gestor/a Cultural">Gestor/a Cultural</option>
  <option value="Grafólogo/a">Grafólogo/a</option>
  <option value="Guionista">Guionista</option>
  <option value="Historiador/a">Historiador/a</option>
  <option value="Historiador/a del Arte">Historiador/a del Arte</option>
  <option value="Ingeniero/a (Civil, Industrial, Eléctrico, Mecánico, Software, Químico, etc.)">Ingeniero/a (Civil, Industrial, Eléctrico, Mecánico, Software, Químico, etc.)</option>
  <option value="Ingeniero/a Aeronáutico/a">Ingeniero/a Aeronáutico/a</option>
  <option value="Ingeniero/a Agrónomo/a">Ingeniero/a Agrónomo/a</option>
  <option value="Ingeniero/a Ambiental">Ingeniero/a Ambiental</option>
  <option value="Ingeniero/a Biomédico/a">Ingeniero/a Biomédico/a</option>
  <option value="Ingeniero/a de Alimentos">Ingeniero/a de Alimentos</option>
  <option value="Ingeniero/a de Caminos, Canales y Puertos">Ingeniero/a de Caminos, Canales y Puertos</option>
  <option value="Ingeniero/a de Forestal">Ingeniero/a Forestal</option>
  <option value="Ingeniero/a de Minas">Ingeniero/a de Minas</option>
  <option value="Ingeniero/a de Obras Públicas">Ingeniero/a de Obras Públicas</option>
  <option value="Ingeniero/a de Transporte">Ingeniero/a de Transporte</option>
  <option value="Ingeniero/a Electrónico/a">Ingeniero/a Electrónico/a</option>
  <option value="Ingeniero/a Hidráulico/a">Ingeniero/a Hidráulico/a</option>
  <option value="Ingeniero/a en Geodesia">Ingeniero/a en Geodesia</option>
  <option value="Ingeniero/a en Petróleo">Ingeniero/a en Petróleo</option>
  <option value="Ingeniero/a en Telecomunicaciones">Ingeniero/a en Telecomunicaciones</option>
  <option value="Ingeniero/a Mecatrónico/a">Ingeniero/a Mecatrónico/a</option>
  <option value="Ingeniero/a Naval">Ingeniero/a Naval</option>
  <option value="Ingeniero/a Textil">Ingeniero/a Textil</option>
  <option value="Juez/a">Juez/a</option>
  <option value="Logopeda/Fonoaudiólogo/a">Logopeda/Fonoaudiólogo/a</option>
  <option value="Magistrado/a">Magistrado/a</option>
  <option value="Marinero/a mercante (oficial)">Marinero/a mercante (oficial)</option>
  <option value="Maestro/a/Profesor/a (con título)">Maestro/a/Profesor/a (con título)</option>
  <option value="Meteorólogo/a">Meteorólogo/a</option>
  <option value="Mediador/a">Mediador/a</option>
  <option value="Musicólogo/a">Musicólogo/a</option>
  <option value="Museólogo/a">Museólogo/a</option>
  <option value="Negociador/a">Negociador/a</option>
  <option value="Notario/a">Notario/a</option>
  <option value="Nutricionista/Dietista">Nutricionista/Dietista</option>
  <option value="Odontólogo/a">Odontólogo/a</option>
  <option value="Orientador/a Educativo/a">Orientador/a Educativo/a</option>
  <option value="Orientador/a Laboral">Orientador/a Laboral</option>
  <option value="Perito/a">Perito/a</option>
  <option value="Perito/a Calígrafo/a">Perito/a Calígrafo/a</option>
  <option value="Perito/a Tasador/a">Perito/a Tasador/a</option>
  <option value="Perito/a Traductor/a">Perito/a Traductor/a</option>
  <option value="Piloto/a de Avión">Piloto/a de Avión</option>
  <option value="Politólogo/a">Politólogo/a</option>
  <option value="Productor/a Audiovisual">Productor/a Audiovisual</option>
  <option value="Publicista">Publicista</option>
  <option value="Psicólogo/a">Psicólogo/a</option>
  <option value="Registrador/a">Registrador/a</option>
  <option value="Relacionista Público/a">Relacionista Público/a</option>
  <option value="Restaurador/a de Arte">Restaurador/a de Arte</option>
  <option value="Sociólogo/a">Sociólogo/a</option>
  <option value="Técnico/a Superior (en diversas especialidades como Radiología, Laboratorio, etc.)">Técnico/a Superior (en diversas especialidades como Radiología, Laboratorio, etc.)</option>
  <option value="Topógrafo/a">Topógrafo/a</option>
  <option value="Traductor/a Jurado/a">Traductor/a Jurado/a</option>
  <option value="Terapeuta Ocupacional">Terapeuta Ocupacional</option>
  <option value="Urbanista">Urbanista</option>
  <option value="Vestuarista">Vestuarista</option>
</select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="txthcm">HCM</label>
                                    <select id="txthcm" name="txthcm" required>
                                        <option value="">-- Seleccione un HCM --</option>
                                        <?php if ($comprobacion_hcm > 0): ?>
                                            <?php while($mostrar3 = mysqli_fetch_array($queryhcm)): ?>
                                                <option value="<?php echo $mostrar3['id']; ?>"><?php echo $mostrar3['nombre_lugar']; ?></option>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtdireccion">Dirección</label>
                                    <input class="input-style" type="text" id="txtdireccion" name="txtdireccion" minlength="5" maxlength="30" required />
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtinvitado">Invitado por</label>
                                    <input class="input-style letters-only" type="text" id="txtinvitado" name="txtinvitado" minlength="3" maxlength="15" class="letters-only" required />
                                </div>
                            </div>
                        </div>
                        
                        <div class="nav-buttons">
                            <button type="button" id="prevBtn" disabled>
                                <i class="fas fa-chevron-left"></i> Anterior
                            </button>
                            <button type="button" id="nextBtn">
                                Siguiente <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <script>
        // Inicialización
        document.addEventListener('DOMContentLoaded', () => {
            setupSlider();
            setupInputFilters();
        });

                  
                                  // Función para manejar el formulario deslizante
        function setupSlider() {
            const slider = document.querySelector('.slider');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const slides = slider.querySelectorAll('.slide');
            const slidesCount = slides.length;
            let currentIndex = 0;

            function updateSlider() {
                slides.forEach((slide, index) => {
                    if (index === currentIndex) {
                        slide.classList.add('active');
                    } else {
                        slide.classList.remove('active');
                    }
                });
                
                prevBtn.disabled = currentIndex === 0;
                nextBtn.textContent = currentIndex === slidesCount - 1 ? 'Enviar' : 'Siguiente';
            }

            nextBtn.addEventListener('click', () => {
                const currentSlide = slides[currentIndex];
                const inputs = currentSlide.querySelectorAll('input, select');
                let isValid = true;
                
                inputs.forEach(input => {
                    if (!input.checkValidity()) {
                        input.reportValidity();
                        isValid = false;
                    }
                });
                
                if (!isValid) return;
                
                if (currentIndex < slidesCount - 1) {
                    currentIndex++;
                    updateSlider();
                } else {
                    document.getElementById('simpleForm').submit();
                }
            });

            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSlider();
                }
            });

            updateSlider();
        }
        

                

          </script>
            <?php elseif (isset($_POST['consolidado'])): ?>
                <?php 
                unset($_SESSION['Ncedula']);
                unset($_SESSION['ministerio']);
                unset($_SESSION['hcm']);
                $queryministerios = mysqli_query($conn,"SELECT * FROM ministerios");
                $comprobacion_ministerios = mysqli_num_rows($queryministerios);
                $queryhcm = mysqli_query($conn,"SELECT * FROM hcm");
                $comprobacion_hcm = mysqli_num_rows($queryhcm);
                ?>
                
                <div class="form-container">
                    <h2>Consolidado</h2>
                    <form id="simpleForm" action="Consolidado.php" method="post" autocomplete="off">
                        <div class="slider">
                            <!-- Paso 1 -->
                            <div class="slide active">
                                <div class="form-group">
                                    <label for="txtnombre">Nombres</label>
                                    <input class="input-style letters-only" type="text" id="txtnombre" name="txtnombreC" minlength="3" maxlength="15" class="letters-only" required />
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtapellido">Apellidos</label>
                                    <input class="input-style letters-only" type="text" id="txtapellido" name="txtapellido" minlength="3" maxlength="15" class="letters-only" required />
                                </div>
                                
                                <div class="form-group">
                                    <label for="Ncedula">Cédula</label>
                                    <input class="input-style numbers-only" type="text" id="Ncedula" name="Ncedula" minlength="7" maxlength="8" class="numbers-only" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Género</label><br>
                                    <div class="radio-group">
                                        <div class="radio-option">
                                            <input class="input-style" type="radio" id="genero-m" name="txtsexo" value="M" required>
                                            <label for="genero-m">Masculino</label>
                                        </div>
                                        <div class="radio-option">
                                            <input class="input-style" type="radio" id="genero-f" name="txtsexo" value="F">
                                            <label for="genero-f">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Paso 2 -->
                            <div class="slide">
                                <div class="form-group">
                                    <label for="txtedad">Fecha de nacimiento</label>
                                    <input class="input-style" type="date" id="txtedad" name="txtedad" max="<?php echo date('Y-m-d'); ?>" required />
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtfecha">Fecha de registro</label>
                                    <input class="input-style" type="date" id="txtfecha" name="txtfecha" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="txttelefono">Teléfono</label>
                                    <input class="input-style" type="tel" id="txttelefono" name="txttelefono" minlength="11" maxlength="11" class="numbers-only" required />
                                </div>
                                
                                <div class="form-group">
                                            <label for="ocupaciones">Ocupación</label>
<select id="ocupaciones" name="ocupaciones" required>
  <option value="">-- Seleccione una ocupación --</option>
  <option value="Otros">Otros</option>
  <option value="Actores/Actrices">Actores/Actrices</option>
  <option value="Agente de ventas">Agente de ventas</option>
  <option value="Albañil">Albañil</option>
  <option value="Alfombrista">Alfombrista</option>
  <option value="Almacenista">Almacenista</option>
  <option value="Ama de casa/Amo de casa">Ama de casa/Amo de casa</option>
  <option value="Animador/a de eventos">Animador/a de eventos</option>
  <option value="Asistente personal">Asistente personal</option>
  <option value="Ayudante general">Ayudante general</option>
  <option value="Barnizador">Barnizador</option>
  <option value="Barman">Barman</option>
  <option value="Barista">Barista</option>
  <option value="Bombero">Bombero</option>
  <option value="Buzo">Buzo</option>
  <option value="Cajero/a">Cajero/a</option>
  <option value="Carpintero">Carpintero</option>
  <option value="Cazador/a">Cazador/a</option>
  <option value="Cerrajero">Cerrajero</option>
  <option value="Chapista">Chapista</option>
  <option value="Cocinero/a">Cocinero/a</option>
  <option value="Conductor/a">Conductor/a</option>
  <option value="Conductor de autobús">Conductor de autobús</option>
  <option value="Conductor de camión">Conductor de camión</option>
  <option value="Conductor de Uber/Didi">Conductor de Uber/Didi</option>
  <option value="Conserje">Conserje</option>
  <option value="Consultor/a (en general)">Consultor/a (en general)</option>
  <option value="Corrector/a de estilo">Corrector/a de estilo</option>
  <option value="Cristalero">Cristalero</option>
  <option value="Cuidador/a de ancianos">Cuidador/a de ancianos</option>
  <option value="Decorador">Decorador</option>
  <option value="Despachador">Despachador</option>
  <option value="Diseñador/a gráfico (en general)">Diseñador/a gráfico (en general)</option>
  <option value="Editor/a de textos (en general)">Editor/a de textos (en general)</option>
  <option value="Electricista">Electricista</option>
  <option value="Empacador/a">Empacador/a</option>
  <option value="Empapelador">Empapelador</option>
  <option value="Encuadernador">Encuadernador</option>
  <option value="Encuestador/a">Encuestador/a</option>
  <option value="Escritor/a (en general)">Escritor/a (en general)</option>
  <option value="Estudiante">Estudiante</option>
  <option value="Entrenador/a personal">Entrenador/a personal</option>
  <option value="Fresador">Fresador</option>
  <option value="Fontanero">Fontanero</option>
  <option value="Fotógrafo/a (en general)">Fotógrafo/a (en general)</option>
  <option value="Guardia (sin grado)">Guardia (sin grado)</option>
  <option value="Guardia de seguridad">Guardia de seguridad</option>
  <option value="Grabador">Grabador</option>
  <option value="Guía turístico/a">Guía turístico/a</option>
  <option value="Herrero">Herrero</option>
  <option value="Impresor">Impresor</option>
  <option value="Inspector">Inspector</option>
  <option value="Influencer/Creador de contenido">Influencer/Creador de contenido</option>
  <option value="Intérprete">Intérprete</option>
  <option value="Investigador/a de mercado">Investigador/a de mercado</option>
  <option value="Jardinero/a">Jardinero/a</option>
  <option value="Joyero">Joyero</option>
  <option value="Jubilado/a">Jubilado/a</option>
  <option value="Limpiador/a">Limpiador/a</option>
  <option value="Militar (sin grado)">Militar (sin grado)</option>
  <option value="Mensajero">Mensajero</option>
  <option value="Mensajero/a">Mensajero/a</option>
  <option value="Mecánico (en general)">Mecánico (en general)</option>
  <option value="Modelos">Modelos</option>
  <option value="Montacarguista">Montacarguista</option>
  <option value="Montador">Montador</option>
  <option value="Músicos">Músicos</option>
  <option value="Niñero/a">Niñero/a</option>
  <option value="Obrero/a de construcción">Obrero/a de construcción</option>
  <option value="Operador/a de maquinaria">Operador/a de maquinaria</option>
  <option value="Operador de máquinas herramienta">Operador de máquinas herramienta</option>
  <option value="Paseador/a de perros">Paseador/a de perros</option>
  <option value="Pescador/a">Pescador/a</option>
  <option value="Policía (sin grado)">Policía (sin grado)</option>
  <option value="Programador/a (en general)">Programador/a (en general)</option>
  <option value="Pulidor">Pulidor</option>
  <option value="Relojero">Relojero</option>
  <option value="Reparador">Reparador</option>
  <option value="Reponedor">Reponedor</option>
  <option value="Representante de atención al cliente">Representante de atención al cliente</option>
  <option value="Repartidor/a">Repartidor/a</option>
  <option value="Rotulista">Rotulista</option>
  <option value="Salvavidas">Salvavidas</option>
  <option value="Sastre">Sastre</option>
  <option value="Seguridad/Vigilante">Seguridad/Vigilante</option>
  <option value="Serigrafista">Serigrafista</option>
  <option value="Soldador">Soldador</option>
  <option value="Socorrista">Socorrista</option>
  <option value="Técnico/a de soporte (sin título específico)">Técnico/a de soporte (sin título específico)</option>
  <option value="Tapicero">Tapicero</option>
  <option value="Teleoperador/a">Teleoperador/a</option>
  <option value="Traductor/a">Traductor/a</option>
  <option value="Transcriptor/a">Transcriptor/a</option>
  <option value="Videógrafo/a (en general)">Videógrafo/a (en general)</option>
  <option value="Vendedor/a ambulante">Vendedor/a ambulante</option>
  <option value="Zapatero">Zapatero</option>
</select>
                                </div>
                            </div>
                            
                            <!-- Paso 3 -->
                            <div class="slide">
                                <div class="form-group">
                                    <label for="profesiones">Profesión</label>
<select id="profesiones" name="profesiones" required>
  <option value="">-- Seleccione una profesión --</option>
  <option value="Otros">Otros</option>
  <option value="Abogado/a">Abogado/a</option>
  <option value="Actor/Actriz (con formación académica específica)">Actor/Actriz (con formación académica específica)</option>
  <option value="Administrado/a de Empresas">Administrador/a de Empresas</option>
  <option value="Agente de Aduanas">Agente de Aduanas</option>
  <option value="Agente de Bienes Raíces (con licencia y formación)">Agente de Bienes Raíces (con licencia y formación)</option>
  <option value="Agente de Seguros (con licencia y formación)">Agente de Seguros (con licencia y formación)</option>
  <option value="Analista de Riesgos">Analista de Riesgos</option>
  <option value="Analista de Sistemas">Analista de Sistemas</option>
  <option value="Analista Financiero/a">Analista Financiero/a</option>
  <option value="Antropólogo/a">Antropólogo/a</option>
  <option value="Arquitecto/a">Arquitecto/a</option>
  <option value="Asesor/a Legal">Asesor/a Legal</option>
  <option value="Auditor/a">Auditor/a</option>
  <option value="Bailarín/a profesional">Bailarín/a profesional</option>
  <option value="Barnizador">Barnizador</option>
  <option value="Biólogo Marino">Biólogo Marino</option>
  <option value="Bibliotecólogo/a">Bibliotecólogo/a</option>
  <option value="Capacitador/a">Capacitador/a</option>
  <option value="Capitán/a de Barco">Capitán/a de Barco</option>
  <option value="Cartógrafo/a">Cartógrafo/a</option>
  <option value="Científico/a (Biólogo, Químico, Físico, Matemático, etc.)">Científico/a (Biólogo, Químico, Físico, Matemático, etc.)</option>
  <option value="Científico/a de Datos">Científico/a de Datos</option>
  <option value="Cónsul">Cónsul</option>
  <option value="Compositor/a">Compositor/a</option>
  <option value="Comunicador/a Social/Periodista">Comunicador/a Social/Periodista</option>
  <option value="Consultor/a de Empresas">Consultor/a de Empresas</option>
  <option value="Coreógrafo/a">Coreógrafo/a</option>
  <option value="Criminalista">Criminalista</option>
  <option value="Criminólogo/a">Criminólogo/a</option>
  <option value="Detective privado/a (con licencia y formación)">Detective privado/a (con licencia y formación)</option>
  <option value="Director/a de Cine">Director/a de Cine</option>
  <option value="Director/a de Orquesta">Director/a de Orquesta</option>
  <option value="Diseñador/a de Iluminación">Diseñador/a de Iluminación</option>
  <option value="Diseñador/a de Interiores">Diseñador/a de Interiores</option>
  <option value="Diseñador/a de Moda">Diseñador/a de Moda</option>
  <option value="Diseñador/a de Sonido">Diseñador/a de Sonido</option>
  <option value="Diseñador/a Gráfico/a (con título)">Diseñador/a Gráfico/a (con título)</option>
  <option value="Desarrollador/a de Software/Programador/a (con título)">Desarrollador/a de Software/Programador/a (con título)</option>
  <option value="Diplomático/a">Diplomático/a</option>
  <option value="Editor/a Audiovisual">Editor/a Audiovisual</option>
  <option value="Editor/a de Libros">Editor/a de Libros</option>
  <option value="Educador/a Social">Educador/a Social</option>
  <option value="Enfermero/a">Enfermero/a</option>
  <option value="Especialista en Inteligencia Artificial">Especialista en Inteligencia Artificial</option>
  <option value="Especialista en Marketing Digital">Especialista en Marketing Digital</option>
  <option value="Especialista en Robótica">Especialista en Robótica</option>
  <option value="Especialista en Seguridad Informática">Especialista en Seguridad Informática</option>
  <option value="Escenógrafo/a">Escenógrafo/a</option>
  <option value="Filósofo/a">Filósofo/a</option>
  <option value="Fiscal">Fiscal</option>
  <option value="Fisioterapeuta">Fisioterapeuta</option>
  <option value="Geólogo/a">Geólogo/a</option>
  <option value="Geógrafo/a">Geógrafo/a</option>
  <option value="Gerente de Proyectos">Gerente de Proyectos</option>
  <option value="Gestor/a Cultural">Gestor/a Cultural</option>
  <option value="Grafólogo/a">Grafólogo/a</option>
  <option value="Guionista">Guionista</option>
  <option value="Historiador/a">Historiador/a</option>
  <option value="Historiador/a del Arte">Historiador/a del Arte</option>
  <option value="Ingeniero/a (Civil, Industrial, Eléctrico, Mecánico, Software, Químico, etc.)">Ingeniero/a (Civil, Industrial, Eléctrico, Mecánico, Software, Químico, etc.)</option>
  <option value="Ingeniero/a Aeronáutico/a">Ingeniero/a Aeronáutico/a</option>
  <option value="Ingeniero/a Agrónomo/a">Ingeniero/a Agrónomo/a</option>
  <option value="Ingeniero/a Ambiental">Ingeniero/a Ambiental</option>
  <option value="Ingeniero/a Biomédico/a">Ingeniero/a Biomédico/a</option>
  <option value="Ingeniero/a de Alimentos">Ingeniero/a de Alimentos</option>
  <option value="Ingeniero/a de Caminos, Canales y Puertos">Ingeniero/a de Caminos, Canales y Puertos</option>
  <option value="Ingeniero/a de Forestal">Ingeniero/a Forestal</option>
  <option value="Ingeniero/a de Minas">Ingeniero/a de Minas</option>
  <option value="Ingeniero/a de Obras Públicas">Ingeniero/a de Obras Públicas</option>
  <option value="Ingeniero/a de Transporte">Ingeniero/a de Transporte</option>
  <option value="Ingeniero/a Electrónico/a">Ingeniero/a Electrónico/a</option>
  <option value="Ingeniero/a Hidráulico/a">Ingeniero/a Hidráulico/a</option>
  <option value="Ingeniero/a en Geodesia">Ingeniero/a en Geodesia</option>
  <option value="Ingeniero/a en Petróleo">Ingeniero/a en Petróleo</option>
  <option value="Ingeniero/a en Telecomunicaciones">Ingeniero/a en Telecomunicaciones</option>
  <option value="Ingeniero/a Mecatrónico/a">Ingeniero/a Mecatrónico/a</option>
  <option value="Ingeniero/a Naval">Ingeniero/a Naval</option>
  <option value="Ingeniero/a Textil">Ingeniero/a Textil</option>
  <option value="Juez/a">Juez/a</option>
  <option value="Logopeda/Fonoaudiólogo/a">Logopeda/Fonoaudiólogo/a</option>
  <option value="Magistrado/a">Magistrado/a</option>
  <option value="Marinero/a mercante (oficial)">Marinero/a mercante (oficial)</option>
  <option value="Maestro/a/Profesor/a (con título)">Maestro/a/Profesor/a (con título)</option>
  <option value="Meteorólogo/a">Meteorólogo/a</option>
  <option value="Mediador/a">Mediador/a</option>
  <option value="Musicólogo/a">Musicólogo/a</option>
  <option value="Museólogo/a">Museólogo/a</option>
  <option value="Negociador/a">Negociador/a</option>
  <option value="Notario/a">Notario/a</option>
  <option value="Nutricionista/Dietista">Nutricionista/Dietista</option>
  <option value="Odontólogo/a">Odontólogo/a</option>
  <option value="Orientador/a Educativo/a">Orientador/a Educativo/a</option>
  <option value="Orientador/a Laboral">Orientador/a Laboral</option>
  <option value="Perito/a">Perito/a</option>
  <option value="Perito/a Calígrafo/a">Perito/a Calígrafo/a</option>
  <option value="Perito/a Tasador/a">Perito/a Tasador/a</option>
  <option value="Perito/a Traductor/a">Perito/a Traductor/a</option>
  <option value="Piloto/a de Avión">Piloto/a de Avión</option>
  <option value="Politólogo/a">Politólogo/a</option>
  <option value="Productor/a Audiovisual">Productor/a Audiovisual</option>
  <option value="Publicista">Publicista</option>
  <option value="Psicólogo/a">Psicólogo/a</option>
  <option value="Registrador/a">Registrador/a</option>
  <option value="Relacionista Público/a">Relacionista Público/a</option>
  <option value="Restaurador/a de Arte">Restaurador/a de Arte</option>
  <option value="Sociólogo/a">Sociólogo/a</option>
  <option value="Técnico/a Superior (en diversas especialidades como Radiología, Laboratorio, etc.)">Técnico/a Superior (en diversas especialidades como Radiología, Laboratorio, etc.)</option>
  <option value="Topógrafo/a">Topógrafo/a</option>
  <option value="Traductor/a Jurado/a">Traductor/a Jurado/a</option>
  <option value="Terapeuta Ocupacional">Terapeuta Ocupacional</option>
  <option value="Urbanista">Urbanista</option>
  <option value="Vestuarista">Vestuarista</option>
</select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="txthcm">HCM</label>
                                    <select id="txthcm" name="txthcm" required>
                                        <option value="">-- Seleccione un HCM --</option>
                                        <?php if ($comprobacion_hcm > 0): ?>
                                            <?php while($mostrar3 = mysqli_fetch_array($queryhcm)): ?>
                                                <option value="<?php echo $mostrar3['id']; ?>"><?php echo $mostrar3['nombre_lugar']; ?></option>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtministerio">Ministerio</label>
                                    <select id="txtministerio" name="txtministerio[]" multiple required>
                                        <option value="">-- Seleccione un Ministerio --</option>
                                        <?php if ($comprobacion_ministerios > 0): ?>
                                            <?php while($mostrar2 = mysqli_fetch_array($queryministerios)): ?>
                                                <option value="<?php echo $mostrar2['id']; ?>"><?php echo $mostrar2['departamentos']; ?></option>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtdireccion">Dirección</label>
                                    <input class="input-style" type="text" id="txtdireccion" name="txtdireccion" minlength="4" maxlength="30" required />
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtinvitado">Invitado por</label>
                                    <input class="input-style letters-only" type="text" id="txtinvitado" name="txtinvitado" minlength="3" maxlength="15" class="letters-only" required />
                                </div>
                            </div>
                        </div>
                        
                        <div class="nav-buttons">
                            <button type="button" id="prevBtn" disabled>
                                <i class="fas fa-chevron-left"></i> Anterior
                            </button>
                            <button type="button" id="nextBtn">
                                Siguiente <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <script>
                                  // Función para manejar el formulario deslizante
        function setupSlider() {
            const slider = document.querySelector('.slider');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const slides = slider.querySelectorAll('.slide');
            const slidesCount = slides.length;
            let currentIndex = 0;

            function updateSlider() {
                slides.forEach((slide, index) => {
                    if (index === currentIndex) {
                        slide.classList.add('active');
                    } else {
                        slide.classList.remove('active');
                    }
                });
                
                prevBtn.disabled = currentIndex === 0;
                nextBtn.textContent = currentIndex === slidesCount - 1 ? 'Enviar' : 'Siguiente';
            }

            nextBtn.addEventListener('click', () => {
                const currentSlide = slides[currentIndex];
                const inputs = currentSlide.querySelectorAll('input, select');
                let isValid = true;
                
                inputs.forEach(input => {
                    if (!input.checkValidity()) {
                        input.reportValidity();
                        isValid = false;
                    }
                });
                
                if (!isValid) return;
                
                if (currentIndex < slidesCount - 1) {
                    currentIndex++;
                    updateSlider();
                } else {
                    document.getElementById('simpleForm').submit();
                }
            });

            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSlider();
                }
            });

            updateSlider();
        }
        
        // Inicialización
        document.addEventListener('DOMContentLoaded', () => {
            setupSlider();
            setupInputFilters();
        });
                </script>
            <?php endif; ?>
        </main>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> Ingeniería Informática UNELLEZ. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script>


        // Filtros para inputs
        function setupInputFilters() {
            const letterInputs = document.querySelectorAll('.letters-only');
            const numberInputs = document.querySelectorAll('.numbers-only');

            letterInputs.forEach(input => {
                input.addEventListener('input', () => {
                    input.value = input.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, '');
                });
            });

            numberInputs.forEach(input => {
                input.addEventListener('input', () => {
                    input.value = input.value.replace(/[^0-9]/g, '');
                });
            });
        }

        // Logout
        document.getElementById('logout-btn').addEventListener('click', (e) => {
            e.preventDefault();
            if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
                window.location.href = 'cerrar_sesion.php';
            }
        });


    </script>
</body>
</html>
<?php } else {
    header('location: ../index.php');
} ?>
