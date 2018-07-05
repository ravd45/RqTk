<?php 
session_start();
include '../include/conectardb.php';
$idReq = $_POST['folio']; 
$comentario = $_POST['comentario'];
$comentarioT = $_POST['comentarioT'];
date_default_timezone_set('America/Mexico_city');
$fecha = date("Y-m-d  H:i:s");

//echo $idReq; die();

$sql="SELECT fechaResuelto, fechaProceso FROM reqGestion where idreqGestion = ".$idReq.";";
$info=mysqli_query($conn, $sql);

while($row = $info->fetch_assoc()) {
	$fr = $row['fechaResuelto'];
	$fp = $row['fechaProceso'];

	if($comentarioT != NULL){
		$comentarioTania = "UPDATE reqGestion SET comentarioTan = '".$comentarioT."' WHERE idreqGestion = ".$idReq.";";
		if(!$inserta = mysqli_query($conn, $comentarioTania)){
			echo $inserta;
			//echo "<script language='javascript'>window.location='../index.php';</script>";
			} else{

				echo "<script language='javascript'>window.location='../index.php';</script>";

		}
	}else{

	if($fp != NULL){
		if ($fr !=NULL) {

		} else {

			$actualizaR ="UPDATE reqGestion SET fechaResuelto = '".$fecha."', idEstatus = 3, comentario = '".$comentario."' WHERE idreqGestion = ".$idReq.";";
			if(!$insercion = mysqli_query($conn, $actualizaR)){
				echo "<script language='javascript'>window.location='../index.php';</script>";
			} else{

				echo "<script language='javascript'>window.location='../index.php';</script>";
			}
		}
	}else {
		$actualizaP ="UPDATE reqGestion SET fechaProceso ='".$fecha."', idEstatus = 2 WHERE idreqGestion = ".$idReq.";";
		if(!$insercion = mysqli_query($conn, $actualizaP)){
			echo "<script language='javascript'>window.location='../index.php';</script>";
		} else{

			echo "<script language='javascript'>window.location='../index.php';</script>";
			
		}
	}
}
}
?>