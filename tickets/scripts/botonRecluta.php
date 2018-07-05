<?php 
session_start();
include '../include/conectardb.php';
$idReq = $_POST['folio'];
//$comentario = $_POST['comentario'];
$comentarioT = $_POST['comentarioT'];
date_default_timezone_set('America/Mexico_city');
$fecha = date("Y-m-d  H:i:s");

//echo $idReq; die();

$sql="SELECT fechaResuelto, fechaProceso FROM reqRecluta where idreqRecluta = ".$idReq.";";
$info=mysqli_query($conn, $sql);

while($row = $info->fetch_assoc()) {
	$fr = $row['fechaResuelto'];
	$fp = $row['fechaProceso'];

	if($comentarioT != NULL){
		$comentarioTania = "UPDATE reqRecluta SET comentarioTan = '".$comentarioT."' WHERE idreqRecluta = ".$idReq.";";
		if(!$inserta = mysqli_query($conn, $comentarioTania)){
				echo "error: ". $comentarioTania;
			//echo "<script language='javascript'>window.location='../index.php';</script>";
			} else{

				echo "<script language='javascript'>window.location='../index.php';</script>";

		}
	}else{

		if($fp != NULL){
			if ($fr !=NULL) {

			} else {

				$actualizaR ="UPDATE reqRecluta SET fechaResuelto = '".$fecha."', idEstatus = 3, comentarios = '".$comentario."' WHERE idreqRecluta = ".$idReq.";";
				if(!$insercion = mysqli_query($conn, $actualizaR)){
					echo "<script language='javascript'>window.location='../index.php';</script>";
				} else{

					echo "<script language='javascript'>window.location='../index.php';</script>";
				}
			}
		}else {


			$actualizaP ="UPDATE reqRecluta SET fechaProceso ='".$fecha."', idEstatus = 2 WHERE idreqRecluta = ".$idReq.";";
			if(!$insercion = mysqli_query($conn, $actualizaP)){
				echo "<script language='javascript'>window.location='../index.php';</script>";
			} else{

				echo "<script language='javascript'>window.location='../index.php';</script>";

			}
		}
	}
}
?>