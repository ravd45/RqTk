<div class="row">
			<br><br>
		<form class="col m12" method="POST" action="scripts/enviarPeticionOt.php">
			 <div class="row">
    <div class="col m10 offset-m1">
      <div class="card z-depth-5">
        <div class="card-content indigo-text darken-4">
			<div class="row">
				<div class="input-field col m10">
					<i class="material-icons prefix">description</i>
					<label for="icon_prefix">Descripción</label>
					 <textarea name="descripcion" class="materialize-textarea"></textarea>
				</div>
				
				<div class="col m2" style="text-align: center">
				<br>
				<button class="btn-floating btn-large waves-effect waves-light indigo darken-4" type="submit" name="action">
					<i class="material-icons right">done</i>
				</button>
			</div>
			<div class="col m12">
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
<? include 'scripts/tablaOtros.php';?>
