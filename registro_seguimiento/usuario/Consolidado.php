<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['txtnombreC']))
{
include('../conexion.php');
$id = $_SESSION['id'];
$ident =$_SESSION['ident'];

$nombre= $_POST['txtnombreC'];
$apellido= $_POST['txtapellido'];
$edad= $_POST['txtedad'];
$Ncedula= $_POST['Ncedula'];
$telefono= $_POST['txttelefono'];
$fecha= $_POST['txtfecha'];
$sexo= $_POST['txtsexo'];
$ocupacion= $_POST['ocupaciones'];
$profesion= $_POST['profesiones'];
$direccion= $_POST['txtdireccion'];
$invitado= $_POST['txtinvitado'];
$ministerio= $_POST['txtministerio'];
$hcm= $_POST['txthcm'];
$contador = count($_POST['txtministerio']);


	//Evitar registros de la misma persona por cedula__________________
    $querynuevo = mysqli_query($conn,"SELECT * FROM nuevos WHERE cedula = '$Ncedula'");
    $comprobacion_cedula_nuevos = mysqli_num_rows($querynuevo);
	$querycomprobador = mysqli_query($conn,"SELECT * FROM consolidados WHERE cedula = '$Ncedula'");
	$comprobacion_cedula = mysqli_num_rows($querycomprobador);

	if ($comprobacion_cedula == 0 && $comprobacion_cedula_nuevos == 0) { //________________________________

		
			$sqlgrabar = "INSERT INTO consolidados(nombres,apellidos,edad,cedula,telefono,fecha,sexo,ocupacion,profesion,direccion,invitado_por,estatus) value ('$nombre','$apellido','$edad','$Ncedula','$telefono','$fecha','$sexo','$ocupacion','$profesion','$direccion','$invitado','Activo')"; // Este comando nos permite guardar las variables en la base de datos

				
				if (mysqli_query($conn,$sqlgrabar)) {

					$_SESSION['Ncedula'] = $Ncedula;
					$_SESSION['hcm'] = $hcm;
					for ($i=0; $i <$contador ; $i++) { 
					$_SESSION['ministerio'][$i]= $ministerio[$i];
					}

					header('location:consolidado_m.php');
					
					}
				else 
					{
							echo "Error: " .$sqlgrabar."<br>".mysqli_errno($conn);
					}


			} //____________________________ $comprobacion_cedula 
			elseif ($comprobacion_cedula > 0)
			{
				
				echo "<script> alert('Ya existe un consolidado con esa cedula en el sistema');window.location= 'registro_personal.php' </script>";
			}//_____________________________ $comprobacion_cedula

			elseif ($comprobacion_cedula_nuevos > 0)
			{
				echo "<script> alert('Ya existe una persona en nuevo creyente con esa cedula en el sistema');window.location= 'registro_personal.php' </script>";
			}

}


else
{
	header('location:registro_personal.php');
}

 ?>