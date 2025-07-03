<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_SESSION['nuevo']))
{
include('../conexion.php');
$contador = count($_POST['txtministerio']);

$querynuevos = mysqli_query($conn,"SELECT * FROM nuevos WHERE id ='{$_SESSION['nuevo']}'");

$comprobacion_nuevos = mysqli_num_rows($querynuevos);
 if ($comprobacion_nuevos > 0) {
$mostrar2=mysqli_fetch_array($querynuevos);

$sqlgrabar = mysqli_query ($conn,"INSERT INTO consolidados(nombres,apellidos,edad,cedula,telefono,fecha,sexo,ocupacion,profesion,direccion,invitado_por,estatus) value ('{$mostrar2['nombres']}','{$mostrar2['apellidos']}','{$mostrar2['edad']}','{$mostrar2['cedula']}','{$mostrar2['telefono']}','{$mostrar2['fecha']}','{$mostrar2['sexo']}','{$mostrar2['ocupacion']}','{$mostrar2['profesion']}','{$mostrar2['direccion']}','{$mostrar2['invitado_por']}','Activo')");



$queryconsolidado = mysqli_query($conn,"SELECT * FROM consolidados WHERE cedula ='{$mostrar2['cedula']}'");
$mostrar3=mysqli_fetch_array($queryconsolidado);


for ($i=0; $i < $contador ; $i++) { 
	if ($_POST['txtministerio'][$i] > 0) {
	
	$sqlgrabar = mysqli_query($conn, "INSERT INTO ministerio_asignado(id_usuario, id_ministerio) VALUES ('{$mostrar3['id']}', '{$_POST['txtministerio'][$i]}')");
	}
}

$sqlhcm = mysqli_query($conn,"INSERT INTO hcm_asignado_consolidado(id_usuario, id_hcm) VALUES ('{$mostrar3['id']}', '{$_SESSION['hcm']}')");

$queryborrar = mysqli_query($conn,"DELETE FROM nuevos WHERE id ='{$_SESSION['nuevo']}'");

unset($_SESSION['nuevo']);
unset($_SESSION['hcm']);

	echo "<script> alert('Proceso realizado correctamente');window.location= 'seguimiento.php' </script>";


}// termina el if

}



else
{
	header('Location:seguimiento.php');
}
?>