<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Tickes</title>
	<link rel="stylesheet" href="css/materialize.min.css">
	 <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<style>
		background: "images/fondoTickets.jpg";
	</style>
<nav>
		<div class="nav-wrapper  indigo darken-4">
			<a href="#" class="brand-logo">TR Network</a>
		</div>
	</nav>
<header>


				<section class="contenedorLogin">
			
				<form action="scripts/iniciarSesion.php" method="POST">
		<div class="row">

<div class="col s12 card-panel white z-depth-2 ">
			
			<div class="col s12">
				<br><br><br>
			</div>

			<div class="col s6 offset-s3">
				<p >Correo</p>
			</div>

			<div class="col s6 center offset-s3">

			<input placeholder="example@example.com" id="request" type="text" class="validate" name="correo"> 

			</div>

			<div class="col s6 offset-s3">
				<p class="">Contraseña</p>
			</div>

			<div class="col s6 center offset-s3">

			<input placeholder="Contraseña" id="request" type="password" class="validate" name="password"> 

			</div>
			<div class="col s12">
				<br><br><br>
			</div>
</div>

		

			
			<div class="col s2 offset-s8">
				<button class="btn waves-effect waves-light purple" type="submit" name="action">Entrar
    			<i class="material-icons right">check_circle</i>
  				</button>
			</div>


		</div>
				</form>
				</section>
	</div>

	<script src ="js/jquery.js"></script>
	<script src="js/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
			    $(".button-collapse").sideNav();
			});
	</script>

	<script type="text/javascript">
			window.onload=function(){
				<?php
					$m=$_GET['m'];
					if(isset($m)){
						if($m==1){
						echo"Materialize.toast('Contraseña Erronea', 3000, 'rounded');";
						}
						if($m==0){
						echo"Materialize.toast('Usuario Invalido', 3000, 'rounded');";
						}
					}
				?>
			}
		</script>


	
</body>
</html>