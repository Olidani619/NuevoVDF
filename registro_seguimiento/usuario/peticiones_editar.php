<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['btneditar']))
{
include('../conexion.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];

$sqlactualizar = mysqli_query($conn,"UPDATE peticiones SET 
    nombre = '$nombre',
    apellido = '$apellido',
    cedula = '$cedula',
    fecha = '$fecha',
    descripcion = '$descripcion'
    WHERE id = '{$_SESSION['peticionesx']}'");

unset($_SESSION['peticionesx']);

echo "<script> alert('Petición editada exitosamente');window.location= 'peticiones.php' </script>";

}

else
{
    header('location:../index.php');

}