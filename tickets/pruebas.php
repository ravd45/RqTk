 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="refresh" content = "70" />
  <title>Tickets</title>
  <link rel="stylesheet" href="css/materialize.min.css">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <body>
 <!-- Modal Trigger -->
  <a class="btn-floating indigo darken-2 waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons right">attach_file</i></a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Subir Archivo</h4>
      <? include 'include/upload.php';?>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

           <script src ="js/jQuery.js"></script>
   <script src="js/materialize.min.js"></script>
          <script>
            
 /* document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });*/

  // Or with jQuery

  $(document).ready(function(){
    $('.modal').modal();
  });
          
          </script>
   <script>
    $(document).ready(function() {
      $('select').material_select();
    });

   </script>

   <script type="text/javascript">
    window.onload=function(){
      <?php
      $e=$_GET['e'];
      if(isset($e)){
        if($e==1){
          echo"Materialize.toast('Ticket generado existosamente', 3000, 'rounded green');";
        }
        if($e==0){
          echo"Materialize.toast('Error al generar el Ticket', 3000, 'rounded red');";
        }
      }
      ?>
    }
   </script>
   <script type="text/javascript">
    $(document).ready(function(){
      $('.sidenav').sidenav();
    });

   </script>

</body>
</html>