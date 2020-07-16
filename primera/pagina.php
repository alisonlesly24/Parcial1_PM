<?php 
require 'conexion.php';
session_start();
$ci=$_SESSION['usuario'];

$sql="SELECT * From identificador where ci=$ci";
$resultado=mysqli_query($conexion,$sql);
$mostrar=mysqli_fetch_array($resultado);


if(!empty($_GET['color_fondo'])){
 
	switch($_GET['color_fondo']){
		case 'white': $color = 'white'; break;
		case 'yellow': $color = 'yellow'; break;
		case 'green': $color = 'green'; break;
		
		
	}
 $cambiar="UPDATE identificador SET color='$color' where ci=$ci";


$res=mysqli_query($conexion,$cambiar);
}

$sql="SELECT * From identificador where ci=$ci";
$resultado=mysqli_query($conexion,$sql);
$mostrar=mysqli_fetch_array($resultado);

$_SESSION['color_fondo'] = $mostrar['color'];
$foto=$mostrar['foto'];


 ?>






<!DOCTYPE html>
<html>
<head>
	<title>Pagina Principal</title>
<link rel="stylesheet" type="text/css" href="estilop.css">	
<style type="text/css">
		<?php
			// Si la session no esta vacia, asigno con css el fondo
			// a la pagina.
			if(!empty($_SESSION['color_fondo'])){
				echo 'body {background:'.$_SESSION['color_fondo'].';}';
			}
		?>
	</style>
</head>

<body>
<header>

	<div class="header">
	<h1>Pagina Cambia fondo</h1>
	<div class="opcion">
	<span></span>
	
	<h2><span class="usua"> Bienvenido <?php echo $mostrar['NombreCompleto']; ?></span></h2>
<img class="imagen"  src="<?php echo $foto; ?>"    alt="usuario">
<form action="" method="GET">
	<select class="seleccion" name="color_fondo">
    <option  ></option>
    <option value="yellow" name="yellow">Amarillo</option>
    <option  value="green" name="green" >Verde</option>
    <option  value="white" name="white" >Blanco</option>
    <input type="submit" name="cambiar" value="cambiar">


	</select>
	</form>
	<a href="salir.php"><img class="close" src="salir.png" alt="Salir del sistema" title="Salir"></a>
	</div>	

	</div>

		
</header>




</body>
</html>