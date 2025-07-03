<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
 if (isset($_SESSION['id']) && $_SESSION['ident']== 1)
    {
        header("location: estudiantes/principal.php");
    } 
elseif (isset($_SESSION['id']) && $_SESSION['ident']== 2) {
        header("location: docentes/principal.php");
    }
    elseif (isset($_SESSION['id']) && $_SESSION['ident']== 3) {
        header("location: admin/principal.php");
    }

    if (isset($_SESSION['correo'])) {
    include('conexion.php');

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $correo = $_SESSION['correo'];

                        $tabla = "users";
                    


        $querycodigo   = mysqli_query($conn,"SELECT * FROM $tabla WHERE correo = '$correo'");
        $nr = mysqli_num_rows($querycodigo);
        $mostrar = mysqli_fetch_array($querycodigo); 
        $num = $mostrar['codigo'];




    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'somosladge@gmail.com';                     //SMTP username
    $mail->Password   = 'iqisvcepneyjkyrp';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('somosladge@gmail.com', 'ladge');
    $mail->addAddress(''.$correo.'', 'Usuario');     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Codigo de verificación';
    $mail->Body    = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body style="font-family: Arial, sans-serif; margin:200px; padding:0; display: flex; flex-direction: column;">
    <div style="width: 100%; eight: 100%; display: grid; text-align:center;">
        <div style="background-color: #202131; width: 400px;  margin: auto; padding: 2em; border-radius: 6px; color: #12B2E8; border:0.1em solid black; text-align:center;">
<h1>Su codigo de verificación es: <br>'.$num.'</h1>
</div>
</div>
</body>
</html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->CharSet = 'UTF-8';
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Recuperar</title>
     <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">

    	<form id="frmlogin" class="grupo-entradas" method="POST" autocomplete="off" action="recuperar2.php">
    		<br><br>
    	<b>Introduzca el codigo de verificacion</b><br><br>
        <div class="form-group">
    	<input type="text" maxlength="10" minlength="10" class="cajaentradatexto" placeholder="Codigo" name="codigo" required>
        <label for="Codigo">Codigo</label>
        <div></div><br><br>
        <div style="text-align: center;">
    	<button type="submit" class="botonenviar" name="btncodigo">Enviar</button>
        </div>
    </form>
    </div>
</body>
</html>

<?php 
}
else
{
    header('Location:index.php');
}
 ?>

