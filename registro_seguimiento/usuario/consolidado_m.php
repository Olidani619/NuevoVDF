<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_SESSION['Ncedula']))
{
include('../conexion.php');
$contador=count($_SESSION['ministerio']);
$hcm = $_SESSION['hcm'];
$queryconsolidado = mysqli_query($conn,"SELECT * FROM consolidados WHERE cedula= '{$_SESSION['Ncedula']}'");
$mostrar=mysqli_fetch_array($queryconsolidado);
$id= $mostrar['id'];



$sqlhcm = mysqli_query($conn,"INSERT INTO hcm_asignado_consolidado(id_usuario, id_hcm) VALUES ('$id', '{$_SESSION['hcm']}')");


for ($i=0; $i < $contador ; $i++) { 
	$sqlgrabar = mysqli_query($conn, "INSERT INTO ministerio_asignado(id_usuario, id_ministerio) VALUES ('$id', '{$_SESSION['ministerio'][$i]}')");

}

	($_SESSION['Ncedula']);
	($_SESSION['ministerio']);
	($_SESSION['hcm']);

	echo "<script> alert('Registro exitoso');window.location= 'registro_personal.php' </script>";


}

else
{
	echo "<script> alert('Ocurrio un fallo durante la operacion');window.location= 'registro_personal.php' </script>";
}