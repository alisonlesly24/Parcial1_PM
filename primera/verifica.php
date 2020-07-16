<?php 

require 'conexion.php';
session_start();

$usuario = $_POST['usuario']; 
$clave = $_POST['contraseña'];

$q= "SELECT COUNT(*) as contar FROM usuario u, identificador i where u.ci= '$usuario' and u.contraseña = '$clave' and u.ci=i.ci" ;
$color="SELECT color FROM identificador where ci='$usuario'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

$_SESSION['usuario']=$usuario;


if($array['contar']>0 ){
	
	
	header("location:./pagina.php");


}
else
{
	echo "datos incorrectos";
}
 ?>
