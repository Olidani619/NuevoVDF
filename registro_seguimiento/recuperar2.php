<?php 
session_start();
 if (isset($_SESSION['id']) && $_SESSION['ident']== 1)
    {
        header("location: estudiantes/principal.php");
    } 
elseif (isset($_SESSION['id']) && $_SESSION['ident']== 2) {
        header("location: docentes/principal.php");
    }
    elseif (isset($_SESSION['id']) && $_SESSION['ident']== 3) {
        header("location: admin/principal.php");
    }

    if (isset($_SESSION['correo']) && isset($_POST['btncodigo'])) {
    include ('conexion.php');
    $codigo = $_POST['codigo'];
    $correo = $_SESSION['correo'];
    $tabla = "users";
                    
                       
                   

        $queryrecepcion   = mysqli_query($conn,"SELECT * FROM $tabla WHERE correo = '$correo' AND codigo = '$codigo'");
        $nr = mysqli_num_rows($queryrecepcion);
        if ($nr > 0) {
            
        



 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Cambio de contraseña</title>
     <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <form id="frmlogin" class="grupo-entradas" method="POST" autocomplete="off" action="recuperar3.php">
            <br><br>
        <b>Introduzca su nueva contraseña</b><br><br>
        <div class="form-group">
        <input type="password"class="cajaentradatexto" name="contraseña" minlength="8" maxlength="10" placeholder="Contraseña" required>
        <label for="Contraseña">Contraseña</label>
        </div><br><br>
        <div style="text-align: center;">
        <button type="submit" class="botonenviar" name="btncontraseña">Enviar</button>
        </div>
    </form>
    </div>
</body>
</html>


 <?php 
 }
         else

         {
            header('Location:index.php');
         }

}

        else

         {
            header('Location:index.php');
         }

  ?>