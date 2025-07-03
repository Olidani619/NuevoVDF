<?php

session_start();
 if (isset($_SESSION['id']) && $_SESSION['ident']== 1)
    {
        header("location: administrador/principal.php");
    } 
elseif (isset($_SESSION['id']) && $_SESSION['ident']== 2) {
        header("location: usuario/principal.php");
    }

    


if (isset($_POST['btnrecuperar']) && empty($_SESSION['correo'])) {
include('conexion.php');

$correo = $_POST['txtcorreo'];
$tabla = "users";

		$queryusuario 	= mysqli_query($conn,"SELECT * FROM $tabla WHERE correo = '$correo'");
		$nr 			= mysqli_num_rows($queryusuario); 
		if ($nr == 1)
		{

			function generarCodigoSeguro($longitud = 10) { // ---------------
		    return bin2hex(random_bytes($longitud / 2));
			} //----------------------------------


		$codigo_seguro = generarCodigoSeguro(10); // Cambia el número para ajustar la longitud

		$querycodigo = mysqli_query($conn,"UPDATE $tabla SET codigo= '$codigo_seguro' WHERE correo ='$correo'");
		$_SESSION['correo'] = $correo;
		header("Location:recuperar1.php");

?>




<?php

		}
		else
		{
			echo "<script> alert('No existe este usuario');window.location= 'index.php' </script>";
		}



	}

	else
	{
		header("location: index.php");
	}

?>

