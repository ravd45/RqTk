<?php 
include 'include/conectardb.php';

$sqlOskme="SELECT rr.idreqRecluta, rr.emailCliente, rr.fecha, rr.idEstatus, u.nombre, cr.tipoPeticion, rr.descripcion, ce.estatus,rr.fechaProceso, rr.fechaResuelto, rr.comentarios,rr.comentarioTan, cet.etapa, rr.archivo FROM reqRecluta rr
INNER JOIN usuario u on u.idUsuario = rr.idUsuario
INNER JOIN catalogoEtapa cet on cet.idcatalogoEtapa = rr.etapa
INNER JOIN catalogoEstatus ce on ce.idcatalogoEstatus = rr.idEstatus
INNER JOIN catalogoRecluta cr on cr.idcatalogoRecluta = rr.tipoPeticion ORDER BY rr.idreqRecluta DESC;";
$info=mysqli_query($conn, $sqlOskme);

$cont = 0;
echo" <div class='row'>";
while ($row = $info->fetch_assoc()) {
	$folio = $row['idreqRecluta'];
	$descripcion = $row['descripcion'];
	$emailCliente = $row['emailCliente'];
	$peticion = $row['tipoPeticion'];
	$fecha = $row['fecha'];
	$nombre = $row['nombre'];
	$status = $row['idEstatus'];
	$estatus = $row['estatus'];
	$fechaP = $row['fechaProceso'];
	$fechaT = $row['fechaResuelto'];
	$comentario = $row['comentarios'];
	$comentarioT = $row['comentarioTan'];
	$etapa = $row['etapa'];
	$cont++;
	$archivo = $row['archivo'];

	echo"   <div class='col m4'>
	<div class='card '>
	<div class='card-content'>";

	switch ($status) {
		case 1:
		if ($nombre == "Sandra Salazar"){
		echo"<span class='card-title blue'>Rec-".$folio."N </span>";
	}else{
	echo"<span class='card-title red'>Rec-".$folio."N </span>";
}
		if($_SESSION['idUsuario']==1){
			echo" 
			<form method='POST' action='scripts/botonRecluta.php'>
			<input type='number' value='".$folio."' style='display: none;' name='folio'>	
			<button class='btn-floating btn-small waves-effect waves-light lime accent-3' type='submit' name='action'>
			<i class='material-icons right'>done</i>
			</button>
			</form>";
		}
		if ($comentarioT == NULL) {
			if ($_SESSION['idUsuario']==6) {
			echo"	
			<form method='POST' action='scripts/botonRecluta.php'>
			<input type='number' value='".$folio."' style='display: none;' name='folio'>
			<i class='material-icons prefix'>comment</i>
									<label for='icon_prefix'>Comentario</label>
			<input type='text' name='comentarioT'>
			<button class='btn-floating btn-small waves-effect waves-light teal accent-3' type='submit' name='action'>
			<i class='material-icons right'>comment</i>
			</button>
			</form>";
		}
		}
		
		break;

		case 2:

		echo"<span class='card-title orange'>Rec-".$folio."N </span>";
		if($_SESSION['idUsuario']==1){

			echo"	
			<form method='POST' action='scripts/botonRecluta.php'>
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
			<form method='POST' action='scripts/botonRecluta.php'>
			<input type='number' value='".$folio."' style='display: none;' name='folio'>
			<i class='material-icons prefix'>comment</i>
									<label for='icon_prefix'>Comentario</label>
			<input type='text' name='comentarioT'>
			<button class='btn-floating btn-small waves-effect waves-light teal accent-3' type='submit' name='action'>
			<i class='material-icons right'>comment</i>
			</button>
			</form>";
		}
		}
		
		break;

		case 3:
		
		if ($comentarioT!=NULL) {
			echo"<span class='card-title teal accent-3 white-text'>Rec-".$folio."N </span>";
		}else{
		if ($comentario != NULL){
			echo"<span class='card-title purple white-text'>Rec-".$folio."N </span>";
		}else{
			echo"<span class='card-title green white-text'>Rec-".$folio."N </span>";
			if ($_SESSION['idUsuario']==6) {
			echo"	
			<form method='POST' action='scripts/botonRecluta.php'>
			<input type='number' value='".$folio."' style='display: none;' name='folio'>
			<i class='material-icons prefix'>comment</i>
									<label for='icon_prefix'>Comentario</label>
			<input type='text' name='comentarioT'>
			<button class='btn-floating btn-small waves-effect waves-light teal accent-3' type='submit' name='action'>
			<i class='material-icons right'>comment</i>
			</button>
			</form>";
		}
		}
	}

		break;
	}

	echo"
	<span class='blue-text'>Descripción: </span><span>".$descripcion."</span>
	<br>
	<span class='blue-text'>Cliente:</span>".$emailCliente."
	<br>
	<span class='blue-text'>Petición:</span>".$peticion."
	<br>
	<span class='blue-text'>Esfera:</span>".$etapa."
	<br>
	<span class='blue-text'>Usuario:</span>".$nombre."
	<br>";
	if ($archivo != NULL) {
	echo"<span class='blue-text'>Archivo:</span><a class='green-text' href='upload/$archivo'><i class='material-icons right'>attach_file</i>".$archivo."</a>
	<br>";
	}
	if($comentario != NULL){

		echo"<strong><span class='purple-text darken-4'>Comentario: </span>".$comentario."</strong>
		<br>";
	}
	if ($comentarioT != NULL) {
		echo"<strong><span class='teal-text darken-4'>Comentario: </span>".$comentarioT."</strong>";
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

if($idUsuario == 1){
	echo "	<script type='text/javascript'>
	ls = localStorage.getItem('nPeticionesR');

	if(".$cont." > ls){
		notificar();
		localStorage.setItem('nPeticionesR', '".$cont."');
	}

	if(".$cont." < ls){
		localStorage.setItem('nPeticionesR', '".$cont."');
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
				icon:'images/tOriginal.png',
				body:'Hay una nueva peticion en Otros ".$fecha."'
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