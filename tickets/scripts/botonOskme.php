<?php 
session_start();
include '../include/conectardb.php';
$idReq = $_POST['folio']; 
$comentario = $_POST['comentario'];
date_default_timezone_set('America/Mexico_city');
$fecha = date("Y-m-d  H:i:s");

//echo $idReq; die();

$sql="SELECT fechaResuelto, fechaProceso FROM reqOskme where idreqOskme = ".$idReq.";";
$info=mysqli_query($conn, $sql);

while($row = $info->fetch_assoc()) {
	$fr = $row['fechaResuelto'];
	$fp = $row['fechaProceso'];

	if($fp != NULL){
		if ($fr !=NULL) {
			
		} else {
			
			$actualizaR ="UPDATE reqOskme SET fechaResuelto = '".$fecha."', idEstatus = 3, comentario = '".$comentario."' WHERE idreqOskme = ".$idReq.";";
			if(!$insercion = mysqli_query($conn, $actualizaR)){
				echo "<script language='javascript'>window.location='../index.php';</script>";
			} else{

				echo "<script language='javascript'>window.location='../index.php';</script>";
			}
		}
	}else {
		
		
		$actualizaP ="UPDATE reqOskme SET fechaProceso ='".$fecha."', idEstatus = 2 WHERE idreqOskme = ".$idReq.";";
		if(!$insercion = mysqli_query($conn, $actualizaP)){
			echo "<script language='javascript'>window.location='../index.php';</script>";
		} else{

			echo "<script language='javascript'>window.location='../index.php';</script>";
			
		}
	}
}
?>