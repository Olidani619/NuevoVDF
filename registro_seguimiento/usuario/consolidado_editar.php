<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['btneditar']))
{
include('../conexion.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$sexo = $_POST['sexo'];
$ocupaciones = $_POST['ocupaciones'];
$profesiones = $_POST['profesiones'];
$hcm = $_POST['hcm'];
$direccion = $_POST['direccion'];
$invitado = $_POST['invitado'];
$estatus = $_POST['estatus'];

$sqlactualizar = mysqli_query($conn,"UPDATE consolidados SET 
    nombres = '$nombre',
    apellidos = '$apellido',
    edad = '$edad',
    cedula = '$cedula',
    telefono = '$telefono',
    fecha = '$fecha',
    sexo = '$sexo',
    ocupacion = '$ocupaciones',
    profesion = '$profesiones',
    direccion = '$direccion',
    invitado_por = '$invitado',
    estatus = '$estatus'
    WHERE id = '{$_SESSION['consolidado']}'");
$sqlactualizar = mysqli_query($conn,"UPDATE hcm_asignado_consolidado SET id_hcm = '$hcm' WHERE id_usuario = '{$_SESSION['consolidado']}' ");

    if (isset($_POST['ministerioeli'])) {
        

        $contador1 = count($_POST['ministerioeli']);


        for ($i=0; $i < $contador1 ; $i++) { 
            $querydelete = mysqli_query($conn,"DELETE FROM ministerio_asignado WHERE id_usuario ='{$_SESSION['consolidado']}' AND id_ministerio ='{$_POST['ministerioeli'][$i]}'");
        }
        
    }

    if (isset($_POST['txtministerio'])) {
        $contador2 = count($_POST['txtministerio']);
        for ($i=0; $i < $contador2 ; $i++) { 
            if ($_POST['txtministerio'][$i] > 0) {
                // code...
            
            $queryinsert = mysqli_query($conn,"INSERT INTO ministerio_asignado(id_usuario,id_ministerio) value ('{$_SESSION['consolidado']}','{$_POST['txtministerio'][$i]}')");
        }
        
    }
}
unset($_SESSION['consolidado']);

echo "<script> alert('Registro editado exitosamente');window.location= 'seguimiento.php' </script>";

}

else
{
    header('location:../index.php');

}