<?php 
include 'include/conectardb.php';

$sqlOskme="SELECT * FROM results ORDER BY idresults DESC;";
$info=mysqli_query($conn, $sqlOskme);

echo"<div class='row'>
 
        
";
while ($row = $info->fetch_assoc()) {
	$folio = $row['idresults'];
	$descripcion = $row['result'];
  $estado = $row['estado']; 
      echo "
 <table class='striped'>
<thead>
          <tr>
              <th></th>
          </tr>
        </thead>
    

        <tbody>
          <tr>
            <td>$descripcion</td>
          </tr>
        </tbody>
      </table>
            

";


    }
    echo"</div>";
    ?>