<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 1 && isset($_POST['btnopcion']) )
{


if ($_POST['btnopcion'] == "Eliminar") {
include('../conexion.php');
$id = $_POST['users'];
$contador = count($id);

for ($i=0; $i < $contador ; $i++) {

$queryusers = mysqli_query($conn,"DELETE FROM users WHERE id ='$id[$i]'");
}

echo "<script> alert('Registro eliminado exitosamente');window.location= 'personal.php' </script>";

}
else
{
	echo "<script> alert('Error ocurrio un fallo');window.location= 'personal.php' </script>";

}


}

else
{
	header('location:personal.php');
}
?>