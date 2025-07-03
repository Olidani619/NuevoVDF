<?php 
session_start();// Mantiene la sesion

session_destroy(); // Cierra la sesion

header("location: ../index.php") //Regresa a la pagina index.php
 ?>