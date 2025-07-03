<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 1 && isset($_POST['btnseguridad']))
{
include('../conexion.php');
$id = $_SESSION['id'];
$ident =$_SESSION['ident'];
$queryusuario = mysqli_query($conn,"SELECT * FROM users WHERE id = '$id' AND identificador = '1' ");
    $nr = mysqli_num_rows($queryusuario);

    if ($nr == 0) {
        session_start();// Mantiene la sesion

        session_destroy(); // Cierra la sesion

        header("location: ../index.php"); //Regresa a la pagina index.php
    } // Cierre del if secudanrio
    else
    {
        $a= $_POST['a'];
        $b= $_POST['b'];
        $c=0;
        for ($i=0; $i < 4; $i++) { 
        $b_encriptado= password_hash($b[$i], PASSWORD_BCRYPT);
            $sqlgrabar = "INSERT INTO preguntas_seguridad(id_usuario,id_identificador,pregunta,respuesta) value ('$id','$ident','$a[$i]','$b_encriptado')"; // Este comando nos permite guardar las variables en la base de datos

                                    if (mysqli_query($conn,$sqlgrabar)) {
                                        $c++;

                                                }
                                else 
                                    {
                                        echo "Error: " .$sqlgrabar."<br>".mysqli_errno($conn);
                                    }
        }

        // Condiciones para regresar a la pagina
        if ($c == 4) {
            echo "<script> alert('Preguntas y respuestas de seguridad registradas con exito');window.location= 'principal.php' </script>";
           
        }
        else if($c == 0)
        {
                        echo "<script> alert('No se pudieron registrar las preguntas de seguridad');window.location= 'principal.php' </script>";
        }

    }



}
// Cierre del if principal
else
{
    header("location: ../index.php");
}

 ?>

