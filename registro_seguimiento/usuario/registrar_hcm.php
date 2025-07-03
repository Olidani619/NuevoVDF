<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['hcmreg']))
{
include('../conexion.php');
$hcm = $_POST['txthcm'];
$cedula = $_POST['txtcedula'];
$responsable = $_POST['txtresponsable'];
$ubicacion = $_POST['txtubicacion'];

$querycomprobador = mysqli_query($conn,"SELECT * FROM hcm WHERE nombre_lugar = '$hcm'");
$comprobacion_hcm = mysqli_num_rows($querycomprobador);

if ($comprobacion_hcm == 0) {

		$sqlgrabar = "INSERT INTO hcm(nombre_lugar,cedula,responsable,ubicacion) value ('$hcm','$cedula','$responsable','$ubicacion')"; // Este comando nos permite guardar las variables en la base de datos

			if (mysqli_query($conn,$sqlgrabar)) {

				echo "<script> alert('Registro exitoso del HCM');window.location= 'hcm.php' </script>";
				}
			else 
					{
						echo "Error: " .$sqlgrabar."<br>".mysqli_errno($conn);
					}


}
else
{
	echo "<script> alert('Ya existe este HCM en el sistema');window.location= 'registro_personal.php' </script>";
}



}

else
{
	header('location: principal.php');
}

?>