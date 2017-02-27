<?php
$servidor = "localhost";
$usuario = "root";
$password = "admin123";
$database = "mgasoluciones";

$conexion = mysqli_connect($servidor, $usuario, $password)or die(mysqli_error($conexion));
mysqli_select_db($conexion, $database)or die(mysqli_error($conexion));
?>

<?php
  
  $mysqli = new mysqli("localhost","root","admin123","mgasoluciones"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
  
  if(mysqli_connect_errno()){
    echo 'Conexion Fallida : ', mysqli_connect_error();
    exit();
  }
  


