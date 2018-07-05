<?php 
include 'include/conectardb.php';

$sqlUsuario = "SELECT * from tickets.usuario;";
//$sqlUsuario = "SELECT * FROM usuario where email = '".$usuario."';"
$info=mysqli_query($conn, $sqlUsuario);

while ($row = $info->fetch_assoc()) {
	$email = $row['email'];

	if($_SESSION['admin'] == $email){
		$nombre = $row['nombre'];
		$id = $row['idUsuario'];
		$_SESSION['usuario'] = $nombre;
		$_SESSION['idUsuario'] = $id;
	}
}


echo"<nav class='nav-extended'>
<div class='nav-wrapper grey lighten-3 indigo-text '>
	
<ul>
<li><img src='images/trnLogo1.png' style='width=35px; height:40px; margin-top:1em; margin-right:85%;'></li>
	<li  style=''; font-weight:old; font-size:25px;'>".$nombre."</li>
	<li><a href='login.php' ><i class='indigo-text material-icons prefix'>exit_to_app</i></a></li>
</ul>
</div>
<div class='nav-content indigo darken-4 '>
	<ul class='tabs tabs-transparent'>";

switch ($id) {
	case $id==1:
	echo" <li class='tab'><a href='#recluta'>Reclutamiento</a></li>";
	echo" <li class='tab'><a href='#gestion'>Gestion</a></li>";
	echo" <li class='tab'><a href='#oskme'>Oskme</a></li>";
	echo" <li class='tab'><a href='#otros'>Gerencia</a></li>";
	echo" <li class='tab'><a href='#result'>Result</a></li>";

	break;
	case $id==2:
	echo" <li class='tab'><a class='active' href='#recluta'>Reclutamiento</a></li>";
	echo" <li class='tab disabled'><a href='#gestion'>Gestion</a></li>";
	echo" <li class='tab disabled'><a href='#oskme'>Oskme</a></li>";
	echo" <li class='tab disabled'><a href='#result'>Otros</a></li>";
	echo"<li class='tab disabled'><a href='#otros'>Gerencia</a></li>";
	break;
	case $id==3:
	echo" <li class='tab'><a class='active' href='#recluta'>Reclutamiento</a></li>";
	echo" <li class='tab disabled'><a href='#gestion'>Gestion</a></li>";
	echo" <li class='tab disabled'><a href='#oskme'>Oskme</a></li>";
	echo" <li class='tab disabled'><a href='#result'>Otros</a></li>";
	echo"<li class='tab disabled'><a href='#otros'>Gerencia</a></li>";
	break;
	case $id==4:
	echo" <li class='tab'><a class='active' href='#recluta'>Reclutamiento</a></li>";
	echo" <li class='tab'><a href='#gestion'>Gestion</a></li>";
	echo" <li class='tab'><a href='#oskme'>Oskme</a></li>";
	echo" <li class='tab'><a href='#result'>Otros</a></li>";
	echo"<li class='tab disabled'><a href='#otros'>Gerencia</a></li>";
	break;
	case $id==5:
	echo" <li class='tab'><a class='active' href='#recluta'>Reclutamiento</a></li>";
	echo" <li class='tab'><a href='#gestion'>Gestion</a></li>";
	echo" <li class='tab'><a href='#oskme'>Oskme</a></li>";
	echo" <li class='tab'><a href='#result'>Otros</a></li>";
	echo"<li class='tab disabled'><a href='#otros'>Gerencia</a></li>";
	break;
	case $id==6:
	echo" <li class='tab'><a class='active' href='#recluta'>Reclutamiento</a></li>";
	echo" <li class='tab'><a href='#gestion'>Gestion</a></li>";
	echo" <li class='tab'><a href='#oskme'>Oskme</a></li>";
	echo" <li class='tab'><a href='#otros'>Gerencia</a></li>";
	echo" <li class='tab disabled'><a href='#result'>Otros</a></li>";	
	break;
	case $id==7:
	echo" <li class='tab disabled'><a href='#recluta'>Reclutamiento</a></li>";
	echo" <li class='tab disabled'><a href='#gestion'>Gestion</a></li>";
	echo" <li class='tab'><a class='active href='#oskme'>Oskme</a></li>";
	echo" <li class='tab disabled'><a href='#result'>Otros</a></li>";
	echo"<li class='tab disabled'><a href='#otros'>Gerencia</a></li>";
	break;
	case $id==8:
	echo" <li class='tab disabled'><a href='#recluta'>Reclutamiento</a></li>";
	echo" <li class='tab'><a class='active' href='#gestion'>Gestion</a></li>";
	echo" <li class='tab disabled'><a href='#oskme'>Oskme</a></li>";
	echo" <li class='tab disabled'><a href='#result'>Otros</a></li>";
	echo"<li class='tab disabled'><a href='#otros'>Gerencia</a></li>";
	break;

}

echo"      </ul>";
echo"    </div>";
echo"  </nav>";

?>