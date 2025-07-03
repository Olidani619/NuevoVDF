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
    <title>Peticiones</title>
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
                 <h2 align="center">Peticiones y eventos</h2>
                <div class="FORMULARIO">
                <form action="peticiones.php" method="post">
                <button type="submit" name="registrar_p"> <i class="fas fa-plus"></i> Registrar petición       </button>
                </form>
                <form action="peticiones.php" method="post">
                <button type="submit" name="registrar_e"> <i class="fas fa-plus"></i> Registrar evento </button>
                </form>
                <form action="peticiones.php" method="post">
                <button type="submit" name="visualizar_p"> <i class="fas fa-eye"></i> Visualizar peticiones   </button>
                </form>
                <form action="peticiones.php" method="post">
                <button type="submit" name="visualizar_e"> <i class="fas fa-eye"></i> Visualizar eventos      </button>
                </form>
            </div>

            <?php 
            if (isset($_POST['registrar_p'])) {
            
             ?>
<br><br>
<div class="form-container">
    <h2>Registro de petición</h2>
 <form method="post" action="registrar_peticion.php" autocomplete="off"><br>
    <div class="slider">
        <div class="slide active">

     <div class="form-group">
      <label>Nombre</label>
      <input type="text" class="letters-only" minlength="3" maxlength="15" pattern="[A-Za-z ]+" title="Solo se permiten letras" name="txthcm" required />
      </div>

      <div class="form-group">
      <label>Apellido</label>
      <input type="text" class="letters-only" minlength="3" maxlength="15" pattern="[A-Za-z ]+" title="Solo se permiten letras" name="txtapellido" required />
      </div>

    <div class="form-group">
    <label>Cédula</label>
      <input type="text" class="numbers-only" minlength="7" maxlength="8" name="txtcedula" required />  
      </div>

      <div class="form-group">
      <label>Tipo de peticion</label>
      <select name="peticion" required>
          <option value="">-- Seleccione una categoria --</option>
          <option value="Familia">Familia</option>
          <option value="Salud">Salud</option>
      </select>
      </div>

        <div class="form-group">
        <label for="txtfecha">Fecha de registro</label>
      <input type="date" id="txtfecha" name="txtfecha" required>
      </div>

    <div class="form-group">
    <label for="">Descripción</label>
    <input type="text" minlength="4" maxlength="50" name="txtdescripcion" required>
    </div>
    <div class="form-options" >
    <button name="peticionreg" type="submit"> <i class="fas fa-save"></i> Guardar </button>
    

    </div>
    </div>
    </div>  
    </form>
    </div>

             <?php } ?>
            




            <?php 
                        if (isset($_POST['registrar_e'])) {
                // code...
            
             ?>
    <br><br>
    <div class="form-container">
        <h2>Registro de evento</h2>
    <form method="post" action="registrar_evento.php" autocomplete="off">
        <div class="slider">
          <div class="slide active">

      <div class="form-group">
      <label>Nombre</label>
      <input type="text" class="letters-only" minlength="3" maxlength="15" pattern="[A-Za-z ]+" title="Solo se permiten letras" name="txtnombre" required />
      </div>


      <div class="form-group">
      <label>Apellido</label>
      <input type="text" class="letters-only" minlength="3" maxlength="15" pattern="[A-Za-z ]+" title="Solo se permiten letras" name="txtapellido" required />
      </div>

      <div class="form-group">
      <label>Cédula</label>
      <input type="text" class="numbers-only" minlength="7" maxlength="8" name="txtcedula" required /> 
      </div>

      <div class="form-group">
      <label>Tipo de evento</label>
      <select name="peticion" required>
          <option value="">-- Seleccione una categoria --</option>
          <option value="Matrimonios">Matrimonios</option>
          <option value="Bautizos">Bautizos</option>
          <option value="Presentacion de niños">Presentacion de niños</option>
          <option value="Nombramiento">Nombramiento</option>
      </select>
      </div>

      <div class="form-group">
      <label for="txtfecha">Fecha de registro</label>
      <input type="date" id="txtfecha" name="txtfecha" required>
      </div>

      <div class="form-group">
      <label for="">Descripción</label>
      <input type="text" minlength="4" maxlength="50" name="txtdescripcion" required>
      </div>

      <div class="form-options">
      <button name="eventoreg" type="submit"> <i class="fas fa-save"></i> Guardar </button>
      </div>
      </form>

          </div>  
        </div>
        

      

    </div>


<?php } ?>

            <?php 
                        if (isset($_POST['visualizar_p'])) {
              $querypeticiones = mysqli_query($conn,"SELECT * FROM peticiones");
                    $comprobacion_peticiones = mysqli_num_rows($querypeticiones);
                    if ($comprobacion_peticiones > 0) {

                    

             ?>
                
    <h2>Peticiones</h2>
    <div class="seguimiento">
    <select id="filterColumn">
    <option value="N°">N°</option>
    <option value="Nombre">Nombre</option>
    <option value="Apellido">Apellido</option>
    <option value="Cedula">Cédula</option>
    <option value="Fecha">Fecha</option>
    <option value="Tipo de petición">Tipo de petición</option>
    <option value="Descripción">Descripción</option>
</select>
<input type="text" id="searchInput" placeholder="Escribe para filtrar...">
</div>
<div class="FORMULARIO">
    <form action="peticion_actualizacion.php" method="post" id="formulario">
         <div class="alineado-boton">
        <button value="Eliminar" name="btn-peticion" type="submit" onclick="return confirmarEliminar(event)">    <i class="fas fa-trash"></i>
        Eliminar</button>
        <button value="Editar" name="btn-peticion" type="submit" onclick="return validarSeleccion(event, 'editar')"> <i class="fas fa-edit"></i>
        Editar</button>
    </div>
            <table id="dataTable" aria-label="Tabla de datos">
                <thead>
                <tr>
                    <th style="width: 35px;">N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Fecha</th> 
                    <th>Tipo de petición</th>
                    <th>Descripción</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1; 
                while($mostrar2=mysqli_fetch_array($querypeticiones)){

                 ?>
                <tr>
                    <td><?php echo "$i"; ?> <input type="checkbox" name="peticiones[]" value="<?php echo $mostrar2['id']; ?>"></td>
                    <td> <?php echo $mostrar2['nombre']; ?> </td>
                    <td> <?php echo $mostrar2['apellido']; ?> </td>
                    <td> <?php echo $mostrar2['cedula']; ?> </td>
                    <td> <?php echo $mostrar2['fecha']; ?> </td>
                    <td> <?php echo $mostrar2['tipo_peticion']; ?> </td>
                    
                    <td> <?php echo $mostrar2['descripcion']; ?> </td>
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
    const checkboxes = document.querySelectorAll('input[name="peticiones[]"]:checked');
    if (checkboxes.length === 0) {
        alert("Por favor, selecciona al menos una petición para eliminar.");
        event.preventDefault();
        return false;
    }
    return confirm("¿Estás seguro de que deseas eliminar los elementos seleccionados?");
}

function validarSeleccion(event, accion) {
    const checkboxes = document.querySelectorAll('input[name="peticiones[]"]:checked');
    if (checkboxes.length !== 1) {
        alert("Solo puedes seleccionar una petición para " + accion + ".");
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
                        echo "No hay peticiones de creyentes";
                        ?>
                        </h2>
                        <?php
                      }
                ?>
            
                <?php 
            } 
                ?>
           


            <?php 
                        if (isset($_POST['visualizar_e'])) {
            
                    $queryeventos = mysqli_query($conn,"SELECT * FROM eventos");
                    $comprobacion_eventos = mysqli_num_rows($queryeventos);
                    if ($comprobacion_eventos > 0) {

                    

             ?>
                
                <h2>Eventos</h2>
    <div class="seguimiento">
    <select id="filterColumn">
    <option value="N°">N°</option>
    <option value="Nombre">Nombre</option>
    <option value="Apellido">Apellido</option>
    <option value="Cedula">Cédula</option>
    <option value="Fecha">Fecha</option>
    <option value="Tipo de evento">Tipo de evento</option>
    <option value="Descripción">Descripción</option>
</select>
<input type="text" id="searchInput" placeholder="Escribe para filtrar...">
</div>
<div class="FORMULARIO">
    <form action="evento_actualizacion.php" method="post" id="formulario">
         <div class="alineado-boton">
        <button value="Eliminar" name="btn-evento" type="submit" onclick="return confirmarEliminar(event)">    <i class="fas fa-trash"></i>
        Eliminar</button>
        <button value="Editar" name="btn-evento" type="submit" onclick="return validarSeleccion(event, 'editar')"> <i class="fas fa-edit"></i>
        Editar</button>
    </div>
            <table id="dataTable" aria-label="Tabla de datos">
                <thead>
                <tr>
                    <th style="width: 35px;">N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th> 
                    <th>Fecha</th>
                    <th>Tipo de evento</th>
                    <th>Descripción</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1; 
                while($mostrar2=mysqli_fetch_array($queryeventos)){

                 ?>
                <tr>
                    <td><?php echo "$i"; ?> <input type="checkbox" name="evento[]" value="<?php echo $mostrar2['id']; ?>"></td>
                    <td> <?php echo $mostrar2['nombre']; ?> </td>
                    <td> <?php echo $mostrar2['apellido']; ?> </td>
                    <td> <?php echo $mostrar2['cedula']; ?> </td>
                    <td> <?php echo $mostrar2['fecha']; ?> </td>
                    <td> <?php echo $mostrar2['tipo_evento']; ?> </td>
                    <td> <?php echo $mostrar2['descripcion']; ?> </td>
                </tr>
                <?php 
                $i++;
            } 

            ?>
            </tbody>
            </table>
             <script>
function confirmarEliminar(event) {
    const checkboxes = document.querySelectorAll('input[name="evento[]"]:checked');
    if (checkboxes.length === 0) {
        alert("Por favor, selecciona al menos una evento para eliminar.");
        event.preventDefault();
        return false;
    }
    return confirm("¿Estás seguro de que deseas eliminar los elementos seleccionados?");
}

function validarSeleccion(event, accion) {
    const checkboxes = document.querySelectorAll('input[name="evento[]"]:checked');
    if (checkboxes.length !== 1) {
        alert("Solo puedes seleccionar una evento para " + accion + ".");
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
                        echo "No hay eventos de creyentes";
                        ?>
                        </h2>
                        <?php
                      }
                ?>
            
                <?php 
            }

             ?>










            </section>
        </main>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> Ingeniería Informática UNELLEZ. Todos los derechos reservados.</p>
        </footer>
    </div>

<?php if ( isset($comprobacion_peticiones) || isset($comprobacion_eventos)) {
    $z=0;
    if (isset($comprobacion_peticiones)) {
        if ($comprobacion_peticiones > 0) {
            $z=1;
        }
    }
    elseif (isset($comprobacion_eventos)) {
        if ($comprobacion_eventos > 0) {
            $z=1;
            }
    }
    if ($z > 0) {
        
    
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
        noResultRow.innerHTML = `<td colspan="7" style="text-align:center; font-style:italic; color:#555;">No hay resultados</td>`;
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
    <script>
    // Seleccionamos todos los inputs con las clases letters-only y numbers-only
    const letterInputs = document.querySelectorAll('input.letters-only');
    const numberInputs = document.querySelectorAll('input.numbers-only');

    // Filtrado para inputs de letras
    letterInputs.forEach(input => {
        input.addEventListener('input', () => {
            // Permitimos solo letras (mayúsculas, minúsculas), tildes, eñes y espacios
            const filteredValue = input.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, '');
            if (input.value !== filteredValue) {
                input.value = filteredValue;
            }
        });
    });

    // Filtrado para inputs de números
    numberInputs.forEach(input => {
        input.addEventListener('input', () => {
            // Permitimos solo números
            const filteredValue = input.value.replace(/[^0-9]/g, '');
            if (input.value !== filteredValue) {
                input.value = filteredValue;
            }
        });
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