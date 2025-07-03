<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2)
{
include('../conexion.php');
$id = $_SESSION['id'];
$ident =$_SESSION['ident'];

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../fontawesome-free-6.7.2-web/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Exportación</title>
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
            <section id="content">
                <h2 align="center">Exportación de información</h2>
                <div class="form-options">
                <form action="exportacion.php" method="post">
                <button type="submit" name="nuevo"> <i class="fas fa-user-plus"></i> Nuevo </button>
                </form>
                <form action="exportacion.php" method="post">
                <button type="submit" name="consolidado"> <i class="fas fa-user-check"></i> Consolidado </button>
                </form>
                <form action="exportacion.php" method="post">
                <button type="submit" name="peticiones"> <i class="fas fa-pray"></i> Peticiones </button>
                </form>
                <form action="exportacion.php" method="post">
                <button type="submit" name="eventos"> <i class="fas fa-user-check"></i> Eventos </button>
                </form>
                </div>

                <?php 
                if (isset($_POST['eventos']) || isset($_POST['Emensual'])) {
                 ?>
                <h2 align="center">Eventos</h2>
                <div class="FORMULARIO">
                <form action="generate_pdf.php" target="_blank" method="Post">
                <button type="submit" value="completoE.php" name="btnpdf"><i class="fas fa-clipboard"></i>Forma completa</button>
                </form>
                <form action="exportacion.php" method="post">
                <button type="submit" name="Emensual"> <i class="fas fa-calendar"></i> Por mes </button>
                </form>
                </div>

                 <?php 
                    }
                  ?>

                  <?php 
                  if (isset($_POST['Emensual'])) {

                   ?>
                   <br><br> 
                      <div class="form-container" style="height: 220px;">
                      <form target="_blank" action="generate_pdf.php" method="post">
                        <div class="slider">
                        <div class="slide active">

                        <div class="form-group">       
                        <label for="">Fecha incio</label>
                        <input type="month" id="fecha-inicio" name="fecha-inicio" aria-describedby="fecha-inicio-desc" required>
                        </div>

                        <div class="form-group">
                        <label for="">Fecha final</label>
                        <input type="month" id="fecha-final" name="fecha-final" aria-describedby="fecha-final-desc" required>
                        </div>

                <div class="form-options">
                <button type="submit" value="completoEmes.php" name="btnpdf"> <i class="fas fa-file-pdf"></i>
                Generar</button>
                </div>
                </div>
                </div>
        </form>
        </div>
<script>
  const fechaInicio = document.getElementById('fecha-inicio');
  const fechaFinal = document.getElementById('fecha-final');

  fechaInicio.addEventListener('change', () => {
    if (fechaInicio.value) {
      // Extraer el año de la fecha de inicio
      const year = fechaInicio.value.split('-')[0];
      
      // Establecer el mínimo y máximo como el mismo año
      fechaFinal.min = fechaInicio.value; // Mismo mes como mínimo
      fechaFinal.max = `${year}-12`;      // Diciembre del mismo año como máximo
      
      // Si fechaFinal está fuera del rango, limpiarla
      if (fechaFinal.value && 
          (fechaFinal.value < fechaInicio.value || 
           fechaFinal.value > `${year}-12`)) {
        fechaFinal.value = '';
      }
    } else {
      // Si no hay fecha de inicio, quitar restricciones
      fechaFinal.min = '';
      fechaFinal.max = '';
    }
  });
</script>

                    <?php } ?>


                <?php 
                if (isset($_POST['peticiones']) || isset($_POST['Pmensual'])) {
                
                 ?>

                <h2 align="center">Peticiones</h2>
                <div class="FORMULARIO">
                <form action="generate_pdf.php" target="_blank" method="Post">
                <button type="submit" value="completoP.php" name="btnpdf"><i class="fas fa-clipboard"></i>Forma completa</button>
                </form>
                <form action="exportacion.php" method="post">
                <button type="submit" name="Pmensual"> <i class="fas fa-calendar"></i> Por mes </button>
                </form>
                </div>

                 <?php 

                    }
                  ?>

                  <?php 

                  if (isset($_POST['Pmensual'])) {
                   ?>
                    <br><br> 
                      <div class="form-container" style="height: 220px;">
                      <form target="_blank" action="generate_pdf.php" method="post">
                        <div class="slider">
                        <div class="slide active">

                        <div class="form-group">       
                        <label for="">Fecha incio</label>
                        <input type="month" id="fecha-inicio" name="fecha-inicio" aria-describedby="fecha-inicio-desc" required>
                        </div>

                        <div class="form-group">
                        <label for="">Fecha final</label>
                        <input type="month" id="fecha-final" name="fecha-final" aria-describedby="fecha-final-desc" required>
                        </div>

                <div class="form-options">
                <button type="submit" value="completoPmes.php" name="btnpdf"> <i class="fas fa-file-pdf"></i>
                Generar</button>
                </div>
                </div>
                </div>
        </form>
        </div>
<script>
  const fechaInicio = document.getElementById('fecha-inicio');
  const fechaFinal = document.getElementById('fecha-final');

  fechaInicio.addEventListener('change', () => {
    if (fechaInicio.value) {
      // Extraer el año de la fecha de inicio
      const year = fechaInicio.value.split('-')[0];
      
      // Establecer el mínimo y máximo como el mismo año
      fechaFinal.min = fechaInicio.value; // Mismo mes como mínimo
      fechaFinal.max = `${year}-12`;      // Diciembre del mismo año como máximo
      
      // Si fechaFinal está fuera del rango, limpiarla
      if (fechaFinal.value && 
          (fechaFinal.value < fechaInicio.value || 
           fechaFinal.value > `${year}-12`)) {
        fechaFinal.value = '';
      }
    } else {
      // Si no hay fecha de inicio, quitar restricciones
      fechaFinal.min = '';
      fechaFinal.max = '';
    }
  });
</script>

                   <?php 
                        }

                    ?>

                <?php
                    if (isset($_POST['consolidado']) || isset($_POST['Cmensual']) || isset($_POST['Chcm'])) {
                       ?>
                <h2 align="center">Consolidados</h2>
                <div class="FORMULARIO">
                <form action="generate_pdf.php" target="_blank" method="Post">
                <button type="submit" value="completoC.php" name="btnpdf"><i class="fas fa-clipboard"></i>Forma completa</button>
                </form>
                <form action="exportacion.php" method="post">
                <button type="submit" name="Cmensual"> <i class="fas fa-calendar"></i> Por mes </button>
                </form>
                <form action="exportacion.php" method="post">
                <button name="Chcm"> <i class="fas fa-home"></i> Por HCM </button>
                </form>
                </div>

                     <?php  
                    }

                    if (isset($_POST['Cmensual'])) {
                      ?> 
                      <br><br> 
                      <div class="form-container" style="height: 220px;">
                      <form target="_blank" action="generate_pdf.php" method="post">
                        <div class="slider">
                        <div class="slide active">

                        <div class="form-group">       
                        <label for="">Fecha incio</label>
                        <input type="month" id="fecha-inicio" name="fecha-inicio" aria-describedby="fecha-inicio-desc" required>
                        </div>

                        <div class="form-group">
                        <label for="">Fecha final</label>
                        <input type="month" id="fecha-final" name="fecha-final" aria-describedby="fecha-final-desc" required>
                        </div>

                <div class="form-options">
                <button type="submit" value="completoCmes.php" name="btnpdf"> <i class="fas fa-file-pdf"></i>
                Generar</button>
                </div>
                </div>
                </div>
        </form>
        </div>
<script>
  const fechaInicio = document.getElementById('fecha-inicio');
  const fechaFinal = document.getElementById('fecha-final');

  fechaInicio.addEventListener('change', () => {
    if (fechaInicio.value) {
      // Extraer el año de la fecha de inicio
      const year = fechaInicio.value.split('-')[0];
      
      // Establecer el mínimo y máximo como el mismo año
      fechaFinal.min = fechaInicio.value; // Mismo mes como mínimo
      fechaFinal.max = `${year}-12`;      // Diciembre del mismo año como máximo
      
      // Si fechaFinal está fuera del rango, limpiarla
      if (fechaFinal.value && 
          (fechaFinal.value < fechaInicio.value || 
           fechaFinal.value > `${year}-12`)) {
        fechaFinal.value = '';
      }
    } else {
      // Si no hay fecha de inicio, quitar restricciones
      fechaFinal.min = '';
      fechaFinal.max = '';
    }
  });
</script>
            <?php
                    }
                    if (isset($_POST['Chcm'])) {
             $queryhcm = mysqli_query($conn,"SELECT * FROM hcm");
             $comprobacion_hcm = mysqli_num_rows($queryhcm);
                        ?>
            <br><br>
            <div class="form-container" style="height: 150px;">
            <form action="generate_pdf.php" target="_blank" action="generate_pdf" method="Post">
                <div class="slider">
                    <div class="slide active">
                
                    <div class="form-group">
                    <select name="hcm" id="" required>
                        <option value="">-- Seleccione un HCM --</option>
                         <?php 
             if ($comprobacion_hcm > 0) {
             while($mostrar=mysqli_fetch_array($queryhcm)){
              ?>
              <option value="<?php echo $mostrar['id']; ?>"><?php echo $mostrar['nombre_lugar']; ?></option>
              <?php      
                    }
                  }
           ?>
                    </select>
                </div>
                
            
            <div class="form-options">
            <button  name="btnpdf" value="completoChcm.php"><i class="fas fa-file-pdf"></i>Generar</button>
            </div>
                </div>
            </div>
        </form>
        </div>


                        <?php
                    }


                    if (isset($_POST['nuevo']) || isset($_POST['Nmensual']) || isset($_POST['Nhcm'])) {
                  

                 ?>
                 <h2 align="center">Nuevos</h2>
                <div class="FORMULARIO">
                <form action="generate_pdf.php" target="_blank" method="Post">
                <button type="submit" value="completoN.php" name="btnpdf"> <i class="fas fa-clipboard"></i>Forma completa</button>
                </form>
                <form action="exportacion.php" method="post">
                <button type="submit" name="Nmensual"> <i class="fas fa-calendar"></i> Por mes</button>
                </form>
                <form action="exportacion.php" method="post">
                <button name="Nhcm"> <i class="fas fa-home"></i> Por HCM </button>
                </form>
                </div>

<?php } //________________________________________________________________________ 

    if (isset($_POST['Nmensual'])) {?>
        <br><br>
        <div class="form-container" style="height: 220px;">
        <form target="_blank" action="generate_pdf.php" method="post">
            <div class="slider">
            <div class="slide active">



                        <div class="form-group">
                        <label for="">Fecha incio</label>
                        <input type="month" id="fecha-inicio" name="fecha-inicio" aria-describedby="fecha-inicio-desc" required>
                        </div>


                        <div class="form-group">
                        <label for="">Fecha final</label>
                        <input type="month" id="fecha-final" name="fecha-final" aria-describedby="fecha-final-desc" required>
                        </div>


                <div class="form-options">
                <button type="submit" value="completoNmes.php" name="btnpdf"><i class="fas fa-file-pdf"></i>Generar</button>
                </div>
        </form>
        </div>
<script>
  const fechaInicio = document.getElementById('fecha-inicio');
  const fechaFinal = document.getElementById('fecha-final');

  fechaInicio.addEventListener('change', () => {
    if (fechaInicio.value) {
      // Extraer el año de la fecha de inicio
      const year = fechaInicio.value.split('-')[0];
      
      // Establecer el mínimo y máximo como el mismo año
      fechaFinal.min = fechaInicio.value; // Mismo mes como mínimo
      fechaFinal.max = `${year}-12`;      // Diciembre del mismo año como máximo
      
      // Si fechaFinal está fuera del rango, limpiarla
      if (fechaFinal.value && 
          (fechaFinal.value < fechaInicio.value || 
           fechaFinal.value > `${year}-12`)) {
        fechaFinal.value = '';
      }
    } else {
      // Si no hay fecha de inicio, quitar restricciones
      fechaFinal.min = '';
      fechaFinal.max = '';
    }
  });
</script>
<?php
    }
    if (isset($_POST['Nhcm'])) {
             $queryhcm = mysqli_query($conn,"SELECT * FROM hcm");
             $comprobacion_hcm = mysqli_num_rows($queryhcm);
?>
        <div class="form-container" style="height:150px;">
        <form action="generate_pdf.php" target="_blank" action="generate_pdf" method="Post">
            <div class="slider">
            <div class="slide active">

                <div class="form-group">
                    <label for=""></label>
                    <select name="hcm" id="" required>
                        <option value="">-- Seleccione un HCM --</option>
                         <?php 
             if ($comprobacion_hcm > 0) {
             while($mostrar=mysqli_fetch_array($queryhcm)){
              ?>
              <option value="<?php echo $mostrar['id']; ?>"><?php echo $mostrar['nombre_lugar']; ?></option>
              <?php      
                    }
                  }
           ?>
                    </select>
                </div>
 
            <div class="form-options">
            <button name="btnpdf" value="completoNhcm.php"><i class="fas fa-file-pdf"></i>Generar</button>
            </div>

            </div>
            </div>

        </form>
        </div>

<?php          

    }
?>

            </section>
        </main>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> Ingeniería Informática UNELLEZ. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script>
        const logoutBtn = document.getElementById('logout-btn');
        logoutBtn.addEventListener('click', (e) => {
            e.preventDefault(); // Evita que el enlace se siga
            const confirmLogout = confirm('¿Estás seguro de que deseas cerrar sesión?');
            if (confirmLogout) {
                // Aquí puedes agregar la lógica para cerrar sesión
                alert('Has cerrado sesión.');
                // Redirigir a la página de inicio de sesión
                window.location.href = 'cerrar_sesion.php'; // Cambia esto a la ruta de tu página de inicio de sesión
            }
        });
    </script>
</body>
</html>
<?php }
else
{
    header('location: ../index.php');
}

 ?>