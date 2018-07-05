<div class="row">
	<br><br>	
	<div class="row">
			<div class="col m10 offset-m1">
	
		<!--<div class="row">
			<div class="col m10 offset-s1">-->
				<div class="card z-depth-5">
					<div class="card-content indigo-text darken-4">
						<div class="row">
							<form class="col m12" method="POST" action="scripts/enviarPeticionR.php">
							<div class="card ">
								<div class="input-field col m6">
									<i class="material-icons prefix">email</i>
									<label for="icon_prefix">Email de usuario</label>
									<input id="correo" type="email" class="validate" name="correo" required>
								</div>
								<div class="col m3">

									<div class="input-field col m12">
										<select name="opcion">
											<option id="opcion" value="1">Reactivación</option>
											<option id="opcion" value="2">Mover Usuario</option>
											<option id="opcion" value="3">Eliminar Intento</option>
											<option id="opcion" value="4">Eliminar Psicometrico</option>							
											<option id="opcion" value="5">Cambiar Tecnología</option>
											<option id="opcion" value="6">Modificar datos generales</option>
											<option id="opcion" value="7">Contraseña</option>
											<option id="opcion" value="8">Otros</option>


										</select>
										<label>Opción</label>
									</div>
								</div>

								<div class="col m3">

									<div class="input-field col m12">
										<select name="etapa">
											<option id="etapa" value="1">Toprogrammer</option>
											<option id="etapa" value="2">Datos Generales</option>
											<option id="etapa" value="3">Psicometrico</option>
											<option id="etapa" value="5">Espera de Aceptación</option>
											<option id="etapa" value="7">Confirmados</option>
											<option id="etapa" value="10">Revisión</option>
											<option id="etapa" value="12">Espera de Documentos</option>
											<option id="etapa" value="15">Documentación</option>
										</select>
										<label>Esfera</label>
									</div>
								</div>
								<div class="input-field col m10">
									<i class="material-icons prefix">description</i>
									<label for="icon_prefix">Descripción</label>
									<textarea id="descripcion" class="materialize-textarea" name="descripcion" required></textarea>
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
						</form>
						 <? include 'scripts/pruebas.php'; ?>
						</div>
					</div>
				</div>
			</div>
	

	</div>

</div>	

<? include 'scripts/tablaRecluta.php'; ?>




	<script type="text/javascript">
		$(document).ready(function(){
			$('.modal').modal();
		});
	</script>

