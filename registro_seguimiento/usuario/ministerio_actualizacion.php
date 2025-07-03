<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['btn-ministerio']))
{
include('../conexion.php');
$id= $_POST['ministerio'];

	    $queryministerio = mysqli_query($conn,"SELECT * FROM ministerios WHERE id ='$id[0]'");
        $comprobacion_ministerio = mysqli_num_rows($queryministerio);
          if ($comprobacion_ministerio > 0) {
          	$mostrar=mysqli_fetch_array($queryministerio);
          		if ($_POST['btn-ministerio'] == "Eliminar")  {

          			$contador = count($id);

					for ($i=0; $i < $contador ; $i++) { 
					$querynuevos = mysqli_query($conn,"DELETE FROM ministerios WHERE id ='$id[$i]'");
					}



			echo "<script> alert('Ministerio eliminado exitosamente');window.location= 'seguimiento.php' </script>";

					}

          			
          		elseif ($_POST['btn-ministerio'] == "Editar") {
          			
          		

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
            <a href="ministerio.php"><i class="fas fa-arrow-left"></i></a>
            </div>
            <?php 
            $_SESSION['ministeriox'] = $id[0];

             ?>
        <div class="form-container" style="height: 200px;">
			<h1 align="center">Editar</h1>
			<form autocomplete="off" method="post" action="ministerio_editar.php">
			     <div class="slider">
			        <div class="slide active">
				        	<div class="form-group">
				        	<label for="">Ministerio</label>
				        	<input type="text" min="4" max="15" value="<?php echo $mostrar['departamentos']; ?>" name="departamento" required>
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