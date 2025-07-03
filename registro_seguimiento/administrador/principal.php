<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 1)
{
include('../conexion.php');
$id = $_SESSION['id'];
$ident =$_SESSION['ident'];

$querynuevo = mysqli_query($conn,"SELECT * FROM nuevos");
$nr = mysqli_num_rows($querynuevo);
$queryconsolidado = mysqli_query($conn,"SELECT * FROM consolidados");
$nr2= mysqli_num_rows($queryconsolidado);
$queryministerio = mysqli_query($conn,"SELECT * FROM ministerios");
$nr3= mysqli_num_rows($queryministerio);
$queryhcm = mysqli_query($conn,"SELECT * FROM hcm");
$nr4= mysqli_num_rows($queryhcm);



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
    <title>Inicio</title>
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
            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-title">Miembros Nuevos</div>
                    <div class="card-value"><?php echo "$nr"; ?> </div>
                    <div class="card-description">Total de miembros Nuevos</div>
                </div>
                
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-title">Miembros Consolidados</div>
                    <div class="card-value"><?php echo "$nr2"; ?></div>
                    <div class="card-description">Total de miembros Consolidados</div>
                </div>
                
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-hands-praying"></i>
                    </div>
                    <div class="card-title">Ministerios Activos</div>
                    <div class="card-value"><?php echo "$nr3"; ?></div>
                    <div class="card-description">Departamentos de la iglesia</div>
                </div>
                
                <div class="card">
                    <div class="card-icon">
                              <i class="fas fa-home"></i>
                    </div>
                    <div class="card-title">HCM</div>
                    <div class="card-value"><?php echo "$nr4"; ?></div>
                    <div class="card-description">HCM Activos</div>
                </div>
            </div>

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