<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['btn-peticion']))
{
include('../conexion.php');
$id= $_POST['peticiones'];

	    $querypeticion = mysqli_query($conn,"SELECT * FROM peticiones WHERE id ='$id[0]'");
        $comprobacion_peticion = mysqli_num_rows($querypeticion);
          if ($comprobacion_peticion > 0) {
          	$mostrar=mysqli_fetch_array($querypeticion);
          		if ($_POST['btn-peticion'] == "Eliminar")  {

          			$contador = count($id);

					for ($i=0; $i < $contador ; $i++) { 
					$querynuevos = mysqli_query($conn,"DELETE FROM peticiones WHERE id ='$id[$i]'");
					}



			echo "<script> alert('petición eliminada exitosamente');window.location= 'peticiones.php' </script>";

					}

          			
          		elseif ($_POST['btn-peticion'] == "Editar") {
          			
          		

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
            <a href="peticiones.php"><i class="fas fa-arrow-left"></i></a>
            </div>
            <?php 
            $_SESSION['peticionesx'] = $id[0];

             ?>
        <div class="form-container">
			<h1 align="center">Editar</h1>
			<form autocomplete="off" method="post" action="peticiones_editar.php">
			     <div class="slider">
			        <div class="slide active">
				        	<div class="form-group">
				        	<label for="">Nombre</label>
				        	<input type="text" class="letters-only" minlength="4" maxlength="15" value="<?php echo $mostrar['nombre']; ?>" name="nombre" required>
				        	</div>
				        	<div class="form-group">
				        	<label for="">Apellido</label>
				        	<input type="text" class="letters-only" minlength="4" maxlength="15" value="<?php echo $mostrar['apellido']; ?>" name="apellido" required>
				        	</div>
				        	<div class="form-group">
				        	<label for="">Cedula</label>
				        	<input type="text" class="numbers-only" minlength="7" maxlength="8" value="<?php echo $mostrar['cedula']; ?>" name="cedula" required>
				        	</div>
				        	<div class="form-group">
				        	<label for="">Tipo de petición</label>
				        	      <select name="peticion" required>
         				 	<option value="">-- Seleccione una categoria --</option>
          					<option value="Familia" <?php if($mostrar['tipo_peticion'] == "Familia") { echo "selected";} ?> >Familia</option>
          					<option value="Salud" <?php if($mostrar['tipo_peticion'] == "Salud") { echo "selected";} ?>>Salud</option>
      					</select>
				        	</div>
				        	<div class="form-group">
				        	<label for="">Fecha de registro</label>
				        	<input type="date" value="<?php echo $mostrar['fecha']; ?>" name="fecha" required>
				        	</div>
				        	<div class="form-group">
				        	<label for="">Descripción</label>
				        	<input type="text" class="letters-only" minlength="4" maxlength="50" value="<?php echo $mostrar['descripcion']; ?>" name="descripcion" required>
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