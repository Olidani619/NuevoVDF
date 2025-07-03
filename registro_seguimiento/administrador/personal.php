<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 1)
{
include('../conexion.php');
$id = $_SESSION['id'];
$ident =$_SESSION['ident'];
// Verificacion de para crear preguntas de seguridad
$querypregunta = mysqli_query($conn,"SELECT * FROM preguntas_seguridad WHERE id_usuario = '$id' AND id_identificador = '1' ");
$seguridadpg = mysqli_num_rows($querypregunta);
if ($seguridadpg == 0) {
    header("location: seguridad.php");
}

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../fontawesome-free-6.7.2-web/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Personal</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Ministerio Apostólico y Profético "Visión de Familia"</h1>
            <p>Bienvenido administrador</p>
        </header>

        <nav class="navbar">
            <ul>
                <li><a href="principal.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="personal.php"><i class="fas fa-user"></i> Personal</a></li>
                <li><a href="#logout" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
            </ul>
        </nav>

        <main>
            <section id="content">
                <h2>Personal</h2>
                <div class="FORMULARIO">
                <form action="personal.php" method="post">
                <button type="submit" name="nuevo">Sin verificar</button>
                </form>
                <form action="personal.php" method="post">
                <button type="submit" name="consolidado">Verificados</button>
                </form>
                </div>

<?php 

 ?>


    
    <?php 
    if (isset($_POST['nuevo'])) {
        
    ?>
        
    <?php    


        $i=0;
        $ii=1;
                $sql="SELECT * FROM users WHERE status = '0' AND identificador= '2' ORDER BY cedula ASC";
                $result=mysqli_query($conn,$sql);
                $nr = mysqli_num_rows($result);
                if ($nr > 0) {
                
     ?>
     <h1 align="center">Personal por verificar</h1>
     <div class="FORMULARIOS">
     <form action="validacion.php" method="post">
    <table>
        <tr>
            <th>N°</th>
            <th>Cedula</th>
            <th style="width: 300px;">Correo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Comprobacion</th>

        </tr>
        <?php 


                while($mostrar2=mysqli_fetch_array($result)){
                $_SESSION['id_users'][$i] = $mostrar2['id'];


         ?>
        <tr>
            <td><?php echo $ii; ?> </td>
            <td><?php echo $mostrar2['cedula']; ?></td>
            <td><?php echo $mostrar2['correo']; ?></td>
            <td><?php echo $mostrar2['nombre']; ?></td>
            <td><?php echo $mostrar2['apellido']; ?></td>
            <td>Si<input type="radio" value="1"  name="a[<?php echo $i; ?>]" required> 
                No<input type="radio" value="0" name="a[<?php echo $i; ?>]" required>

            </td>
        </tr>
        <?php 
        $i++;
        $ii++;
    } ?>
    </table>
    <div class="form-options">
    <button type="submit" name="btnvalidacion">Enviar</button> <br><br>
    </div>
  </form>
  </div>
  <?php } //-----------------------------------------------------------------
  else { ?>
        <h2>Sin personal por verificar</h2>
    <?php
   }
    }

    ?>


    
    <?php
    if (isset($_POST['consolidado'])) {
        ?>
        
        <?php
    
        $j=1;
                $sql1="SELECT * FROM users WHERE status = '1' AND identificador = '2' ORDER BY cedula ASC";
                $result1=mysqli_query($conn,$sql1);
                $nr1 = mysqli_num_rows($result1);
                if ($nr1 > 0) {



     ?>
<h2>Personal Activo</h2>
<div class="seguimiento">
<select id="filterColumn">
    <option value="N°">N°</option>
    <option value="cedula">Cedula</option>
    <option value="correo">Correo</option>
    <option value="nombre">Nombre</option>
    <option value="apellido">Apellido</option>
</select>
<input type="text" id="searchInput" placeholder="Escribe para filtrar..."><br>
</div>
<div class="FORMULARIO">
<form action="eliminar.php" method="post" id="formulario">
    <div class="alineado-boton">
        <button value="Eliminar" name="btnopcion" type="submit" onclick="return confirmarEliminar(event)">    <i class="fas fa-trash"></i>
        Eliminar</button>
    </div>
    <table id="dataTable" aria-label="Tabla de datos">
        <thead>
        <tr>
            <th>N°</th>
            <th>Cedula</th>
            <th style="width: 300px;">Correo</th>
            <th>Nombre</th>
            <th>Apellido</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            while($mostrar3=mysqli_fetch_array($result1)){
         ?>
        <tr>
            <td><?php echo $j; ?><input type="checkbox" name="users[]" value="<?php echo $mostrar3['id']; ?>"></td>
            <td><?php echo $mostrar3['cedula']; ?></td>
            <td><?php echo $mostrar3['correo']; ?></td>
            <td><?php echo $mostrar3['nombre']; ?></td>
            <td><?php echo $mostrar3['apellido']; ?></td>
        </tr>
    <?php 
    $j++;
        } ?>
        <tbody>
    </table>
    <script>
function confirmarEliminar(event) {
    // Obtener todos los checkboxes con name="users[]"
    const checkboxes = document.querySelectorAll('input[name="users[]"]');
    // Verificar si alguno está seleccionado
    const algunoSeleccionado = Array.from(checkboxes).some(chk => chk.checked);

    if (!algunoSeleccionado) {
        alert("Por favor, selecciona al menos un usuario para eliminar.");
        event.preventDefault(); // Evita que se envíe el formulario
        return false;
    }

    // Opcional: Confirmar la acción de eliminar
    return confirm("¿Estás seguro que deseas eliminar los usuarios seleccionados?");
}
</script>

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
  <?php }
  else
  {?>
    <h2>No hay personal verificado</h2>
    <?php
    
  }
}
  ?>


                
            </section>
        </main>

        <footer>
            <p>&copy; 2025 Ingenieria Informática UNELLEZ. Todos los derechos reservados.</p>
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