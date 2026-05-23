<?php 
  //session_start();
  if(!$_SESSION["valida"]){
    header("location: index.php?action=Login");
    exit();
  }
 ?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">

    
    
</head>

<table class="table ">
  <br><br>


  <thead>
    <tr>
      <link rel="shortcut icon" href="https://scontent.fntr6-1.fna.fbcdn.net/v/t1.0-9/42586376_270370240255533_2572685912815173632_n.jpg?_nc_cat=108&_nc_ht=scontent.fntr6-1.fna&oh=8d7d3d9fc0e1f5a427426f7dc47933da&oe=5CB3A4FF">
      <th class=id scope="col">#</th>
}
      <th class=descript scope="col">Descript</th>
      
      <th class=totalsupplier scope="col">Total Supplier</th>
    
    </tr>
  </thead>
  <tbody>
    <?php 
	$order = new Controller();
	$order->MissViewController();
 ?>
  </tbody>
</table>
 