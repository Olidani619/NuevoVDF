<?php
session_start();
include('conexion.php');

$correo = $_POST["txtcorreo"];
$pass 	= $_POST["txtpassword"];

	
				
			


				

			$queryusuario = mysqli_query($conn,"SELECT * FROM users WHERE correo = '$correo'");
			$nr = mysqli_num_rows($queryusuario); 
			$mostrar = mysqli_fetch_array($queryusuario);
			if (isset($mostrar['identificador'])) {
				// code...
			
			if ($mostrar['identificador'] == 1) {
				$location = "administrador\principal.php";
			}

			if ($mostrar['identificador'] == 2) {
				$location = "usuario\principal.php";
			}

			}

			if (($nr == 1) && (password_verify($pass,$mostrar['pass'])) && $mostrar['status'] == 1 )
			{ 
				//Para Mantener activa la sesion
				$sql="SELECT * from users WHERE correo='$correo'";
				$result=mysqli_query($conn,$sql);
				$mostrar = mysqli_fetch_assoc($result);
				$_SESSION['id']= $mostrar['id'];
				$_SESSION['ident']= $mostrar['identificador'];
				header("Location: $location");
			}

			else if ($nr == 1 && $mostrar['status'] == 0) {
				echo "<script> alert('Este usuario todavia no ha sido aprobado por el administrador');window.location= 'index.php' </script>";
			}


			else if (($nr == 1) && (password_verify($pass,$mostrar['pass'])) ) {
				//Para Mantener activa la sesion
				$sql="SELECT * from users WHERE correo='$correo'";
				$result=mysqli_query($conn,$sql);
				$mostrar = mysqli_fetch_assoc($result);
				$_SESSION['id']= $mostrar['id'];
				$_SESSION['ident']= $mostrar['identificador'];
				header("Location: $location");
			}

		elseif ($nr == 0)
		{
			echo "<script> alert('No existe ese tipo de usuario');window.location= 'index.php' </script>";
		}
		elseif ($nr == 1)
		{
		echo "<script> alert('contraseña incorrecta');window.location= 'index.php' </script>";
		}



		
?>
