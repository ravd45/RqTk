<?php 
include '../include/conectardb.php';
date_default_timezone_set('America/Mexico_city');

$fecha = date("Y-m-d  H:i:s");

$email = $_POST['correo'];
$opcion = $_POST['opcion'];
$descripcion = $_POST['descripcion'];
$id = $_POST['idUsuario'];
$plan = $_POST['plan'];

	$insertarPeticion = "INSERT INTO reqOskme (descripcion, emailCliente, fecha, tipoPlan, tipoPeticion, idUsuario) VALUES ('".$descripcion."','".$email."','".$fecha."','".$plan."',".$opcion.",".$id.");";

if(!$insercion = mysqli_query($conn, $insertarPeticion)){
echo "<script language='javascript'>window.location='../index.php?e=0';</script>";
} else{

	echo "<script language='javascript'>window.location='../index.php?e=1';</script>";

	echo"Materialize.toast('Ticket agregado exitosamente', 3000, 'rounded');";
}

?>