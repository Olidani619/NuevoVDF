<?php 
session_start();

if(isset($_SESSION['id']) && $_SESSION['ident'] == 1 && isset($_POST['btnvalidacion']))
{
include('../conexion.php');
$id = $_SESSION['id'];
$ident =$_SESSION['ident'];
$queryusuario = mysqli_query($conn,"SELECT * FROM users WHERE id = '$id' AND identificador = '1' ");
    $nr = mysqli_num_rows($queryusuario);

    if ($nr == 0) {
        session_start();// Mantiene la sesion

        session_destroy(); // Cierra la sesion

        header("location: ../index.php"); //Regresa a la pagina index.php
    }

    $queryvalidacion = mysqli_query($conn,"SELECT * FROM preguntas_seguridad WHERE id_usuario = '$id' AND id_identificador = '1' ORDER BY RAND() LIMIT 2 ");
    $i=0;

    $verificacion = $_POST['a'];
    $contador = count($_POST['a']);
    for ($j=0; $j < $contador ; $j++) { 
        $_SESSION['verificacion'][$j] = $verificacion[$j];

    }

 ?>

<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>Asignacion</title>
 </head>
 <body>
<div class="container">
            <main>
            <section id="content">
            
            <div class="form-container" style="height: 300px;">
            <h1>Responda las siguientes preguntas para realizar los cambios</h1>
            <form action="validacion-recepcion.php" method="post" autocomplete="off">
                 <div class="slider">
                <div class="slide active">
                <?php 
                while($mostrar=mysqli_fetch_array($queryvalidacion)){

                
                 ?>
                 <div class="form-group">
                <label for=""><?php echo $mostrar['pregunta'];?></label>
                <input type="text" minlength="4" maxlength="15" name="a[<?php echo $i; ?>]">
                </div>
                <?php 

                $_SESSION['respuesta'][$i]= $mostrar['id'];
                $i++;
                }
                 ?>
                <div class="form-options">
                <button type="submit" name="btnvalidacion">Enviar</button>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
</main>
</body>
</html>

<?php 
}
else
{
    header('location: ../index.php');
}

 ?>