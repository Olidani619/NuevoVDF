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
    <h1 align="center">Registro de Peticiones</h1>
    <?php 
            $querynuevos = mysqli_query($conn,"SELECT * FROM peticiones ORDER BY MONTH(fecha), DAY(fecha)");
             $comprobacion_nuevos = mysqli_num_rows($querynuevos);
            if ($comprobacion_nuevos > 0) {

                    

             ?>
             <div class="formulario"> 
            <table border="1">
                <tr>
                    <th>N°</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>cedula</th>
                    <th>Tipo de petición</th>
                    <th>Fecha</th>
                    <th>Descripción</th>
                </tr>
                <?php
                $i=1; 
                while($mostrar2=mysqli_fetch_array($querynuevos)){

                 ?>
                <tr>
                    <td><?php echo "$i"; ?></td>
                    <td> <?php echo $mostrar2['nombre']; ?> </td>
                    <td> <?php echo $mostrar2['apellido']; ?> </td>
                    <td> <?php echo $mostrar2['cedula']; ?> </td>
                    <td> <?php echo $mostrar2['tipo_peticion']; ?> </td>
                    <td> <?php echo $mostrar2['fecha']; ?> </td>
                    <td> <?php echo $mostrar2['descripcion']; ?></td>
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
                        echo "No hay registro de peticiones";
                        ?>
                        </h2>
                        <?php
                      }

                      echo "Total de peticiones: $comprobacion_nuevos ";
                ?>
 </body>
 </html>

 <?php }

        else
        {
            header('location:exportacion.php');
        }
  ?>