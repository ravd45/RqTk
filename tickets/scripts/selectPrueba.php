<?php
include 'include/conectardb.php';

$sqlOskme="SELECT rr.idreqRecluta, rr.emailCliente, rr.fecha, rr.idEstatus, u.nombre, cr.tipoPeticion, rr.descripcion, ce.estatus,rr.fechaProceso, rr.fechaResuelto, rr.comentarios, cet.etapa FROM reqRecluta rr
INNER JOIN usuario u on u.idUsuario = rr.idUsuario
INNER JOIN catalogoEtapa cet on cet.idcatalogoEtapa = rr.etapa
INNER JOIN catalogoEstatus ce on ce.idcatalogoEstatus = rr.idEstatus
INNER JOIN catalogoRecluta cr on cr.idcatalogoRecluta = rr.tipoPeticion ";
$info=mysqli_query($conn, $sqlOskme);

$fila = 0;
$listaFolio = array();
echo" <div class='row '>";
while ($row = $info->fetch_assoc()) {
	$fila++;
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
	$etapa = $row['etapa'];

	$arreglo = array_push($listaFolio, $folio);
}

for ($i=0; $i <$fila ; $i++) { 
	echo $listaFolio[$i] . " ";
}
echo "<br>";
echo $listaFolio[1];
echo"</div>";


?>