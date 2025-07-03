<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['btneditar']))
{
include('../conexion.php');
$hcm = $_POST['hcm'];
$cedula = $_POST['cedula'];
$responsable = $_POST['responsable'];
$ubicacion = $_POST['ubicacion'];

$sqlactualizar = mysqli_query($conn,"UPDATE hcm SET 
    nombre_lugar = '$hcm',
    cedula = '$cedula',
    responsable = '$responsable',
    ubicacion = '$ubicacion'
    WHERE id = '{$_SESSION['hcmx']}'");

unset($_SESSION['hcmx']);

echo "<script> alert('HCM editado exitosamente');window.location= 'hcm.php' </script>";

}

else
{
    header('location:../index.php');

}