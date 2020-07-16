

<?php 
require 'conexion.php';
session_start();

$categories = array();
$sql="SELECT lugarderesidencia ,COUNT(*) as Aprobados from identificador i, notasm n WHERE i.ci=n.ci AND n.nota>=51 GROUP by i.lugarderesidencia";

$resultado=mysqli_query($conexion,$sql);

$res=mysqli_query($conexion,$sql);

echo "<table border='1'>  ";
echo "<tr>";
echo "<td>coddep</td>";
while ( $fila = mysqli_fetch_array($resultado)) {

 echo "<td>" .$fila['lugarderesidencia']. "</td>" ;
 }
echo "</tr>";
echo "<tr>";
echo "<td>Aprobados</td>";
while ( $fi = mysqli_fetch_array($res)) {


   echo "<td>" .$fi['Aprobados']. "</td>" ;
  }

echo "</tr>";
  echo "</table>";  

?>