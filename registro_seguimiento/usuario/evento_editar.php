<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['btneditar']))
{
include('../conexion.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$evento = $_POST['evento'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];

$sqlactualizar = mysqli_query($conn,"UPDATE eventos SET 
    nombre = '$nombre',
    apellido = '$apellido',
    cedula = '$cedula',
    tipo_evento = '$evento',
    fecha = '$fecha',
    descripcion = '$descripcion'
    WHERE id = '{$_SESSION['eventos']}'");

unset($_SESSION['eventos']);

echo "<script> alert('Evento editado exitosamente');window.location= 'peticiones.php' </script>";

}

else
{
    header('location:../index.php');

}