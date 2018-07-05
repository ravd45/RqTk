<?php 
include '../include/conectardb.php';
date_default_timezone_set('America/Mexico_city');

$fecha = date("Y-m-d  H:i:s");

$email = $_POST['correo'];
$opcion = $_POST['opcion'];
$esfera = $_POST['etapa'];
$descripcion = $_POST['descripcion'];
$id = $_POST['idUsuario'];
$user = "@idUsuario";
$gen = "@gen";


switch ($id) {
	case 1:
	$nombre = "Ing. Rubi Velazquez";
	break;
	case 2:
	$nombre = "Lic. Adaly Garcia";
	break;
	case 3:
	$nombre = "Lic. Sandra Salazar";
	break;
	case 4:
	$nombre = "Lic. Raymond Melgarejo";
	break;
	case 6:
	$nombre = "Lic. Tania Martinez";
	break;
}

switch ($esfera) {
	case 1: 
	$etapa = "Toprogrammer";
	break;
	
	case 2: 
	$etapa = "Datos Generales";
	break;
	
	case 3: 
	$etapa = "Psicometrico";
	break;
	
	case 5: 
	$etapa = "Espera de Aceptación";
	break;
	
	case 7: 
	$etapa = "Confirmados";
	break;
	
	case 10:
	$etapa = "Revisión";
	break;
	
	case 12:
	$etapa = "Espera de Documentos";
	break;
	
	case 15:
	$etapa = "Documentación";
	break;
}

$insertarPeticion = "INSERT INTO reqRecluta (tipoPeticion,descripcion,emailCliente,idUsuario,fecha, etapa) VALUES (".$opcion.",'".$descripcion."','".$email."',".$id.",'".$fecha."','".$esfera."');";


if($opcion == 1 || $opcion == 2){
	if($id==2 || $id==6){
		$insertarSql = "INSERT INTO results (result) VALUES ('INSERT INTO `trnetwork_reclutamiento`.`etapa_cliente` (`comentario`, `fecha`, `id_cliente`, `id_etapa`) VALUES (\'Se pasa a $etapa por solicitud $nombre\', \'$fecha\', $user , $esfera); <br> INSERT INTO `trnetwork_reclutamiento`.`pertenece_generacion` (`fecha`, `id_cliente`, `id_generacion`) VALUES (\'$fecha\', $user , $gen);')";
	}if ($id==3) {
		$insertarSql = "INSERT INTO results (result) VALUES ('INSERT INTO `trnetwork_reclutamiento`.`etapa_cliente` (`comentario`, `fecha`, `id_cliente`, `id_etapa`) VALUES (\'Se pasa a $etapa por solicitud $nombre\', \'$fecha\', $user , $esfera); <br> INSERT INTO `trnetwork_reclutamiento`.`pertenece_generacion` (`fecha`, `id_cliente`, `id_generacion`) VALUES (\'$fecha\', $user , $gen);')";
	}
}else{
	$insertarSql = "INSERT INTO results (result) VALUES ('$descripcion')";
}

if(!$insercion = mysqli_query($conn, $insertarPeticion) && $insertarSql = mysqli_query($conn, $insertarSql)){
	echo "<script language='javascript'>window.location='../index.php?e=0';</script>";
} else{

	echo "<script language='javascript'>window.location='../index.php?e=1';</script>";
	echo"Materialize.toast('Ticket agregado exitosamente', 3000, 'rounded');";
}

?>