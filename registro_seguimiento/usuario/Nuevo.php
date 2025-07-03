<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['txtnombreN']))
{
include('../conexion.php');
$id = $_SESSION['id'];
$ident =$_SESSION['ident'];
$nombre= $_POST['txtnombreN'];
$apellido= $_POST['txtapellido'];
$edad= $_POST['txtedad'];
$cedula= $_POST['txtcedula'];
$telefono= $_POST['txttelefono'];
$fecha= $_POST['txtfecha'];
$sexo= $_POST['txtsexo'];
$ocupacion= $_POST['ocupaciones'];
$profesion= $_POST['profesiones'];
$hcm= $_POST['txthcm'];
$direccion= $_POST['txtdireccion'];
$invitado= $_POST['txtinvitado'];

	$querycomprobador = mysqli_query($conn,"SELECT * FROM nuevos WHERE cedula = '$cedula'");
	$comprobacion_cedula = mysqli_num_rows($querycomprobador);


	if ($comprobacion_cedula == 0) { //________________________________

		$sqlgrabar = "INSERT INTO nuevos(nombres,apellidos,edad,cedula,telefono,fecha,sexo,ocupacion,profesion,direccion,invitado_por,estatus) value ('$nombre','$apellido','$edad','$cedula','$telefono','$fecha','$sexo','$ocupacion','$profesion','$direccion','$invitado','Activo')"; // Este comando nos permite guardar las variables en la base de datos

			if (mysqli_query($conn,$sqlgrabar)) {

				$queryM= mysqli_query($conn,"SELECT * FROM nuevos WHERE cedula = $cedula");
				$nuevouser=mysqli_fetch_array($queryM);
				$id = $nuevouser['id'];


				$sqlhcm = mysqli_query($conn,"INSERT INTO hcm_asignado_nuevo(id_usuario, id_hcm) VALUES ('$id', '$hcm')");

				echo "<script> alert('Registro exitoso');window.location= 'registro_personal.php' </script>";
				}
			else 
					{
						echo "Error: " .$sqlgrabar."<br>".mysqli_errno($conn);
					}


				}//____________________________ $comprobacion_cedula
				else
				{
					echo "<script> alert('Ya existe un usuario con esa cedula en el sistema');window.location= 'registro_personal.php' </script>";
				}//_____________________________ $comprobacion_cedula
}

else
{
	header('location:registro_personal.php');

}

 ?>