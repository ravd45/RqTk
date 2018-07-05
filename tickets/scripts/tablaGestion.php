<?php 
include 'include/conectardb.php';

$sqlGestion="SELECT rg.idreqGestion, rg.descripcion, rg.fecha, rg.idEstatus, u.nombre, ce.estatus, rg.fechaResuelto, rg.fechaProceso, rg.comentario from reqGestion rg
INNER JOIN usuario u on u.idUsuario = rg.idUsuario
INNER JOIN catalogoEstatus ce on ce.idcatalogoEstatus = rg.idEstatus ORDER BY rg.fecha DESC;";
$info=mysqli_query($conn, $sqlGestion);

echo" <div class='row'>";

$cont = 0;
while ($row = $info->fetch_assoc()) {
	$folio = $row['idreqGestion'];
	$descripcion = $row['descripcion'];
	$fecha = $row['fecha'];
	$fechaP = $row['fechaProceso'];
	$fechaT = $row['fechaResuelto'];
	$nombre = $row['nombre'];
	$status = $row['idEstatus'];
	$estatus = $row['estatus'];
	$comentario = $row['comentario'];
	$cont++;
	echo"   <div class='col m4'>
	<div class='card '>
	<div class='card-content'>";

	switch ($status) {
		case 1:

		echo"<span class='card-title red'>folio: #".$folio." </span>";
		if($_SESSION['idUsuario']==1){
			echo"
			<form method='POST' action='scripts/botonGestion.php'> 
			<input type='number' value='".$folio."' style='display: none;' name='folio'>	
			<button class='btn-floating btn-small waves-effect waves-light lime accent-3' type='submit' name='action'>
			<i class='material-icons right'>done</i>
			</button>
			</form>";

		}
		break;

		case 2:

		echo"<span class='card-title orange'>folio: #".$folio." </span>";
		if($_SESSION['idUsuario']==1){

			echo"
			<form method='POST' action='scripts/botonGestion.php'>	
			<input type='number' value='".$folio."' style='display: none;' name='folio'>
			<input type='text' name='comentario'>
			<button class='btn-floating btn-small waves-effect waves-light lime accent-3' type='submit' name='action'>
			<i class='material-icons right'>done_all</i>
			</button>
			</form>";

		}
		break;

		case 3:
		if ($comentario != NULL){
			echo"<span class='card-title purple white-text'>folio: #".$folio."A </span>";
		}else{
			echo"<span class='card-title green white-text'>folio: #".$folio."A </span>";
		}

		break;
	}
	echo"
	<span class='blue-text'>Descripción: </span><span>".$descripcion."</span>
	<br> 
	<span class='blue-text'>Usuario:</span>".$nombre."";
	if($comentario !=NULL){

		echo"	<strong><span class='purple-text'>Comentario:</span>".$comentario."</strong>
		<br>";
	}

	echo"	</div>
	<div class='card-action'>
	<span class='blue-text'>Fecha Petición: </span>".$fecha."
	<br>
	<span class='blue-text'>Fecha Proceso: </span>".$fechaP."
	<br>
	<span class='blue-text'>Fecha Finalizado: </span>".$fechaT."
	</div>
	</div>
	</div>";
}

echo"</div>";
if($idUsuario ==1 ){
	echo "	<script type='text/javascript'>
	ls = localStorage.getItem('nPeticionesG');

	if(".$cont." > ls){
		notificar();
		localStorage.setItem('nPeticionesG', '".$cont."');
	}

	if(".$cont." < ls){
		localStorage.setItem('nPeticionesG', '".$cont."');
	}
	

	document.addEventListener('DOMContentLoaded', function(){
		if(!Notification){

			alert('Las notigicaciones no se soportan en tu navegador!');
			return;

		}

		if(Notification.permission !== 'granted')
			Notification.requestPermission();
	});

	function notificar(){
		if (Notification.permission !== 'granted') {
			Notification.requestPermission();
		}else{
			var notification = new Notification('Tickets',
			{
				icon:'images/tGestion.png',
				body:'Hay una nueva peticion en Gestion ".$fecha."'
			}
		);

		notification.onclick = function (){
			window.open('http://trnetwork.com.mx/tickets');
		}
	}
}
</script>";
}
?>