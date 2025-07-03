<?php 
session_start();

if(isset($_SESSION['id']) && $_SESSION['ident'] == 1 && isset($_POST['btnvalidacion']))
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
    }

    else
    {  
            if (isset($_SESSION['id_users']) && isset($_SESSION['verificacion']) && isset($_SESSION['respuesta'])) { // Verificacion de las variables temporales

    

        $a= $_POST['a'];

        for ($i=0; $i <2 ; $i++) { 
            $b[$i]=$_SESSION['respuesta'][$i]; // id de las preguntas para verificar las respuestas
            $querypregunta = mysqli_query($conn,"SELECT * FROM preguntas_seguridad WHERE id ='$b[$i]'");
            $mostrar = mysqli_fetch_array($querypregunta);

            $ver[$i]= $mostrar['respuesta'];
            
        }

            if (($nr == 1) && (password_verify($a[0],$ver[0])) && (password_verify($a[1],$ver[1])))// Comprobacion de seugirdad
            {

                $contador = count($_SESSION['id_users']);


                for ($j=0; $j < $contador ; $j++) { 

                    if ($_SESSION['verificacion'][$j] == '1') {
                   $queryaprobacion = mysqli_query($conn,"UPDATE users SET status = '1' WHERE id ={$_SESSION['id_users'][$j]}");

                    }
                    else
                    {

                        $queryeliminacion = mysqli_query ($conn,"DELETE FROM docentes WHERE id={$_SESSION['id_users'][$j]}");
                        echo  "<br>Eliminado JULIO CESAR";
                    }

                }


                   unset($_SESSION['id_users']);
                   unset($_SESSION['verificacion']);
                   unset($_SESSION['respuesta']);
                   echo "<script> alert('Solicitud procesada');window.location= 'principal.php' </script>";

            }


            //Caso contrario que no sean correctas las respuestas
            else
            {
                 echo "<script> alert('respuesta incorrectas');window.location= 'principal.php' </script>";
            }




        }
        else
        {
            header('location: ../index.php');
        }
    } // Final del primer else
}

else
{
    header('location: ../index.php');
}


 ?>