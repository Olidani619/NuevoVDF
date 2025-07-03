<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['btneditar']))
{
include('../conexion.php');
$ministerio = $_POST['departamento'];

$sqlactualizar = mysqli_query($conn,"UPDATE ministerios SET departamentos = '$ministerio' WHERE id = '{$_SESSION['ministeriox']}'");


unset($_SESSION['ministeriox']);

echo "<script> alert('Ministerio editado exitosamente');window.location= 'ministerio.php' </script>";

}

else
{
    header('location:../index.php');

}