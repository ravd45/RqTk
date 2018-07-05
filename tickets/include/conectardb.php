<!-- MySQLi Objet-oriented -->
<?php
$servername = "148.240.124.97";
$username = "ticket";  
/*$servername = "127.0.0.1"
$username = "root"*/
$password = '62664';
$dbname = "tickets";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//else echo"Connected successfull";

?>
