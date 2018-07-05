<?php 
include 'include/conectardb.php';

$sqlOskme="SELECT ro.idreqOskme, ro.descripcion, ro.emailCliente, ro.tipoPlan,ro.idEstatus, ro.fecha, u.nombre, ce.estatus, co.tipoPeticion, ro.fechaProceso, ro.fechaResuelto, ro.comentario, ro.comentarioTan FROM reqOskme ro
INNER JOIN usuario u on u.idUsuario = ro.idUsuario
INNER JOIN catalogoEstatus ce on ce.idcatalogoEstatus = ro.idEstatus
INNER JOIN catalogoOskme co on co.idcatalogoOskme = ro.tipoPeticion ORDER BY ro.fecha DESC";
$info=mysqli_query($conn, $sqlOskme);

$cont = 0;
while ($row = $info->fetch_assoc()) {
	$folio = $row['idreqOskme'];
	$descripcion = $row['descripcion'];
	$emailCliente = $row['emailCliente'];
	$plan = $row['tipoPlan'];
	$peticion = $row['tipoPeticion'];
	$fecha = $row['fecha'];
	$nombre = $row['nombre'];
	$status = $row['idEstatus'];
	$estatus = $row['estatus'];
	$fechaP = $row['fechaProceso'];
	$fechaR = $row['fechaResuelto'];
	$comentario = $row['comentario'];
	$comentarioT = $row['comentarioTan'];
	$cont++;

	echo"   <div class='col s4'>
	<div class='card '>
	<div class='card-content'>";

	switch ($status) {
		case 1:
		
		echo"<span class='card-title red'>Osk-".$folio."A </span>";
		if($_SESSION['idUsuario']==1){
			echo" 
			<form method='POST' action='scripts/botonOskme.php'>
			<input type='number' value='".$folio."' style='display: none;' name='folio'>	
			<button class='btn-floating btn-small waves-effect waves-light lime accent-3' type='submit' name='action'>
			<i class='material-icons right'>done</i>
			</button>
			</form>";

		}
		if ($comentarioT == NULL) {
		if ($_SESSION['idUsuario']==6) {
			echo"	
			<form method='POST' action='scripts/botonOskme.php'>
			<input type='number' value='".$folio."' style='display: none;' name='folio'>
			<i class='material-icons prefix'>comment</i>
									<label for='icon_prefix'>Comentario</label>
			<input type='text' name='comentarioT'>
			<button class='btn-floating btn-small waves-effect waves-light teal accent-3' type='submit' name='action'>
			<i class='material-icons right'>comment</i>
			</button>
			</form>";
		}
		break;

		case 2:
		
		echo"<span class='card-title orange'>Osk-".$folio."A </span>";
		if($_SESSION['idUsuario']==1){

			echo"	
			<form method='POST' action='scripts/botonOskme.php'>
			<input type='number' value='".$folio."' style='display: none;' name='folio'>
			<input type='text' name='comentario'>
			<button class='btn-floating btn-small waves-effect waves-light lime accent-3' type='submit' name='action'>
			<i class='material-icons right'>done_all</i>
			</button>
			</form>";

		}
		if ($comentarioT == NULL) {
		if ($_SESSION['idUsuario']==6) {
			echo"	
			<form method='POST' action='scripts/botonOskme.php'>
			<input type='number' value='".$folio."' style='display: none;' name='folio'>
			<i class='material-icons prefix'>comment</i>
									<label for='icon_prefix'>Comentario</label>
			<input type='text' name='comentarioT'>
			<button class='btn-floating btn-small waves-effect waves-light teal accent-3' type='submit' name='action'>
			<i class='material-icons right'>comment</i>
			</button>
			</form>";
		}
		break;

		case 3:
		if ($comentario != NULL){
			echo"<span class='card-title purple white-text'>Osk-".$folio."A </span>";
		}else{
			echo"<span class='card-title green white-text'>Osk-".$folio."A </span>";
		}

		break;
	}

	echo"
	<span class='blue-text'>Descripción: </span><span>".$descripcion."</span>
	<br>
	<span class='blue-text'>Petición:</span>".$peticion."
	<br>";

	if($emailCliente != NULL){
		echo"<span class='blue-text'>Cliente:</span>".$emailCliente."
		<br>";
	}
	if($plan !=NULL){
		echo"	<span class='blue-text'>Plan:</span>".$plan."
		<br>";
	}
	echo"<span class='blue-text'>Usuario:</span>".$nombre."";
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
	<span class='blue-text'>Fecha Finalizado: </span>".$fechaR."
	</div>
	</div>
	</div>";
}

echo"</div>";

if($idUsuario ==1){
	echo "	<script type='text/javascript'>
	ls = localStorage.getItem('nPeticionesO');

	if(".$cont." > ls){
		notificar();
		localStorage.setItem('nPeticionesO', '".$cont."');
	}
	
	if(".$cont." < ls){
		localStorage.setItem('nPeticionesO', '".$cont."');
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
				icon:'images/tOskme.png',
				body:'Hay una nueva peticion en Oskme ".$fecha."'
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
