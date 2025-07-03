<?php 
session_start();

if(isset($_SESSION['id']) && $_SESSION['ident'] == 1)
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

    else
    {
        $querypregunta = mysqli_query($conn,"SELECT * FROM preguntas_seguridad WHERE id_usuario = '$id' AND id_identificador = '1' ");
        $seguridadpg = mysqli_num_rows($querypregunta);
        
        if ($seguridadpg > 0) {
            header("location: principal.php");
        }
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

            <div class="form-container"> 

            <h1>Preguntas de seguridad</h1><br>
            <h4>Complete los campos con datos y procedado a llevar un registro de ellos</h4>
            <form action="seguridad-recepcion.php" autocomplete="off" method="post">
                    <div class="slider">
                        <div class="slide active">

                <div class="form-group">                            
                <label for="">Primera Pregunta</label>
                <input type="text" name="a[0]" minlength="4" maxlength="15" required>
                </div>

                <div class="form-group">
                <label for="">Primera respuesta</label>
                <input type="text" name="b[0]" minlength="4" maxlength="15" required>
                </div>

                <div class="form-group">
                <label for="">Segunda Pregunta</label>
                <input type="text" name="a[1]" minlength="4" maxlength="15" required>
                </div>

                <div class="form-group">
                <label for="">Segunda respuesta</label>
                <input type="text" name="b[1]" minlength="4" maxlength="15" required>
                </div>

                <div class="form-group">
                <label for="">Tercera Pregunta</label>
                <input type="text" name="a[2]" minlength="4" maxlength="15" required>
                </div>

                <div class="form-group">
                <label for="">Tercera respuesta</label>
                <input type="text" name="b[2]" minlength="4" maxlength="15" required>
                </div>

                <div class="form-group">
                <label for="">Cuarta Pregunta</label>
                <input type="text" name="a[3]" minlength="4" maxlength="15" required>
                </div>

                <div class="form-group">
                <label for="">Cuarta respuesta</label>
                <input type="text" name="b[3]" minlength="4" maxlength="15" required>
                </div>

                <div class="form-options">
                <button type="submit" name="btnseguridad">Enviar</button>
                </div>
            </div>
            </div>
            </form>
        </div>
        </section>
    </main>
    </div>
</body>
</html>

<?php 

}
else
{
    header('location:../index.php');
}

 ?>

