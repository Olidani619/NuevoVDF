<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2)
{
include('../conexion.php');




 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="../fontawesome-free-6.7.2-web/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Seguimiento</title>
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
                <h2 align="center">Seguimiento de creyentes</h2>
                <div class="form-options">
                <form action="seguimiento.php" method="post">
                <button type="submit" name="nuevo"> <i class="fas fa-user-plus"></i> Nuevo </button>
                </form>
                <form action="seguimiento.php" method="post">
                <button type="submit" name="consolidado"> <i class="fas fa-user-check"></i> Consolidado </button>
                </form>
            </div>
            <?php 
                if (isset($_POST['nuevo'])) {
                    $querynuevos = mysqli_query($conn,"SELECT * FROM nuevos");
                    $comprobacion_nuevos = mysqli_num_rows($querynuevos);
                    if ($comprobacion_nuevos > 0) {

                    

             ?>
                
                

             <h2>Nuevos</h2> 
<!-- Select para elegir la columna a filtrar -->
<div class="seguimiento">
<select id="filterColumn">
    <option value="N°">N°</option>
    <option value="nombres">Nombres</option>
    <option value="apellidos">Apellidos</option>
    <option value="edad">Edad</option>
    <option value="cedula">Cédula</option>
    <option value="telefono">Teléfono</option>
    <option value="fecha">Fecha</option>
    <option value="Genero">Género</option>
    <option value="HCM">HCM</option>
    <option value="ocupacion">Ocupación</option>
    <option value="profesion">Profesión</option>
    <option value="direccion">Dirección</option>
    <option value="invitado_por">Invitado por</option>
    <option value="estatus">Estatus</option>
</select>
<input type="text" id="searchInput" placeholder="Escribe para filtrar..."><br>
</div>
<div class="FORMULARIO">
<form action="nuevo_actualizacion.php" method="post" id="formulario">
    <div class="alineado-boton">
        <button value="Eliminar" name="btnopcion" type="submit" onclick="return confirmarEliminar(event)">    <i class="fas fa-trash"></i>
        Eliminar</button>
        <button value="Editar" name="btnopcion" type="submit" onclick="return validarSeleccion(event, 'editar')"> <i class="fas fa-edit"></i>
        Editar</button>
        <button value="Consolidar" name="btnopcion" type="submit" onclick="return validarSeleccion(event, 'consolidar')"> <i class="fas fa-user-check"></i> Consolidar </button>
    </div>
    <table id="dataTable" aria-label="Tabla de datos">
        <thead>
            <tr>
                <th style="width: 45px;">N°</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th style="width: 28px;">Edad</th>
                <th>Cedula</th>
                <th>Teléfono</th>
                <th>Fecha</th>
                <th style="width: 35px;">Genero</th>
                <th>HCM</th>
                <th>Ocupación</th>
                <th>Profesion</th>
                <th>Dirección</th>
                <th>Invitado por</th>
                <th>Estatus</th>     
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1; 
            while($mostrar2=mysqli_fetch_array($querynuevos)){
            ?>
            <tr>
                <td><?php echo "$i"; ?><input type="checkbox" name="nuevo[]" value="<?php echo $mostrar2['id']; ?>" ></td>
                <td><?php echo $mostrar2['nombres']; ?></td>
                <td><?php echo $mostrar2['apellidos']; ?></td>
                <td>

                <?php
                $Actualfecha = date('Y-m-d');
                $fechaRef = new DateTime($Actualfecha);
                // Supongamos que $mostrar2['edad'] contiene la fecha de nacimiento
                $fechaNac = new DateTime($mostrar2['edad']); // Asegúrate de que este campo contenga una fecha válida
                // Calcular la diferencia
                $diferencia = $fechaRef->diff($fechaNac);
                // Mostrar la edad
                echo $diferencia->y; 
                ?>
                    


                </td>
                <td><?php echo $mostrar2['cedula']; ?></td>
                <td><?php echo $mostrar2['telefono']; ?></td>
                <td><?php echo $mostrar2['fecha']; ?></td>
                <td><?php echo $mostrar2['sexo']; ?></td>
                <td>
                    <?php
                    //query que trae los datos con otras tablas a traves de los inner join on esto es para los ministerios
                    $queryhcm = mysqli_query($conn,"SELECT * FROM nuevos INNER JOIN hcm_asignado_nuevo ON nuevos.id= hcm_asignado_nuevo.id_usuario INNER JOIN hcm ON hcm.id = hcm_asignado_nuevo.id_hcm  WHERE nuevos.id= {$mostrar2['id']}");
                    while($mostrar4=mysqli_fetch_array($queryhcm)){
                        echo $mostrar4['nombre_lugar']."<br>"; 
                    }
                    ?>
                </td>
                <td><?php echo $mostrar2['ocupacion']; ?></td>
                <td><?php echo $mostrar2['profesion']; ?></td>
                <td><?php echo $mostrar2['direccion']; ?></td>
                <td><?php echo $mostrar2['invitado_por']; ?></td>
                <td><?php echo $mostrar2['estatus']; ?></td>
            </tr>
            <?php 
                $i++;
            } 
            ?>
        </tbody>
    </table>
</form>

</div>
<script>
function confirmarEliminar(event) {
    const checkboxes = document.querySelectorAll('input[name="nuevo[]"]:checked');
    if (checkboxes.length === 0) {
        alert("Por favor, selecciona al menos un checkbox para eliminar.");
        event.preventDefault();
        return false;
    }
    return confirm("¿Estás seguro de que deseas eliminar los elementos seleccionados?");
}

function validarSeleccion(event, accion) {
    const checkboxes = document.querySelectorAll('input[name="nuevo[]"]:checked');
    if (checkboxes.length !== 1) {
        alert("Solo puedes seleccionar una persona para " + accion + ".");
        event.preventDefault();
        return false;
    }
    return true;
}
</script>


<?php
    } else {
        echo "<h2 align='center'>No hay registro de creyentes</h2>";
    }
} 

            if (isset($_POST['consolidado'])) {
                $queryconsolidados = mysqli_query($conn,"SELECT * FROM consolidados");
                $comprobacion_consolidados = mysqli_num_rows($queryconsolidados);
                    if ($comprobacion_consolidados > 0) {

                 ?>
            <h2>Consolidados</h2>
            <!-- Select para elegir la columna a filtrar -->
<div class="seguimiento">
<select id="filterColumn">
    <option value="N°">N°</option>
    <option value="nombres">Nombres</option>
    <option value="apellidos">Apellidos</option>
    <option value="edad">Edad</option>
    <option value="cedula">Cédula</option>
    <option value="telefono">Teléfono</option>
    <option value="fecha">Fecha</option>
    <option value="Genero">Genero</option>
    <option value="ocupacion">Ocupación</option>
    <option value="profesion">Profesión</option>
    <option value="direccion">Dirección</option>
    <option value="ministerio">Ministerio</option>
    <option value="hcm">HCM</option>
    <option value="invitado_por">Invitado por</option>
    <option value="estatus">Estatus</option>
</select>
<input type="text" id="searchInput" placeholder="Escribe para filtrar...">
</div>
<div class="FORMULARIO">
    <form action="consolidado_actualizacion.php" method="post" id="formulario">
         <div class="alineado-boton">
        <button value="Eliminar" name="btnopcion" type="submit" onclick="return confirmarEliminar(event)">    <i class="fas fa-trash"></i>
        Eliminar</button>
        <button value="Editar" name="btnopcion" type="submit" onclick="return validarSeleccion(event, 'editar')"> <i class="fas fa-edit"></i>
        Editar</button>
    </div>
        <table id="dataTable" aria-label="Tabla de datos">
            <thead>
                <tr>
                    <th style="width: 45px;">N°</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th style="width: 25px;">Edad</th>
                    <th>Cedula</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th style="width: 45px;">Genero</th>
                    <th>Ocupación</th>
                    <th>Profesión</th>
                    <th>Dirección</th>
                    <th>Ministerio</th>
                    <th>HCM</th>
                    <th>Invitado por</th>
                    <th>Estatus</th>     
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=1; 
                while($mostrar2=mysqli_fetch_array($queryconsolidados)){
                ?>
                <tr>
                    <td><?php echo "$i"; ?><input type="checkbox" name="consolidado[]" value="<?php echo $mostrar2['id']; ?>"></td>
                    <td><?php echo $mostrar2['nombres']; ?></td>
                    <td><?php echo $mostrar2['apellidos']; ?></td>
                    <td> <?php
                $Actualfecha = date('Y-m-d');
                $fechaRef = new DateTime($Actualfecha);
                // Supongamos que $mostrar2['edad'] contiene la fecha de nacimiento
                $fechaNac = new DateTime($mostrar2['edad']); // Asegúrate de que este campo contenga una fecha válida
                // Calcular la diferencia
                $diferencia = $fechaRef->diff($fechaNac);
                // Mostrar la edad
                echo $diferencia->y; 
                ?></td>
                    <td><?php echo $mostrar2['cedula']; ?></td>
                    <td><?php echo $mostrar2['telefono']; ?></td>
                    <td><?php echo $mostrar2['fecha']; ?></td>
                    <td><?php echo $mostrar2['sexo']; ?></td>
                    <td><?php echo $mostrar2['ocupacion']; ?></td>
                    <td><?php echo $mostrar2['profesion']; ?></td>
                    <td><?php echo $mostrar2['direccion']; ?></td>
                    <td>
                        <?php
                        //query que trae los datos con otras tablas a traves de los inner join on esto es para los ministerios
                        $queryministerio = mysqli_query($conn,"SELECT * FROM consolidados INNER JOIN ministerio_asignado ON consolidados.id= ministerio_asignado.id_usuario INNER JOIN ministerios ON ministerios.id = ministerio_asignado.id_ministerio  WHERE consolidados.id= {$mostrar2['id']}");
                        while($mostrar3=mysqli_fetch_array($queryministerio)){
                            echo $mostrar3['departamentos'].", <br>"; 
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        //query que trae los datos con otras tablas a traves de los inner join on esto es para los ministerios
                        $queryhcm = mysqli_query($conn,"SELECT * FROM consolidados INNER JOIN hcm_asignado_consolidado ON consolidados.id= hcm_asignado_consolidado.id_usuario INNER JOIN hcm ON hcm.id = hcm_asignado_consolidado.id_hcm  WHERE consolidados.id= {$mostrar2['id']}");
                        while($mostrar4=mysqli_fetch_array($queryhcm)){
                            echo $mostrar4['nombre_lugar']."<br>"; 
                        }
                        ?>
                    </td>
                    <td><?php echo $mostrar2['invitado_por']; ?></td>
                    <td><?php echo $mostrar2['estatus']; ?></td>
                </tr>
                <?php 
                $i++;
                }
                ?>
            </tbody>
        </table>
    </form>
</div>

<script>
function confirmarEliminar(event) {
    const checkboxes = document.querySelectorAll('input[name="consolidado[]"]:checked');
    if (checkboxes.length === 0) {
        alert("Por favor, selecciona al menos un checkbox para eliminar.");
        event.preventDefault();
        return false;
    }
    return confirm("¿Estás seguro de que deseas eliminar los elementos seleccionados?");
}

function validarSeleccion(event, accion) {
    const checkboxes = document.querySelectorAll('input[name="consolidado[]"]:checked');
    if (checkboxes.length !== 1) {
        alert("Solo puedes seleccionar un checkbox para " + accion + ".");
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
                        echo "No hay registro de creyentes";
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

 <?php if ( isset($comprobacion_nuevos)) {
    $z=0;

        if ($comprobacion_nuevos > 0) {
            $z=1;
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
        noResultRow.innerHTML = `<td colspan="14" style="text-align:center; font-style:italic; color:#555;">No hay resultados</td>`;
        tableBody.appendChild(noResultRow);
    }
});
</script>
<?php } } ?>

<?php if ( isset($comprobacion_consolidados)) {
    $z=0;
    
        if ($comprobacion_consolidados > 0) {
            $z=1;
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
        noResultRow.innerHTML = `<td colspan="15" style="text-align:center; font-style:italic; color:#555;">No hay resultados</td>`;
        tableBody.appendChild(noResultRow);
    }
});
</script>
<?php } } ?>

</body>
</html>
<?php }
else
{
    header('location: ../index.php');
}

 ?>