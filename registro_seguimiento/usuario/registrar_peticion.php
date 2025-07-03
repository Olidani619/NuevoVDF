<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['peticionreg']))
{
include('../conexion.php');
$nombre = $_POST['txtnombre'];
$apellido = $_POST['txtapellido'];
$cedula = $_POST['txtcedula'];
$tipo_peticion = $_POST['peticion'];
$fecha = $_POST['txtfecha'];
$descripcion = $_POST['txtdescripcion'];


$querycomprobador = mysqli_query($conn,"SELECT * FROM peticiones WHERE cedula = '$cedula' AND fecha = '$fecha'");
$comprobacion_peticion = mysqli_num_rows($querycomprobador);

if ($comprobacion_peticion == 0) {

		$sqlgrabar = "INSERT INTO peticiones(nombre,apellido,cedula,tipo_peticion,fecha,descripcion) value ('$nombre','$apellido','$cedula','$tipo_peticion','$fecha','$descripcion')"; // Este comando nos permite guardar las variables en la base de datos

			if (mysqli_query($conn,$sqlgrabar)) {

				echo "<script> alert('Registro exitoso de la petición');window.location= 'peticiones.php' </script>";
				}
			else 
					{
						echo "Error: " .$sqlgrabar."<br>".mysqli_errno($conn);
					}


}
else
{
	echo "<script> alert('Ya existe esta petición en el sistema');window.location= 'peticiones.php' </script>";
}



}

else
{
	header('location: principal.php');
}

?>