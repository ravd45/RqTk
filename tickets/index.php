<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="refresh" content = "70" />
	<title>Tickets</title>
	<link rel="stylesheet" href="css/materialize.min.css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<body>

		<?php
		/* Empezamos la sesión */
		session_start();
		/* Creamos la sesión */ 
		/* Si no hay una sesión creada, redireccionar al index. */
    if(!isset($_SESSION['admin'])) { // Recuerda usar corchetes.
    	echo "<script language='javascript'>window.location='login.php';</script>";
   } // Recuerda usar corchetes
   ?>

   <? include 'scripts/header.php'; ?>

   <div id="recluta" class="col s12"><? include 'scripts/peticionRecluta.php';?></div>
   <div id="gestion" class="col s12"><? include 'scripts/peticionGestion.php';?></div>
   <div id="oskme" class="col s12"><? include 'scripts/peticionOskme.php';?></div>
   <div id="otros" class="col s12"><? include 'scripts/peticionOtros.php';?></div>
   <div id="result" class="col s12"><? include 'scripts/results.php';?>s</div>

   <script src ="js/jQuery.js"></script>
   <script src="js/materialize.min.js"></script>
   <script>
   	$(document).ready(function() {
   		$('select').material_select();
   	});

   </script>

   <script type="text/javascript">
   	window.onload=function(){
   		<?php
   		$e=$_GET['e'];
   		if(isset($e)){
   			if($e==1){
   				echo"Materialize.toast('Ticket generado existosamente', 3000, 'rounded green');";
   			}
   			if($e==0){
   				echo"Materialize.toast('Error al generar el Ticket', 3000, 'rounded red');";
   			}if($e==5){
               echo"Materialize.toast('Archivo cargado correctamente', 3000, 'rounded purple');";
            }
   		}
   		?>
   	}
   </script>
   <script type="text/javascript">
   	$(document).ready(function(){
   		$('.sidenav').sidenav();
   	});

   </script>

</body>
</html>