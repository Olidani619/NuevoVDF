<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['ministerioreg']))
{
include('../conexion.php');
$id = $_SESSION['id'];
$ident =$_SESSION['ident'];
$ministerio = $_POST['ministerio'];

$querycomprobador = mysqli_query($conn,"SELECT * FROM ministerios WHERE departamentos = '$ministerio'");
$comprobacion_ministerio = mysqli_num_rows($querycomprobador);

if ($comprobacion_ministerio == 0) {

		$sqlgrabar = "INSERT INTO ministerios(departamentos) value ('$ministerio')"; // Este comando nos permite guardar las variables en la base de datos

			if (mysqli_query($conn,$sqlgrabar)) {

				echo "<script> alert('Registro exitoso del ministerio');window.location= 'ministerio.php' </script>";
				}
			else 
					{
						echo "Error: " .$sqlgrabar."<br>".mysqli_errno($conn);
					}


}
else
{
	echo "<script> alert('Ya existe este ministerio en el sistema');window.location= 'registro_personal.php' </script>";
}



}

else
{
	header('location: principal.php');
}

?>