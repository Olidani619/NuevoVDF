<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2 && isset($_POST['btnopcion']))
{
include('../conexion.php');
$id= $_POST['nuevo'];

        $querynuevos = mysqli_query($conn,"SELECT * FROM nuevos WHERE id ='$id[0]'");
        $comprobacion_nuevos = mysqli_num_rows($querynuevos);

        if ($comprobacion_nuevos > 0) {
                
        $mostrar=mysqli_fetch_array($querynuevos);

if ($_POST['btnopcion'] == "Eliminar") {
$contador = count($id);

for ($i=0; $i < $contador ; $i++) { 
$querynuevos = mysqli_query($conn,"DELETE FROM nuevos WHERE id ='$id[$i]'");
}



echo "<script> alert('Registro eliminado exitosamente');window.location= 'seguimiento.php' </script>";

}

        

        elseif ($_POST['btnopcion'] == "Editar") {

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
            <a href="seguimiento.php"><i class="fas fa-arrow-left"></i></a>
            </div>
                <?php  


			$_SESSION['nuevo'] = $id[0];

			$queryhcm = mysqli_query($conn,"SELECT * FROM hcm");
             $comprobacion_hcm = mysqli_num_rows($queryhcm);
		  $queryhcmusu = mysqli_query($conn,"SELECT * FROM nuevos INNER JOIN hcm_asignado_nuevo ON nuevos.id= hcm_asignado_nuevo.id_usuario INNER JOIN hcm ON hcm.id = hcm_asignado_nuevo.id_hcm  WHERE nuevos.id= $id[0]");
                while($mostrar2=mysqli_fetch_array($queryhcmusu)){
                    $escogido = $mostrar2['id_hcm'];
                }

?>

<div class="form-container">
<h1 align="center">Editar</h1>
<form method="post" action="nuevo_editar.php">
     <div class="slider">
        <div class="slide active">

    <div class="form-group">
	<label for="">Nombre:</label>
	 <input type="text" class="letters-only" name="nombre" minlength="3" maxlength="15" pattern="[A-Za-z ]+" title="Solo se permiten letras" value="<?php echo $mostrar['nombres']; ?>" required>
    </div>

     <div class="form-group">
	 <label for="">Apellido:</label>
	 <input type="text" class="letters-only" name="apellido" minlength="3" maxlength="15" pattern="[A-Za-z ]+" title="Solo se permiten letras" value="<?php echo $mostrar['apellidos']; ?>" required>
      </div>


     <div class="form-group">
	 <label for="">Fecha de nacimiento</label>
	 <input type="date" name="edad" value="<?php echo $mostrar['edad']; ?>" required>
     </div>


     <div class="form-group">
	 <label for="">Cedula</label>
	 <input type="text" class="numbers-only" minlength="7" maxlength="8" name="cedula" value="<?php echo $mostrar['cedula']; ?>" required>
     </div>


     <div class="form-group">
	 <label for="">Telefono:</label>
	  <input type="text" class="numbers-only" name="telefono" minlength="11" maxlength="11" value="<?php echo $mostrar['telefono']; ?>" required>
     </div>

     <div class="form-group">
	 <label for="">Fecha de inscripción</label>
	  <input type="date" name="fecha" value="<?php echo $mostrar['fecha']; ?>" required>
     </div>


     <div class="form-group">
	 <label for="">Género:</label>
	   <select name="sexo" required>
                <option value="">-- Seleccione un genero --</option>
                <option value="M" <?php if ($mostrar['sexo'] == "M") {
                	echo "selected";
                } ?>>Masculino</option>
                <option value="F" <?php if ($mostrar['sexo'] == "F") {
                	echo "selected";
                } ?>>Femenino</option>
            </select>
      </div>



<div class="form-group">
<label for="ocupaciones">Ocupación</label>
<select id="ocupaciones" name="ocupaciones" required>
    <option value="">-- Seleccione una ocupación --</option>
    <option value="Otros" <?php if ($mostrar['ocupacion'] == "Otros") { echo "selected"; } ?>>Otros</option>
    <option value="Actores/Actrices" <?php if ($mostrar['ocupacion'] == "Actores/Actrices") { echo "selected"; } ?>>Actores/Actrices</option>
    <option value="Agente de ventas" <?php if ($mostrar['ocupacion'] == "Agente de ventas") { echo "selected"; } ?>>Agente de ventas</option>
    <option value="Albañil" <?php if ($mostrar['ocupacion'] == "Albañil") { echo "selected"; } ?>>Albañil</option>
    <option value="Alfombrista" <?php if ($mostrar['ocupacion'] == "Alfombrista") { echo "selected"; } ?>>Alfombrista</option>
    <option value="Almacenista" <?php if ($mostrar['ocupacion'] == "Almacenista") { echo "selected"; } ?>>Almacenista</option>
    <option value="Ama de casa/Amo de casa" <?php if ($mostrar['ocupacion'] == "Ama de casa/Amo de casa") { echo "selected"; } ?>>Ama de casa/Amo de casa</option>
    <option value="Animador/a de eventos" <?php if ($mostrar['ocupacion'] == "Animador/a de eventos") { echo "selected"; } ?>>Animador/a de eventos</option>
    <option value="Asistente personal" <?php if ($mostrar['ocupacion'] == "Asistente personal") { echo "selected"; } ?>>Asistente personal</option>
    <option value="Ayudante general" <?php if ($mostrar['ocupacion'] == "Ayudante general") { echo "selected"; } ?>>Ayudante general</option>
    <option value="Barnizador" <?php if ($mostrar['ocupacion'] == "Barnizador") { echo "selected"; } ?>>Barnizador</option>
    <option value="Barman" <?php if ($mostrar['ocupacion'] == "Barman") { echo "selected"; } ?>>Barman</option>
    <option value="Barista" <?php if ($mostrar['ocupacion'] == "Barista") { echo "selected"; } ?>>Barista</option>
    <option value="Bombero" <?php if ($mostrar['ocupacion'] == "Bombero") { echo "selected"; } ?>>Bombero</option>
    <option value="Buzo" <?php if ($mostrar['ocupacion'] == "Buzo") { echo "selected"; } ?>>Buzo</option>
    <option value="Cajero/a" <?php if ($mostrar['ocupacion'] == "Cajero/a") { echo "selected"; } ?>>Cajero/a</option>
    <option value="Carpintero" <?php if ($mostrar['ocupacion'] == "Carpintero") { echo "selected"; } ?>>Carpintero</option>
    <option value="Cazador/a" <?php if ($mostrar['ocupacion'] == "Cazador/a") { echo "selected"; } ?>>Cazador/a</option>
    <option value="Cerrajero" <?php if ($mostrar['ocupacion'] == "Cerrajero") { echo "selected"; } ?>>Cerrajero</option>
    <option value="Chapista" <?php if ($mostrar['ocupacion'] == "Chapista") { echo "selected"; } ?>>Chapista</option>
    <option value="Cocinero/a" <?php if ($mostrar['ocupacion'] == "Cocinero/a") { echo "selected"; } ?>>Cocinero/a</option>
    <option value="Conductor/a" <?php if ($mostrar['ocupacion'] == "Conductor/a") { echo "selected"; } ?>>Conductor/a</option>
    <option value="Conductor de autobús" <?php if ($mostrar['ocupacion'] == "Conductor de autobús") { echo "selected"; } ?>>Conductor de autobús</option>
    <option value="Conductor de camión" <?php if ($mostrar['ocupacion'] == "Conductor de camión") { echo "selected"; } ?>>Conductor de camión</option>
    <option value="Conductor de Uber/Didi" <?php if ($mostrar['ocupacion'] == "Conductor de Uber/Didi") { echo "selected"; } ?>>Conductor de Uber/Didi</option>
    <option value="Conserje" <?php if ($mostrar['ocupacion'] == "Conserje") { echo "selected"; } ?>>Conserje</option>
    <option value="Consultor/a (en general)" <?php if ($mostrar['ocupacion'] == "Consultor/a (en general)") { echo "selected"; } ?>>Consultor/a (en general)</option>
    <option value="Corrector/a de estilo" <?php if ($mostrar['ocupacion'] == "Corrector/a de estilo") { echo "selected"; } ?>>Corrector/a de estilo</option>
    <option value="Cristalero" <?php if ($mostrar['ocupacion'] == "Cristalero") { echo "selected"; } ?>>Cristalero</option>
    <option value="Cuidador/a de ancianos" <?php if ($mostrar['ocupacion'] == "Cuidador/a de ancianos") { echo "selected"; } ?>>Cuidador/a de ancianos</option>
    <option value="Decorador" <?php if ($mostrar['ocupacion'] == "Decorador") { echo "selected"; } ?>>Decorador</option>
    <option value="Despachador" <?php if ($mostrar['ocupacion'] == "Despachador") { echo "selected"; } ?>>Despachador</option>
    <option value="Diseñador/a gráfico (en general)" <?php if ($mostrar['ocupacion'] == "Diseñador/a gráfico (en general)") { echo "selected"; } ?>>Diseñador/a gráfico (en general)</option>
    <option value="Editor/a de textos (en general)" <?php if ($mostrar['ocupacion'] == "Editor/a de textos (en general)") { echo "selected"; } ?>>Editor/a de textos (en general)</option>
    <option value="Electricista" <?php if ($mostrar['ocupacion'] == "Electricista") { echo "selected"; } ?>>Electricista</option>
    <option value="Empacador/a" <?php if ($mostrar['ocupacion'] == "Empacador/a") { echo "selected"; } ?>>Empacador/a</option>
    <option value="Empapelador" <?php if ($mostrar['ocupacion'] == "Empapelador") { echo "selected"; } ?>>Empapelador</option>
    <option value="Encuadernador" <?php if ($mostrar['ocupacion'] == "Encuadernador") { echo "selected"; } ?>>Encuadernador</option>
    <option value="Encuestador/a" <?php if ($mostrar['ocupacion'] == "Encuestador/a") { echo "selected"; } ?>>Encuestador/a</option>
    <option value="Escritor/a (en general)" <?php if ($mostrar['ocupacion'] == "Escritor/a (en general)") { echo "selected"; } ?>>Escritor/a (en general)</option>
    <option value="Estudiante" <?php if ($mostrar['ocupacion'] == "Estudiante") { echo "selected"; } ?>>Estudiante</option>
    <option value="Entrenador/a personal" <?php if ($mostrar['ocupacion'] == "Entrenador/a personal") { echo "selected"; } ?>>Entrenador/a personal</option>
    <option value="Fresador" <?php if ($mostrar['ocupacion'] == "Fresador") { echo "selected"; } ?>>Fresador</option>
    <option value="Fontanero" <?php if ($mostrar['ocupacion'] == "Fontanero") { echo "selected"; } ?>>Fontanero</option>
    <option value="Fotógrafo/a (en general)" <?php if ($mostrar['ocupacion'] == "Fotógrafo/a (en general)") { echo "selected"; } ?>>Fotógrafo/a (en general)</option>
    <option value="Guardia (sin grado)" <?php if ($mostrar['ocupacion'] == "Guardia (sin grado)") { echo "selected"; } ?>>Guardia (sin grado)</option>
    <option value="Guardia de seguridad" <?php if ($mostrar['ocupacion'] == "Guardia de seguridad") { echo "selected"; } ?>>Guardia de seguridad</option>
    <option value="Grabador" <?php if ($mostrar['ocupacion'] == "Grabador") { echo "selected"; } ?>>Grabador</option>
    <option value="Guía turístico/a" <?php if ($mostrar['ocupacion'] == "Guía turístico/a") { echo "selected"; } ?>>Guía turístico/a</option>
    <option value="Herrero" <?php if ($mostrar['ocupacion'] == "Herrero") { echo "selected"; } ?>>Herrero</option>
    <option value="Impresor" <?php if ($mostrar['ocupacion'] == "Impresor") { echo "selected"; } ?>>Impresor</option>
    <option value="Inspector" <?php if ($mostrar['ocupacion'] == "Inspector") { echo "selected"; } ?>>Inspector</option>
    <option value="Influencer/Creador de contenido" <?php if ($mostrar['ocupacion'] == "Influencer/Creador de contenido") { echo "selected"; } ?>>Influencer/Creador de contenido</option>
    <option value="Intérprete" <?php if ($mostrar['ocupacion'] == "Intérprete") { echo "selected"; } ?>>Intérprete</option>
    <option value="Investigador/a de mercado" <?php if ($mostrar['ocupacion'] == "Investigador/a de mercado") { echo "selected"; } ?>>Investigador/a de mercado</option>
    <option value="Jardinero/a" <?php if ($mostrar['ocupacion'] == "Jardinero/a") { echo "selected"; } ?>>Jardinero/a</option>
    <option value="Joyero" <?php if ($mostrar['ocupacion'] == "Joyero") { echo "selected"; } ?>>Joyero</option>
    <option value="Jubilado/a" <?php if ($mostrar['ocupacion'] == "Jubilado/a") { echo "selected"; } ?>>Jubilado/a</option>
    <option value="Limpiador/a" <?php if ($mostrar['ocupacion'] == "Limpiador/a") { echo "selected"; } ?>>Limpiador/a</option>
    <option value="Militar (sin grado)" <?php if ($mostrar['ocupacion'] == "Militar (sin grado)") { echo "selected"; } ?>>Militar (sin grado)</option>
    <option value="Mensajero" <?php if ($mostrar['ocupacion'] == "Mensajero") { echo "selected"; } ?>>Mensajero</option>
    <option value="Mensajero/a" <?php if ($mostrar['ocupacion'] == "Mensajero/a") { echo "selected"; } ?>>Mensajero/a</option>
    <option value="Mecánico (en general)" <?php if ($mostrar['ocupacion'] == "Mecánico (en general)") { echo "selected"; } ?>>Mecánico (en general)</option>
    <option value="Modelos" <?php if ($mostrar['ocupacion'] == "Modelos") { echo "selected"; } ?>>Modelos</option>
    <option value="Montacarguista" <?php if ($mostrar['ocupacion'] == "Montacarguista") { echo "selected"; } ?>>Montacarguista</option>
    <option value="Montador" <?php if ($mostrar['ocupacion'] == "Montador") { echo "selected"; } ?>>Montador</option>
    <option value="Músicos" <?php if ($mostrar['ocupacion'] == "Músicos") { echo "selected"; } ?>>Músicos</option>
    <option value="Niñero/a" <?php if ($mostrar['ocupacion'] == "Niñero/a") { echo "selected"; } ?>>Niñero/a</option>
    <option value="Obrero/a de construcción" <?php if ($mostrar['ocupacion'] == "Obrero/a de construcción") { echo "selected"; } ?>>Obrero/a de construcción</option>
    <option value="Operador/a de maquinaria" <?php if ($mostrar['ocupacion'] == "Operador/a de maquinaria") { echo "selected"; } ?>>Operador/a de maquinaria</option>
    <option value="Operador de máquinas herramienta" <?php if ($mostrar['ocupacion'] == "Operador de máquinas herramienta") { echo "selected"; } ?>>Operador de máquinas herramienta</option>
    <option value="Paseador/a de perros" <?php if ($mostrar['ocupacion'] == "Paseador/a de perros") { echo "selected"; } ?>>Paseador/a de perros</option>
    <option value="Pescador/a" <?php if ($mostrar['ocupacion'] == "Pescador/a") { echo "selected"; } ?>>Pescador/a</option>
    <option value="Policía (sin grado)" <?php if ($mostrar['ocupacion'] == "Policía (sin grado)") { echo "selected"; } ?>>Policía (sin grado)</option>
    <option value="Programador/a (en general)" <?php if ($mostrar['ocupacion'] == "Programador/a (en general)") { echo "selected"; } ?>>Programador/a (en general)</option>
    <option value="Pulidor" <?php if ($mostrar['ocupacion'] == "Pulidor") { echo "selected"; } ?>>Pulidor</option>
    <option value="Relojero" <?php if ($mostrar['ocupacion'] == "Relojero") { echo "selected"; } ?>>Relojero</option>
    <option value="Reparador" <?php if ($mostrar['ocupacion'] == "Reparador") { echo "selected"; } ?>>Reparador</option>
    <option value="Reponedor" <?php if ($mostrar['ocupacion'] == "Reponedor") { echo "selected"; } ?>>Reponedor</option>
    <option value="Representante de atención al cliente" <?php if ($mostrar['ocupacion'] == "Representante de atención al cliente") { echo "selected"; } ?>>Representante de atención al cliente</option>
    <option value="Repartidor/a" <?php if ($mostrar['ocupacion'] == "Repartidor/a") { echo "selected"; } ?>>Repartidor/a</option>
    <option value="Rotulista" <?php if ($mostrar['ocupacion'] == "Rotulista") { echo "selected"; } ?>>Rotulista</option>
    <option value="Salvavidas" <?php if ($mostrar['ocupacion'] == "Salvavidas") { echo "selected"; } ?>>Salvavidas</option>
    <option value="Sastre" <?php if ($mostrar['ocupacion'] == "Sastre") { echo "selected"; } ?>>Sastre</option>
    <option value="Seguridad/Vigilante" <?php if ($mostrar['ocupacion'] == "Seguridad/Vigilante") { echo "selected"; } ?>>Seguridad/Vigilante</option>
    <option value="Serigrafista" <?php if ($mostrar['ocupacion'] == "Serigrafista") { echo "selected"; } ?>>Serigrafista</option>
    <option value="Soldador" <?php if ($mostrar['ocupacion'] == "Soldador") { echo "selected"; } ?>>Soldador</option>
    <option value="Socorrista" <?php if ($mostrar['ocupacion'] == "Socorrista") { echo "selected"; } ?>>Socorrista</option>
    <option value="Técnico/a de soporte (sin título específico)" <?php if ($mostrar['ocupacion'] == "Técnico/a de soporte (sin título específico)") { echo "selected"; } ?>>Técnico/a de soporte (sin título específico)</option>
    <option value="Tapicero" <?php if ($mostrar['ocupacion'] == "Tapicero") { echo "selected"; } ?>>Tapicero</option>
    <option value="Teleoperador/a" <?php if ($mostrar['ocupacion'] == "Teleoperador/a") { echo "selected"; } ?>>Teleoperador/a</option>
    <option value="Traductor/a" <?php if ($mostrar['ocupacion'] == "Traductor/a") { echo "selected"; } ?>>Traductor/a</option>
    <option value="Transcriptor/a" <?php if ($mostrar['ocupacion'] == "Transcriptor/a") { echo "selected"; } ?>>Transcriptor/a</option>
    <option value="Videógrafo/a (en general)" <?php if ($mostrar['ocupacion'] == "Videógrafo/a (en general)") { echo "selected"; } ?>>Videógrafo/a (en general)</option>
    <option value="Vendedor/a ambulante" <?php if ($mostrar['ocupacion'] == "Vendedor/a ambulante") { echo "selected"; } ?>>Vendedor/a ambulante</option>
    <option value="Zapatero" <?php if ($mostrar['ocupacion'] == "Zapatero") { echo "selected"; } ?>>Zapatero</option>
</select>
</div>

      <div class="form-group">
	  <label for="profesiones">Profesión</label>
<select id="profesiones" name="profesiones" required>
  <option value="">-- Seleccione una profesión --</option>
  <option value="Otros" <?php if ($mostrar['profesion'] == "Otros") { echo "selected"; } ?>>Otros</option>
  <option value="Abogado/a" <?php if ($mostrar['profesion'] == "Abogado/a") { echo "selected"; } ?>>Abogado/a</option>
  <option value="Actor/Actriz (con formación académica específica)" <?php if ($mostrar['profesion'] == "Actor/Actriz (con formación académica específica)") { echo "selected"; } ?>>Actor/Actriz (con formación académica específica)</option>
  <option value="Administrador/a de Empresas" <?php if ($mostrar['profesion'] == "Administrador/a de Empresas") { echo "selected"; } ?>>Administrador/a de Empresas</option>
  <option value="Agente de Aduanas" <?php if ($mostrar['profesion'] == "Agente de Aduanas") { echo "selected"; } ?>>Agente de Aduanas</option>
  <option value="Agente de Bienes Raíces (con licencia y formación)" <?php if ($mostrar['profesion'] == "Agente de Bienes Raíces (con licencia y formación)") { echo "selected"; } ?>>Agente de Bienes Raíces (con licencia y formación)</option>
  <option value="Agente de Seguros (con licencia y formación)" <?php if ($mostrar['profesion'] == "Agente de Seguros (con licencia y formación)") { echo "selected"; } ?>>Agente de Seguros (con licencia y formación)</option>
  <option value="Analista de Riesgos" <?php if ($mostrar['profesion'] == "Analista de Riesgos") { echo "selected"; } ?>>Analista de Riesgos</option>
  <option value="Analista de Sistemas" <?php if ($mostrar['profesion'] == "Analista de Sistemas") { echo "selected"; } ?>>Analista de Sistemas</option>
  <option value="Analista Financiero/a" <?php if ($mostrar['profesion'] == "Analista Financiero/a") { echo "selected"; } ?>>Analista Financiero/a</option>
  <option value="Antropólogo/a" <?php if ($mostrar['profesion'] == "Antropólogo/a") { echo "selected"; } ?>>Antropólogo/a</option>
  <option value="Arquitecto/a" <?php if ($mostrar['profesion'] == "Arquitecto/a") { echo "selected"; } ?>>Arquitecto/a</option>
  <option value="Asesor/a Legal" <?php if ($mostrar['profesion'] == "Asesor/a Legal") { echo "selected"; } ?>>Asesor/a Legal</option>
  <option value="Auditor/a" <?php if ($mostrar['profesion'] == "Auditor/a") { echo "selected"; } ?>>Auditor/a</option>
  <option value="Bailarín/a profesional" <?php if ($mostrar['profesion'] == "Bailarín/a profesional") { echo "selected"; } ?>>Bailarín/a profesional</option>
  <option value="Barnizador" <?php if ($mostrar['profesion'] == "Barnizador") { echo "selected"; } ?>>Barnizador</option>
  <option value="Biólogo Marino" <?php if ($mostrar['profesion'] == "Biólogo Marino") { echo "selected"; } ?>>Biólogo Marino</option>
  <option value="Bibliotecólogo/a" <?php if ($mostrar['profesion'] == "Bibliotecólogo/a") { echo "selected"; } ?>>Bibliotecólogo/a</option>
  <option value="Capacitador/a" <?php if ($mostrar['profesion'] == "Capacitador/a") { echo "selected"; } ?>>Capacitador/a</option>
  <option value="Capitán/a de Barco" <?php if ($mostrar['profesion'] == "Capitán/a de Barco") { echo "selected"; } ?>>Capitán/a de Barco</option>
  <option value="Cartógrafo/a" <?php if ($mostrar['profesion'] == "Cartógrafo/a") { echo "selected"; } ?>>Cartógrafo/a</option>
  <option value="Científico/a (Biólogo, Químico, Físico, Matemático, etc.)" <?php if ($mostrar['profesion'] == "Científico/a (Biólogo, Químico, Físico, Matemático, etc.)") { echo "selected"; } ?>>Científico/a (Biólogo, Químico, Físico, Matemático, etc.)</option>
  <option value="Científico/a de Datos" <?php if ($mostrar['profesion'] == "Científico/a de Datos") { echo "selected"; } ?>>Científico/a de Datos</option>
  <option value="Cónsul" <?php if ($mostrar['profesion'] == "Cónsul") { echo "selected"; } ?>>Cónsul</option>
  <option value="Compositor/a" <?php if ($mostrar['profesion'] == "Compositor/a") { echo "selected"; } ?>>Compositor/a</option>
  <option value="Comunicador/a Social/Periodista" <?php if ($mostrar['profesion'] == "Comunicador/a Social/Periodista") { echo "selected"; } ?>>Comunicador/a Social/Periodista</option>
  <option value="Consultor/a de Empresas" <?php if ($mostrar['profesion'] == "Consultor/a de Empresas") { echo "selected"; } ?>>Consultor/a de Empresas</option>
  <option value="Coreógrafo/a" <?php if ($mostrar['profesion'] == "Coreógrafo/a") { echo "selected"; } ?>>Coreógrafo/a</option>
  <option value="Criminalista" <?php if ($mostrar['profesion'] == "Criminalista") { echo "selected"; } ?>>Criminalista</option>
  <option value="Criminólogo/a" <?php if ($mostrar['profesion'] == "Criminólogo/a") { echo "selected"; } ?>>Criminólogo/a</option>
  <option value="Detective privado/a (con licencia y formación)" <?php if ($mostrar['profesion'] == "Detective privado/a (con licencia y formación)") { echo "selected"; } ?>>Detective privado/a (con licencia y formación)</option>
  <option value="Director/a de Cine" <?php if ($mostrar['profesion'] == "Director/a de Cine") { echo "selected"; } ?>>Director/a de Cine</option>
  <option value="Director/a de Orquesta" <?php if ($mostrar['profesion'] == "Director/a de Orquesta") { echo "selected"; } ?>>Director/a de Orquesta</option>
  <option value="Diseñador/a de Iluminación" <?php if ($mostrar['profesion'] == "Diseñador/a de Iluminación") { echo "selected"; } ?>>Diseñador/a de Iluminación</option>
  <option value="Diseñador/a de Interiores" <?php if ($mostrar['profesion'] == "Diseñador/a de Interiores") { echo "selected"; } ?>>Diseñador/a de Interiores</option>
  <option value="Diseñador/a de Moda" <?php if ($mostrar['profesion'] == "Diseñador/a de Moda") { echo "selected"; } ?>>Diseñador/a de Moda</option>
  <option value="Diseñador/a de Sonido" <?php if ($mostrar['profesion'] == "Diseñador/a de Sonido") { echo "selected"; } ?>>Diseñador/a de Sonido</option>
  <option value="Diseñador/a Gráfico/a (con título)" <?php if ($mostrar['profesion'] == "Diseñador/a Gráfico/a (con título)") { echo "selected"; } ?>>Diseñador/a Gráfico/a (con título)</option>
  <option value="Desarrollador/a de Software/Programador/a (con título)" <?php if ($mostrar['profesion'] == "Desarrollador/a de Software/Programador/a (con título)") { echo "selected"; } ?>>Desarrollador/a de Software/Programador/a (con título)</option>
  <option value="Diplomático/a" <?php if ($mostrar['profesion'] == "Diplomático/a") { echo "selected"; } ?>>Diplomático/a</option>
  <option value="Editor/a Audiovisual" <?php if ($mostrar['profesion'] == "Editor/a Audiovisual") { echo "selected"; } ?>>Editor/a Audiovisual</option>
  <option value="Editor/a de Libros" <?php if ($mostrar['profesion'] == "Editor/a de Libros") { echo "selected"; } ?>>Editor/a de Libros</option>
  <option value="Educador/a Social" <?php if ($mostrar['profesion'] == "Educador/a Social") { echo "selected"; } ?>>Educador/a Social</option>
  <option value="Enfermero/a" <?php if ($mostrar['profesion'] == "Enfermero/a") { echo "selected"; } ?>>Enfermero/a</option>
  <option value="Especialista en Inteligencia Artificial" <?php if ($mostrar['profesion'] == "Especialista en Inteligencia Artificial") { echo "selected"; } ?>>Especialista en Inteligencia Artificial</option>
  <option value="Especialista en Marketing Digital" <?php if ($mostrar['profesion'] == "Especialista en Marketing Digital") { echo "selected"; } ?>>Especialista en Marketing Digital</option>
  <option value="Especialista en Robótica" <?php if ($mostrar['profesion'] == "Especialista en Robótica") { echo "selected"; } ?>>Especialista en Robótica</option>
  <option value="Especialista en Seguridad Informática" <?php if ($mostrar['profesion'] == "Especialista en Seguridad Informática") { echo "selected"; } ?>>Especialista en Seguridad Informática</option>
  <option value="Escenógrafo/a" <?php if ($mostrar['profesion'] == "Escenógrafo/a") { echo "selected"; } ?>>Escenógrafo/a</option>
  <option value="Filósofo/a" <?php if ($mostrar['profesion'] == "Filósofo/a") { echo "selected"; } ?>>Filósofo/a</option>
  <option value="Fiscal" <?php if ($mostrar['profesion'] == "Fiscal") { echo "selected"; } ?>>Fiscal</option>
  <option value="Fisioterapeuta" <?php if ($mostrar['profesion'] == "Fisioterapeuta") { echo "selected"; } ?>>Fisioterapeuta</option>
  <option value="Geólogo/a" <?php if ($mostrar['profesion'] == "Geólogo/a") { echo "selected"; } ?>>Geólogo/a</option>
  <option value="Geógrafo/a" <?php if ($mostrar['profesion'] == "Geógrafo/a") { echo "selected"; } ?>>Geógrafo/a</option>
  <option value="Gerente de Proyectos" <?php if ($mostrar['profesion'] == "Gerente de Proyectos") { echo "selected"; } ?>>Gerente de Proyectos</option>
  <option value="Gestor/a Cultural" <?php if ($mostrar['profesion'] == "Gestor/a Cultural") { echo "selected"; } ?>>Gestor/a Cultural</option>
  <option value="Grafólogo/a" <?php if ($mostrar['profesion'] == "Grafólogo/a") { echo "selected"; } ?>>Grafólogo/a</option>
  <option value="Guionista" <?php if ($mostrar['profesion'] == "Guionista") { echo "selected"; } ?>>Guionista</option>
  <option value="Historiador/a" <?php if ($mostrar['profesion'] == "Historiador/a") { echo "selected"; } ?>>Historiador/a</option>
  <option value="Historiador/a del Arte" <?php if ($mostrar['profesion'] == "Historiador/a del Arte") { echo "selected"; } ?>>Historiador/a del Arte</option>
  <option value="Ingeniero/a (Civil, Industrial, Eléctrico, Mecánico, Software, Químico, etc.)" <?php if ($mostrar['profesion'] == "Ingeniero/a (Civil, Industrial, Eléctrico, Mecánico, Software, Químico, etc.)") { echo "selected"; } ?>>Ingeniero/a (Civil, Industrial, Eléctrico, Mecánico, Software, Químico, etc.)</option>
  <option value="Ingeniero/a Aeronáutico/a" <?php if ($mostrar['profesion'] == "Ingeniero/a Aeronáutico/a") { echo "selected"; } ?>>Ingeniero/a Aeronáutico/a</option>
  <option value="Ingeniero/a Agrónomo/a" <?php if ($mostrar['profesion'] == "Ingeniero/a Agrónomo/a") { echo "selected"; } ?>>Ingeniero/a Agrónomo/a</option>
  <option value="Ingeniero/a Ambiental" <?php if ($mostrar['profesion'] == "Ingeniero/a Ambiental") { echo "selected"; } ?>>Ingeniero/a Ambiental</option>
  <option value="Ingeniero/a Biomédico/a" <?php if ($mostrar['profesion'] == "Ingeniero/a Biomédico/a") { echo "selected"; } ?>>Ingeniero/a Biomédico/a</option>
  <option value="Ingeniero/a de Alimentos" <?php if ($mostrar['profesion'] == "Ingeniero/a de Alimentos") { echo "selected"; } ?>>Ingeniero/a de Alimentos</option>
  <option value="Ingeniero/a de Caminos, Canales y Puertos" <?php if ($mostrar['profesion'] == "Ingeniero/a de Caminos, Canales y Puertos") { echo "selected"; } ?>>Ingeniero/a de Caminos, Canales y Puertos</option>
  <option value="Ingeniero/a de Forestal" <?php if ($mostrar['profesion'] == "Ingeniero/a de Forestal") { echo "selected"; } ?>>Ingeniero/a de Forestal</option>
  <option value="Ingeniero/a de Minas" <?php if ($mostrar['profesion'] == "Ingeniero/a de Minas") { echo "selected"; } ?>>Ingeniero/a de Minas</option>
  <option value="Ingeniero/a de Obras Públicas" <?php if ($mostrar['profesion'] == "Ingeniero/a de Obras Públicas") { echo "selected"; } ?>>Ingeniero/a de Obras Públicas</option>
  <option value="Ingeniero/a de Transporte" <?php if ($mostrar['profesion'] == "Ingeniero/a de Transporte") { echo "selected"; } ?>>Ingeniero/a de Transporte</option>
  <option value="Ingeniero/a Electrónico/a" <?php if ($mostrar['profesion'] == "Ingeniero/a Electrónico/a") { echo "selected"; } ?>>Ingeniero/a Electrónico/a</option>
  <option value="Ingeniero/a Hidráulico/a" <?php if ($mostrar['profesion'] == "Ingeniero/a Hidráulico/a") { echo "selected"; } ?>>Ingeniero/a Hidráulico/a</option>
  <option value="Ingeniero/a en Geodesia" <?php if ($mostrar['profesion'] == "Ingeniero/a en Geodesia") { echo "selected"; } ?>>Ingeniero/a en Geodesia</option>
  <option value="Ingeniero/a en Petróleo" <?php if ($mostrar['profesion'] == "Ingeniero/a en Petróleo") { echo "selected"; } ?>>Ingeniero/a en Petróleo</option>
  <option value="Ingeniero/a en Telecomunicaciones" <?php if ($mostrar['profesion'] == "Ingeniero/a en Telecomunicaciones") { echo "selected"; } ?>>Ingeniero/a en Telecomunicaciones</option>
  <option value="Ingeniero/a Mecatrónico/a" <?php if ($mostrar['profesion'] == "Ingeniero/a Mecatrónico/a") { echo "selected"; } ?>>Ingeniero/a Mecatrónico/a</option>
  <option value="Ingeniero/a Naval" <?php if ($mostrar['profesion'] == "Ingeniero/a Naval") { echo "selected"; } ?>>Ingeniero/a Naval</option>
  <option value="Ingeniero/a Textil" <?php if ($mostrar['profesion'] == "Ingeniero/a Textil") { echo "selected"; } ?>>Ingeniero/a Textil</option>
  <option value="Juez/a" <?php if ($mostrar['profesion'] == "Juez/a") { echo "selected"; } ?>>Juez/a</option>
  <option value="Logopeda/Fonoaudiólogo/a" <?php if ($mostrar['profesion'] == "Logopeda/Fonoaudiólogo/a") { echo "selected"; } ?>>Logopeda/Fonoaudiólogo/a</option>
  <option value="Magistrado/a" <?php if ($mostrar['profesion'] == "Magistrado/a") { echo "selected"; } ?>>Magistrado/a</option>
  <option value="Marinero/a mercante (oficial)" <?php if ($mostrar['profesion'] == "Marinero/a mercante (oficial)") { echo "selected"; } ?>>Marinero/a mercante (oficial)</option>
  <option value="Maestro/a/Profesor/a (con título)" <?php if ($mostrar['profesion'] == "Maestro/a/Profesor/a (con título)") { echo "selected"; } ?>>Maestro/a/Profesor/a (con título)</option>
  <option value="Meteorólogo/a" <?php if ($mostrar['profesion'] == "Meteorólogo/a") { echo "selected"; } ?>>Meteorólogo/a</option>
  <option value="Mediador/a" <?php if ($mostrar['profesion'] == "Mediador/a") { echo "selected"; } ?>>Mediador/a</option>
  <option value="Musicólogo/a" <?php if ($mostrar['profesion'] == "Musicólogo/a") { echo "selected"; } ?>>Musicólogo/a</option>
  <option value="Museólogo/a" <?php if ($mostrar['profesion'] == "Museólogo/a") { echo "selected"; } ?>>Museólogo/a</option>
  <option value="Negociador/a" <?php if ($mostrar['profesion'] == "Negociador/a") { echo "selected"; } ?>>Negociador/a</option>
    <option value="Notario/a" <?php if ($mostrar['profesion'] == "Notario/a") { echo "selected"; } ?>>Notario/a</option>
  <option value="Nutricionista/Dietista" <?php if ($mostrar['profesion'] == "Nutricionista/Dietista") { echo "selected"; } ?>>Nutricionista/Dietista</option>
  <option value="Odontólogo/a" <?php if ($mostrar['profesion'] == "Odontólogo/a") { echo "selected"; } ?>>Odontólogo/a</option>
  <option value="Orientador/a Educativo/a" <?php if ($mostrar['profesion'] == "Orientador/a Educativo/a") { echo "selected"; } ?>>Orientador/a Educativo/a</option>
  <option value="Orientador/a Laboral" <?php if ($mostrar['profesion'] == "Orientador/a Laboral") { echo "selected"; } ?>>Orientador/a Laboral</option>
  <option value="Perito/a" <?php if ($mostrar['profesion'] == "Perito/a") { echo "selected"; } ?>>Perito/a</option>
  <option value="Perito/a Calígrafo/a" <?php if ($mostrar['profesion'] == "Perito/a Calígrafo/a") { echo "selected"; } ?>>Perito/a Calígrafo/a</option>
  <option value="Perito/a Tasador/a" <?php if ($mostrar['profesion'] == "Perito/a Tasador/a") { echo "selected"; } ?>>Perito/a Tasador/a</option>
  <option value="Perito/a Traductor/a" <?php if ($mostrar['profesion'] == "Perito/a Traductor/a") { echo "selected"; } ?>>Perito/a Traductor/a</option>
  <option value="Piloto/a de Avión" <?php if ($mostrar['profesion'] == "Piloto/a de Avión") { echo "selected"; } ?>>Piloto/a de Avión</option>
  <option value="Politólogo/a" <?php if ($mostrar['profesion'] == "Politólogo/a") { echo "selected"; } ?>>Politólogo/a</option>
  <option value="Productor/a Audiovisual" <?php if ($mostrar['profesion'] == "Productor/a Audiovisual") { echo "selected"; } ?>>Productor/a Audiovisual</option>
  <option value="Publicista" <?php if ($mostrar['profesion'] == "Publicista") { echo "selected"; } ?>>Publicista</option>
  <option value="Psicólogo/a" <?php if ($mostrar['profesion'] == "Psicólogo/a") { echo "selected"; } ?>>Psicólogo/a</option>
  <option value="Registrador/a" <?php if ($mostrar['profesion'] == "Registrador/a") { echo "selected"; } ?>>Registrador/a</option>
  <option value="Relacionista Público/a" <?php if ($mostrar['profesion'] == "Relacionista Público/a") { echo "selected"; } ?>>Relacionista Público/a</option>
  <option value="Restaurador/a de Arte" <?php if ($mostrar['profesion'] == "Restaurador/a de Arte") { echo "selected"; } ?>>Restaurador/a de Arte</option>
  <option value="Sociólogo/a" <?php if ($mostrar['profesion'] == "Sociólogo/a") { echo "selected"; } ?>>Sociólogo/a</option>
  <option value="Técnico/a Superior (en diversas especialidades como Radiología, Laboratorio, etc.)" <?php if ($mostrar['profesion'] == "Técnico/a Superior (en diversas especialidades como Radiología, Laboratorio, etc.)") { echo "selected"; } ?>>Técnico/a Superior (en diversas especialidades como Radiología, Laboratorio, etc.)</option>
  <option value="Topógrafo/a" <?php if ($mostrar['profesion'] == "Topógrafo/a") { echo "selected"; } ?>>Topógrafo/a</option>
  <option value="Traductor/a Jurado/a" <?php if ($mostrar['profesion'] == "Traductor/a Jurado/a") { echo "selected"; } ?>>Traductor/a Jurado/a</option>
  <option value="Terapeuta Ocupacional" <?php if ($mostrar['profesion'] == "Terapeuta Ocupacional") { echo "selected"; } ?>>Terapeuta Ocupacional</option>
  <option value="Urbanista" <?php if ($mostrar['profesion'] == "Urbanista") { echo "selected"; } ?>>Urbanista</option>
  <option value="Vestuarista" <?php if ($mostrar['profesion'] == "Vestuarista") { echo "selected"; } ?>>Vestuarista</option>
</select>
    </div>

      <div class="form-group">
	  <label for="">HCM:</label>
	        <select name="hcm" required>
          <option value="">-- Seleccione un HCM --</option>
                    <?php 
             if ($comprobacion_hcm > 0) {
             while($mostrar3=mysqli_fetch_array($queryhcm)){
              ?>
              <option value="<?php echo $mostrar3['id']; ?>" <?php if ($mostrar3['id'] == $escogido) {
              	echo "selected";
              } ?>><?php echo $mostrar3['nombre_lugar']; ?></option>
              <?php      
                    }
                  }
           ?>
      </select>
      </div>

      <div class="form-group">
	  <label for="">Dirección:</label>
	  <input type="text" name="direccion" minlength="4" maxlength="50" value="<?php echo $mostrar['direccion']; ?>" required>
      </div>



      <div class="form-group">
	  <label for="">Invitado por:</label>
	  <input type="text" class="letters-only" name="invitado" minlength="3" maxlength="15" value="<?php echo $mostrar['invitado_por']; ?>"  required>
      </div>


      <div class="form-group">
	  <label for="">Estatus:</label>
	  <select name="estatus" required>
	  	<option value="">-- Seleccione un estatus --</option>
	  	<option value="Activo" <?php if ($mostrar['estatus'] == "Activo") {
                	echo "selected";
                } ?>>Activo</option>
	  	<option value="Inactivo" <?php if ($mostrar['estatus'] == "Inactivo") {
                	echo "selected";
                } ?>>Inactivo</option>
	  	<option value="Ausente" <?php if ($mostrar['estatus'] == "Ausente") {
                	echo "selected";
                } ?>>Ausente</option>
	  	<option value="De viaje" <?php if ($mostrar['estatus'] == "De viaje") {
                	echo "selected";
                } ?>>De viaje</option>
	  	<option value="Enfermo" <?php if ($mostrar['estatus'] == "Enfermo") {
                	echo "selected";
                } ?>>Enfermo</option>
	  </select>
      </div>


       <div class="form-options">
      <button name="btneditar" type="submit"> <i class="fas fa-save"></i> Guardar </button>

                </div>

            </div>
      </div>
	</form>
        </div>
	<?php
}

elseif ($_POST['btnopcion'] == "Consolidar") {

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
            <a href="seguimiento.php"><i class="fas fa-arrow-left"></i></a>
            </div>

        <?php

	         $queryministerios = mysqli_query($conn,"SELECT * FROM ministerios");
             $comprobacion_ministerios = mysqli_num_rows($queryministerios);
             $_SESSION['nuevo'] = $id[0];
	?>
	
    <div class="form-container">
    <h1 align="center">Consolidar</h1>
	<form method="post" action="nuevo_consolidar.php">
        <div class="slider">
        <div class="slide active"> 

     <div class="form-group">
	 <label for="">Nombre:</label>
	 <input type="text" value="<?php echo $mostrar['nombres']; ?>" readonly>
     </div>

     <div class="form-group">
	 <label for="">Apellido:</label>
	 <input type="text" value="<?php echo $mostrar['apellidos']; ?>" readonly>
     </div>

     <div class="form-group">
	 <label for="">Fecha de nacimiento</label>
	 <input type="text" value="<?php echo $mostrar['edad']; ?>" readonly>
     </div>

     <div class="form-group">
	 <label for="">cedula</label>
	 <input type="text" value="<?php echo $mostrar['cedula']; ?>" readonly>
     </div>

      <div class="form-group">
	  <label for="">telefono:</label>
	  <input type="text" value="<?php echo $mostrar['telefono']; ?>" readonly>
      </div>

      <div class="form-group">
	  <label for="">fecha de registro</label>
	  <input type="text" value="<?php echo $mostrar['fecha']; ?>" readonly>
      </div>

      <div class="form-group">
	  <label for="">Género:</label>
	  <input type="text" value="<?php echo $mostrar['sexo']; ?>" readonly>
      </div>

      <div class="form-group">
	  <label for="">HCM:</label>
	  <input type="text" value="<?php 

	  $queryhcm = mysqli_query($conn,"SELECT * FROM nuevos INNER JOIN hcm_asignado_nuevo ON nuevos.id= hcm_asignado_nuevo.id_usuario INNER JOIN hcm ON hcm.id = hcm_asignado_nuevo.id_hcm  WHERE nuevos.id= $id[0]");
                while($mostrar2=mysqli_fetch_array($queryhcm)){
                    echo $mostrar2['nombre_lugar'];
                    $_SESSION['hcm'] = $mostrar2['id'];
                }


	?>
	" readonly>
        </div>

      <div class="form-group">
	  <label for="">ocupación</label>
	  <input type="text" value="<?php echo $mostrar['ocupacion']; ?>" readonly>
      </div>

      <div class="form-group">
	  <label for="">profesión:</label>
	  <input type="text" value="<?php echo $mostrar['profesion']; ?>" readonly>
      </div>

      <div class="form-group">
	  <label for="">dirección:</label>
	  <input type="text" value="<?php echo $mostrar['direccion']; ?>" readonly>
      </div>

      <div class="form-group">
	  <label for="">invitado por:</label>
	  <input type="text" value="<?php echo $mostrar['invitado_por']; ?>" readonly>
      </div>

      <div class="form-group">
	  <label for="">Estatus: </label>
	  <input type="text" value="<?php echo $mostrar['estatus']; ?>" readonly>
      </div>

      <div class="form-group">
	  <label>Ministerio</label>
          <select name="txtministerio[]" multiple required>
          <option value="">-- Seleccione un Ministerio --</option>
          <?php
             if ($comprobacion_ministerios > 0) {
             $i=1; 
             while($mostrar3=mysqli_fetch_array($queryministerios)){
              ?>
              <option value="<?php echo $mostrar3['id']; ?>"><?php echo $mostrar3['departamentos']; ?></option>
              <?php      
                    }
                  }
           ?>
      </select>
      </div>

      <div class="form-options">
      <button type="submit">Consolidar</button>
      </div>
                </div>
            </div>
	</form>
        </div>
	<?php
}

else
{
	echo "fallo";
}

}

else
{
	header('location:seguimiento.php');
}

 ?>

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
else
{
	header('Location:../index.php');
}

 ?>