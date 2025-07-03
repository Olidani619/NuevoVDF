<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['btn-hcm']))
{
include('../conexion.php');
$id= $_POST['hcm'];

	    $queryhcm = mysqli_query($conn,"SELECT * FROM hcm WHERE id ='$id[0]'");
        $comprobacion_hcm = mysqli_num_rows($queryhcm);
          if ($comprobacion_hcm > 0) {
          	$mostrar=mysqli_fetch_array($queryhcm);
          		if ($_POST['btn-hcm'] == "Eliminar")  {

          			$contador = count($id);

					for ($i=0; $i < $contador ; $i++) { 
					$querynuevos = mysqli_query($conn,"DELETE FROM ministerios WHERE id ='$id[$i]'");
					}



			echo "<script> alert('Ministerio eliminado exitosamente');window.location= 'seguimiento.php' </script>";

					}

          			
          		elseif ($_POST['btn-hcm'] == "Editar") {
          			
          		

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../fontawesome-free-6.7.2-web/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Cambios</title>
</head>
<body>
    <div class="container">

        <main>
            <section id="content">
            <div class="form-enlace">
            <a href="hcm.php"><i class="fas fa-arrow-left"></i></a>
            </div>
            <?php 
            $_SESSION['hcmx'] = $id[0];

             ?>
        <div class="form-container">
			<h1 align="center">Editar</h1>
			<form autocomplete="off" method="post" action="hcm_editar.php">
			     <div class="slider">
			        <div class="slide active">
				        	<div class="form-group">
				        	<label for="">Nombre del HCM</label>
				        	<input type="text" class="letters-only" minlength="4" maxlength="25" value="<?php echo $mostrar['nombre_lugar']; ?>" name="hcm" required>
				        	</div>
				   		  	<div class="form-group">
				        	<label for="">Cédula</label>
				        	<input type="text" class="numbers-only" minlength="7" maxlength="8" value="<?php echo $mostrar['cedula']; ?>" name="cedula" required>
				        	</div>
				        	<div class="form-group">
				        	<label for="">Responsable</label>
				        	<input type="text" class="letters-only" minlength="4" maxlength="15" value="<?php echo $mostrar['responsable']; ?>" name="responsable" required>
				        	</div>
				            <div class="form-group">
				        	<label for="">Ubicación</label>
				        	<input type="text" minlength="4" maxlength="50" value="<?php echo $mostrar['ubicacion']; ?>" name="ubicacion" required>
				        	</div>
				        	<div class="form-options">
				        	<button name="btneditar" type="submit"> <i class="fas fa-save"></i> Guardar </button>
				        	</div>
			        </div>
			    </div>
			</form>
		</div>
	</section>
</main>
</div>
<script>
    // Seleccionamos todos los inputs con las clases letters-only y numbers-only
    const letterInputs = document.querySelectorAll('input.letters-only');
    const numberInputs = document.querySelectorAll('input.numbers-only');

    // Filtrado para inputs de letras
    letterInputs.forEach(input => {
        input.addEventListener('input', () => {
            // Permitimos solo letras (mayúsculas, minúsculas), tildes, eñes y espacios
            const filteredValue = input.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, '');
            if (input.value !== filteredValue) {
                input.value = filteredValue;
            }
        });
    });

    // Filtrado para inputs de números
    numberInputs.forEach(input => {
        input.addEventListener('input', () => {
            // Permitimos solo números
            const filteredValue = input.value.replace(/[^0-9]/g, '');
            if (input.value !== filteredValue) {
                input.value = filteredValue;
            }
        });
    });


</script>
</body>
</html>

<?php 
		}
    }
}

else
{
	header('location:ministerio.php');
}
     ?>