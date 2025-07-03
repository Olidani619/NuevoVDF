<?php
	if (isset($_POST['btnregistrarx'])) {
			// code...
			
		//Para registrar
			include('conexion.php');

			$correo = $_POST["txtcorreo"];
			$pass 	= $_POST["txtpassword"];
			$usu 	= $_POST["txtnombre"];
			$apellido = $_POST["txtapellido"];
			$cedula = $_POST["txtcedula"];

				$querycorreo 	= mysqli_query($conn,"SELECT * FROM users WHERE correo = '$correo'");
				$querycedula = mysqli_query($conn,"SELECT * FROM users WHERE cedula = '$cedula'");
				$nr = mysqli_num_rows($querycorreo);
				$nr1 = mysqli_num_rows($querycedula);

					if ($nr == 0 && $nr1 == 0)
					{
						$pass_fuerte= password_hash($pass, PASSWORD_BCRYPT);
						$sqlgrabar = "INSERT INTO users(cedula,correo,pass,nombre,apellido,identificador,status) value ('$cedula','$correo','$pass_fuerte','$usu','$apellido','2','0')"; // Este comando nos permite guardar las variables en la base de datos

								if (mysqli_query($conn,$sqlgrabar)) {
									echo "<script> alert('usuario registrado con exito $usu');window.location= 'index.php' </script>";

												}
								else 
									{
										echo "Error: " .$sqlgrabar."<br>".mysqli_errno($conn);
									}

					}
					if ($nr > 0)
					{
						echo "<script> alert('Este correo ya existe en el sistema: $correo');window.location= 'index.php' </script>";
					}
					if ($nr1 > 0) {
						echo "<script> alert('Esta cedula ya existe en el sistema: $cedula');window.location= 'index.php' </script>";
					}
				}

				else
				{
					echo "<script> alert('No existe ese tipo de usuario');window.location= 'index.php' </script>";

				}

				

?>