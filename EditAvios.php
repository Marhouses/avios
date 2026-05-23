<?php 
  //session_start();
  if(!$_SESSION["valida"]){
    header("location: index.php?action=Login");
    exit();
  }
 ?>
<form method="GET">
  
</form>

    <?php 
    $showby = new Controller();
    $showby->detailAviosController();

    ?>

    <?php 
       $insert =  new Controller();
    $insert->editAviosController();
     ?>
