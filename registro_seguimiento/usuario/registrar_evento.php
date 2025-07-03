<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['eventoreg']))
{
include('../conexion.php');
$nombre = $_POST['txtnombre'];
$apellido = $_POST['txtapellido'];
$cedula = $_POST['txtcedula'];
$tipo_peticion = $_POST['peticion'];
$fecha = $_POST['txtfecha'];
$descripcion = $_POST['txtdescripcion'];


$querycomprobador = mysqli_query($conn,"SELECT * FROM eventos WHERE cedula = '$cedula' AND fecha = '$fecha'");
$comprobacion_eventos = mysqli_num_rows($querycomprobador);

if ($comprobacion_eventos == 0) {

		$sqlgrabar = "INSERT INTO eventos(nombre,apellido,cedula,tipo_evento,fecha,descripcion) value ('$nombre','$apellido','$cedula','$tipo_peticion','$fecha','$descripcion')"; // Este comando nos permite guardar las variables en la base de datos

			if (mysqli_query($conn,$sqlgrabar)) {

				echo "<script> alert('Registro exitoso del evento');window.location= 'peticiones.php' </script>";
				}
			else 
					{
						echo "Error: " .$sqlgrabar."<br>".mysqli_errno($conn);
					}


}
else
{
	echo "<script> alert('Por hoy no puede registrar mas eventos de este usuario');window.location= 'peticiones.php' </script>";
}



}

else
{
	header('location: principal.php');
}

?>