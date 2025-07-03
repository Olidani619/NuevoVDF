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
    <title>HCM</title>
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
                <h2 align="center">HCM</h2>
                <div class="form-options">
                <form action="hcm.php" method="post">
                <button type="submit" name="registrar"> <i class="fas fa-plus"></i> Registrar </button>
                </form>
                <form action="hcm.php" method="post">
                <button type="submit" name="visualizar"> <i class="fas fa-eye"></i> Visualizar </button>
                </form>
            </div>
            <?php
            if (isset($_POST['registrar'])) {

            

             ?>
<br><br>
<div class="form-container">
    <h2>Registro de HCM</h2>
    <form method="post" action="registrar_hcm.php" autocomplete="off">
        <div class="slider">
        <div class="slide active">

      <div class="form-group">
      <label>Nombre del HCM</label>
      <input type="text" pattern="[A-Za-z ]+" title="Solo se permiten letras" name="txthcm" required />
      </div>

      <div class="form-group">
      <label>Cédula</label>
      <input type="text" minlength="7" maxlength="8" name="txtcedula" required />  
      </div>


      <div class="form-group">
      <label>Nombre del responsable</label>
      <input type="text" pattern="[A-Za-z ]+" title="Solo se permiten letras" name="txtresponsable" required /></div>

      <div class="form-group">
      <label for="">Ubicación</label>
      <input type="text" name="txtubicacion" required>
      </div>



    <div class="form-options" >
    <button name="hcmreg" type="submit"> <i class="fas fa-save"></i> Guardar </button>
    </div>
    </div>
    </div>
    </form>
    </div>
    <?php 

    }
     ?>

                 <?php 
                if (isset($_POST['visualizar'])) {
                    $queryhcm = mysqli_query($conn,"SELECT * FROM hcm");
                    $comprobacion_hcm = mysqli_num_rows($queryhcm);
                    if ($comprobacion_hcm > 0) {

                    

             ?>
    <br><br>
    <div class="seguimiento">
    <select id="filterColumn">
    <option value="N°">N°</option>
    <option value="HCM">HCM</option>
    <option value="Cedula">Cedula</option>
    <option value="Responsable">Responsable</option>
    <option value="Ubicación">Ubicación</option>
</select>
<input type="text" id="searchInput" placeholder="Escribe para filtrar...">
    </div>
    <div class="FORMULARIO">
    <form action="hcm_actualizacion.php" method="post" id="formulario">
         <div class="alineado-boton">
        <button value="Eliminar" name="btn-hcm" type="submit" onclick="return confirmarEliminar(event)">    <i class="fas fa-trash"></i>
        Eliminar</button>
        <button value="Editar" name="btn-hcm" type="submit" onclick="return validarSeleccion(event, 'editar')"> <i class="fas fa-edit"></i>
        Editar</button>
    </div>
            <table id="dataTable" aria-label="Tabla de datos">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>HCM</th>
                    <th>Cedula</th>
                    <th>Responsable</th>
                    <th>Ubicación</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i=1; 
                while($mostrar2=mysqli_fetch_array($queryhcm)){

                 ?>
                <tr>
                    <td><?php echo "$i"; ?> <input type="checkbox" name="hcm[]" value="<?php echo $mostrar2['id']; ?>"></td>
                    <td> <?php echo $mostrar2['nombre_lugar']; ?> </td>
                    <td> <?php echo $mostrar2['cedula']; ?> </td>
                    <td> <?php echo $mostrar2['responsable']; ?> </td>
                    <td> <?php echo $mostrar2['ubicacion']; ?> </td>
                </tr>
                <?php 
                $i++;
            } 

            ?>
            </tbody>
            </table>
        </form>
        <script>
function confirmarEliminar(event) {
    const checkboxes = document.querySelectorAll('input[name="hcm[]"]:checked');
    if (checkboxes.length === 0) {
        alert("Por favor, selecciona al menos un ministerio para eliminar.");
        event.preventDefault();
        return false;
    }
    return confirm("¿Estás seguro de que deseas eliminar los elementos seleccionados?");
}

function validarSeleccion(event, accion) {
    const checkboxes = document.querySelectorAll('input[name="hcm[]"]:checked');
    if (checkboxes.length !== 1) {
        alert("Solo puedes seleccionar un ministerio para " + accion + ".");
        event.preventDefault();
        return false;
    }
    return true;
}
</script>
            <?php

                      }
                      else
                      {
                        ?>
                        <h2 align="center">
                            <?php
                        echo "No hay HCM";
                        ?>
                        </h2>
                        <?php
                      }
                      }
                ?>
            
                
            </section>
        </main>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> Ingeniería Informática UNELLEZ. Todos los derechos reservados.</p>
        </footer>
    </div>

<?php if (isset($comprobacion_hcm)) { if ($comprobacion_hcm > 0) {
        // code...
     ?>
    <script>
const searchInput = document.getElementById('searchInput');
const filterColumn = document.getElementById('filterColumn');
const tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];

searchInput.addEventListener('input', function() {
    // Si existe fila "no resultados", eliminarla antes de filtrar
    let existingNoResult = tableBody.querySelector('.no-results');
    if (existingNoResult) {
        existingNoResult.remove();
    }

    const filter = this.value.toLowerCase();
    const selectedColumn = filterColumn.value;
    let visibleCount = 0;

    for (const row of tableBody.rows) {
        // Ignorar filas con clase no-results si las hubiera (ya eliminamos igual arriba)
        if (row.classList.contains('no-results')) continue;

        // Obtener el índice de la columna seleccionada
        const columnIndex = Array.from(filterColumn.options).findIndex(option => option.value === selectedColumn);
        
        // Filtrar solo en la columna seleccionada
        const cellText = row.cells[columnIndex].textContent.toLowerCase(); // +1 porque la primera columna es el índice
        if (cellText.includes(filter)) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    }

    // Si no hay filas visibles, mostrar mensaje
    if (visibleCount === 0) {
        const noResultRow = document.createElement('tr');
        noResultRow.classList.add('no-results');
        noResultRow.innerHTML = `<td colspan="5" style="text-align:center; font-style:italic; color:#555;">No hay resultados</td>`;
        tableBody.appendChild(noResultRow);
    }
});
</script>
<?php } } ?>
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