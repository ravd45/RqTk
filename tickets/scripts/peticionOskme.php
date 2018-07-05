<div class="row">
	<br><br>
	<form class="col s12" method="POST" action="scripts/enviarPeticionO.php">
		 <div class="row">
    <div class="col s10 offset-s1">
      <div class="card z-depth-5">
        <div class="card-content indigo-text darken-4">
			<div class="row">
			<div class="col s3">

				<div class="input-field col s12">
					<select name="opcion">
						<option id="opcion"  value="1">Cambiar plan usuario</option>
						<option id="opcion"  value="2">Activar / Reactivar Planes</option>
						<option id="opcion"  value="3">Cambios Página Oskme</option>
						<option id="opcion"  value="4">Otros</option>
					</select>
					<label>Opción</label>
				</div>
			</div>

			<div class='input-field col s6'>
				<i class='material-icons prefix'>email</i>
				<label for='icon_prefix'>Email de usuario</label>
				<input id='correo' name='correo' type='email' class='validate'>
			</div>

			<div class='col s3'>

				<div class='input-field col s12'>
					<select name='plan'>
						<option id='etapa' value='Gratis'>Gratis</option>
						<option id='etapa' value='PyME'>PyMES</option>
						<option id='etapa' value='Empresarial'>Empresarial</option>
					</select>
					<label>Plan</label>
				</div>
			</div>
			
			<div class="row">
				<div class="input-field col s10">
					<i class="material-icons prefix">description</i>
					<label for="icon_prefix">Descripción</label>
					<textarea name="descripcion" id="descripcion" class="materialize-textarea" required></textarea>
				</div>

				

        

				<div class="col s2" style="text-align: center">
					<br>
					<button class="btn-floating btn-large waves-effect waves-light indigo darken-4" type="submit" name="action">
						<i class="material-icons right">done</i>
					</button>
				</div>
				<div class="col s12">
					<?
					$idUsuario = $_SESSION['idUsuario'];
					echo"<input type='text' name='idUsuario' value='".$idUsuario."' style='display:none;'>";
					?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
		</form>
	</div>

	<form method="POST" action="scripts/botonOskme.php">
	<? include 'scripts/tablaOskme.php'; ?>
	</form>