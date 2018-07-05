<?php 
session_start();
include '../include/conectardb.php'; 
	$usuario=$_POST['correo'];
	$password=$_POST['password'];

$sqlAcceso= ("SELECT email, contrasenia FROM tickets.usuario;");

$info=mysqli_query($conn, $sqlAcceso); //el conn esta en conectardb, cambiar query para contraseña también


$correovald=0;
$passvald=0;


while (
	$row = $info->fetch_assoc()
	) {

if($usuario==$row['email']){ //si no pones ["algo"] el row no se converte en string
	$correovald=1;
	if($password==$row['contrasenia']){
		$passvald=1;
		

	}
}


}
if($correovald==1){
	if($passvald==1){		
		
		$_SESSION['admin'] =$usuario;
		echo "<script language='javascript'>window.location='../index.php';</script>";
}else{

		echo "<script language='javascript'>window.location='../login.php?m=1';</script>";

	}
}else{
	echo "<script language='javascript'>window.location='../login.php?m=0';</script>";
}
$conn->close();
?>