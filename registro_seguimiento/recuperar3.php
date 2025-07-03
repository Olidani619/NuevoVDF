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

    if (isset($_SESSION['correo']) && isset($_POST['btncontraseña'])) {
    include ('conexion.php');
    $pass = $_POST['contraseña'];
    $correo = $_SESSION['correo'];

    $tabla = "users";
                    

     $pass_fuerte= password_hash($pass, PASSWORD_BCRYPT);
     $querycodigo = mysqli_query($conn,"UPDATE $tabla SET pass= '$pass_fuerte' WHERE correo ='$correo'");
     unset($_SESSION['correo']);
     echo "<script> alert('Cambio de contraseña exitoso: $correo');window.location= 'index.php' </script>";

 }

 else
 {
    header('Location:index.php');
 }

?>