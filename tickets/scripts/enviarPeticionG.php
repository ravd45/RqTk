<?php 
include '../include/conectardb.php';
date_default_timezone_set('America/Mexico_city');

$fecha = date("Y-m-d  H:i:s");

$descripcion = $_POST['descripcion'];
$id = $_POST['idUsuario'];

	$insertarPeticion = "INSERT INTO reqGestion (descripcion, fecha, idUsuario) VALUES ('".$descripcion."','".$fecha."',".$id.");";

if(!$insercion = mysqli_query($conn, $insertarPeticion)){
	
	echo "<script language='javascript'>window.location='../index.php?e=0';</script>";
} else{

	echo "<script language='javascript'>window.location='../index.php?e=1';</script>";

	echo"Materialize.toast('Ticket agregado exitosamente', 3000, 'rounded');";
}

?>