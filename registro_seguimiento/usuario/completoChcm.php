<?php 
session_start();
if(isset($_SESSION['id']) && $_SESSION['ident'] == 2)
{
include('../conexion.php');
$id = $_SESSION['id'];
$ident =$_SESSION['ident'];

$path = '../logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
$hcm= $_POST['hcm'];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>PDF generado</title>
 </head>
 <style>

:root {
      --color-bg: #ffffff;
      --color-title: #111827;
      --color-subtitle: #6b7280;
      --container-max-width: 1200px;
      --border-radius: 12px;
      --shadow-light: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: var(--color-bg);
      color: var(--color-title);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    .header-container {
      max-width: var(--container-max-width);
      margin: 2rem auto;
      padding: 1rem 2rem;
      background: var(--color-bg);
      border-radius: var(--border-radius);
      box-shadow: var(--shadow-light);
    }

    table.header-table {
      width: 100%;
      border-collapse: collapse;
    }

    table.header-table td {
      vertical-align: middle;
      padding: 0;
      border: none;
    }

    .header-image {
      width: 96px;
      height: 96px;
      border-radius: var(--border-radius);
      object-fit: contain;
      box-shadow: var(--shadow-light);
      background-color: #f3f4f6;
      padding: 0;
      margin: 0;
      display: block;
    }

    .header-text {
      text-align: center;
      padding-left: 1.5rem;
    }

    .header-title {
      font-weight: 700;
      font-size: 2.5rem; /* ~40px */
      line-height: 1.1;
      color: var(--color-title);
      margin: 0 0 0.25rem 0;
    }

    .header-subtitle {
      font-weight: 500;
      font-size: 1.125rem; /* 18px */
      color: var(--color-subtitle);
      margin: 0;
    }


       .formulario table {
    border-collapse: collapse;
    width: 100%;
    table-layout: fixed; /* Forzar tabla a ajustar sus columnas al ancho */
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  .formulario th, td {
    padding: 10px 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    /* Permitir texto en varias líneas */
    white-space: normal;
    overflow-wrap: break-word;
    word-break: break-word;
    vertical-align: top;
  }

  .formulario th {
    background-color: #f0f0f0;
    color: #333;
    font-weight: bold;
    font-size: 10px;
  }

  .formulario td {
    background-color: #fff;
    color: #333;
    font-size: 10px;
  }

  .formulario th:first-child, td:first-child {
    border-top-left-radius: 10px;
  }

  .formulario th:last-child, td:last-child {
    border-top-right-radius: 10px;
  }

 .formulario tr:hover td {
    background-color: #f9f9f9;
    transition: background-color 0.3s ease;
  }

  .formulario tr:nth-child(even) td {
    background-color: #f2f2f2;
  }



 </style>
 <body>
    <header class="header-container" role="banner" aria-label="Encabezado Ministerio">
    <table class="header-table" role="presentation" aria-hidden="true">
      <tr>
        <td style="width: 96px;">
          <img
            src="<?php echo $base64?>"
            alt="Logo Ministerio"
            class="header-image"
            />
        </td>
        <td class="header-text" style="width: calc(100% - 96px);">
          <h1 class="header-title">
            Ministerio Apostólico y Profético <br> &quot;Visión de Familia&quot;
          </h1>
          <p class="header-subtitle">Ministerio de Registro y Seguimiento</p>
        </td>
      </tr>
    </table>
  </header>
    <?php $querymostrar = mysqli_query($conn,"SELECT * FROM hcm WHERE id= '$hcm'");
        $hcmexacto= mysqli_fetch_array($querymostrar);
   ?>

    <h1 align="center">Registro de Creyentes Consolidados</h1>
    <h2 align="center">HCM: <?php echo $hcmexacto['nombre_lugar'];  ?></h2>

             <div class="formulario"> 
              <?php 
                $queryconsolidados = mysqli_query($conn,"SELECT *, consolidados.id AS consolidado_id FROM  consolidados INNER JOIN hcm_asignado_consolidado ON consolidados.id=hcm_asignado_consolidado.id_usuario WHERE hcm_asignado_consolidado.id_hcm='$hcm' ORDER BY MONTH(fecha), DAY(fecha)");
                $comprobacion_consolidados = mysqli_num_rows($queryconsolidados);
                    if ($comprobacion_consolidados > 0) {
                 ?>
             <table border="1">
                <tr>
                    <th>N°</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Cedula</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Género</th>
                    <th>Ocupación</th>
                    <th>Profesión</th>
                    <th>Dirección</th>
                    <th>Ministerio</th>
                    <th>HCM</th>
                    <th>Invitado por</th>
                    <th>Estatus</th>     
                </tr>
                <?php 

                $i=1; 
                while($mostrar2=mysqli_fetch_array($queryconsolidados)){

                 ?>
                <tr>
                    <td><?php echo "$i"; ?></td>
                    <td> <?php echo $mostrar2['nombres']; ?> </td>
                    <td> <?php echo $mostrar2['apellidos']; ?> </td>
                    <td>  <?php
                $Actualfecha = date('Y-m-d');
                $fechaRef = new DateTime($Actualfecha);
                // Supongamos que $mostrar2['edad'] contiene la fecha de nacimiento
                $fechaNac = new DateTime($mostrar2['edad']); // Asegúrate de que este campo contenga una fecha válida
                // Calcular la diferencia
                $diferencia = $fechaRef->diff($fechaNac);
                // Mostrar la edad
                echo $diferencia->y; 
                ?> </td>
                    <td> <?php echo $mostrar2['cedula']; ?> </td>
                    <td> <?php echo $mostrar2['telefono']; ?> </td>
                    <td> <?php echo $mostrar2['fecha']; ?> </td>
                    <td> <?php echo $mostrar2['sexo']; ?> </td>
                    <td> <?php echo $mostrar2['ocupacion']; ?> </td>
                    <td> <?php echo $mostrar2['profesion']; ?> </td>
                    <td> <?php echo $mostrar2['direccion']; ?> </td>
                    <td> 

                        <?php
                        //query que trae los datos con otras tablas a traves de los inner join on esto es para los ministerios
                     $queryministerio = mysqli_query($conn,"SELECT * FROM consolidados INNER JOIN ministerio_asignado ON consolidados.id= ministerio_asignado.id_usuario INNER JOIN ministerios ON ministerios.id = ministerio_asignado.id_ministerio  WHERE consolidados.id= {$mostrar2['consolidado_id']}");
                        
                        while($mostrar3=mysqli_fetch_array($queryministerio)){
                            
                         echo $mostrar3['departamentos'].", <br>"; 
                         
                     }

                         ?>
                            


                        </td>

                    <td>

                     <?php
                       echo $hcmexacto['nombre_lugar'];

                         ?>
                  </td>
                    <td> <?php echo $mostrar2['invitado_por']; ?> </td>
                    <td> <?php echo $mostrar2['estatus']; ?> </td>
                </tr>

                <?php 
                $i++;
                    }
                 ?>
            </table>
    </div>
            <?php
                }

                else
                      {
                        ?>
                        <h2 align="center">
                            <?php
                        echo "No hay registro de Consolidados";
                        ?>
                        </h2>
                        <?php
                      }
                       echo "Total de creyentes: $comprobacion_consolidados ";
                      ?>
 </body>
 </html>

 <?php }

        else
        {
            header('location:exportacion.php');
        }
  ?>