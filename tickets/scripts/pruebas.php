 
 <!-- Modal Trigger -->
 <a class='btn-floating indigo darken-2 waves-effect waves-light btn modal-trigger' href='#modal1'><i class='material-icons right'>attach_file</i></a>
  <!-- Modal Structure -->
  <div id='modal1' class='modal bottom-sheet'>
    <div class='modal-content'>
      <h4>Subir Archivo</h4>
     <!--  <?// include 'include/upload.php';?> -->
    <? include 'include/conectardb.php';
if (isset($_POST['adjunto'])) {   
    if(is_uploaded_file($_FILES['fichero']['tmp_name'])) { 
     
     
      // creamos las variables para subir a la db
        $ruta = "upload/"; 
        $nombrefinal= trim ($_FILES['fichero']['name']); //Eliminamos los espacios en blanco
        //$nombrefinal= ereg_replace (" ", "", $nombrefinal);//Sustituye una expresión regular
        $upload= $ruta . $nombrefinal;  



        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion      
                    echo "<script language='javascript'>window.location='index.php?e=5';</script>";

                   $nombre  = $_POST["nombre"]; 
                   $description  = $_POST["description"];   

        }  
    }  
 } 
?> 

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">  
    Seleccione archivo: <input name="fichero" type="file" size="150" maxlength="150">  
    <br> 
  <input name="adjunto" type="submit" value="SUBIR ARCHIVO">   
</form>

    </div>
    <div class='modal-footer'>
      <a href='#!' class='modal-close waves-effect waves-red btn-flat'>Salir</a>
    </div>
  </div>

           <script src ='js/jQuery.js'></script>
   <script src='js/materialize.min.js'></script>
          <script>
  $(document).ready(function(){
    $('.modal').modal();
  });
          
          </script>
  