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

$sqlactualizar = mysqli_query($conn,"UPDATE nuevos SET 
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
    WHERE id = '{$_SESSION['nuevo']}'");
$sqlactualizar = mysqli_query($conn,"UPDATE hcm_asignado_nuevo SET id_hcm = '$hcm' WHERE id_usuario = '{$_SESSION['nuevo']}' ");

unset($_SESSION['nuevo']);

echo "<script> alert('Registro editado exitosamente');window.location= 'seguimiento.php' </script>";

}

else
{
    header('location:../index.php');

}