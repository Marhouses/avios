<?php   //session_start();
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
  
 <a class="boton" href="index.php?action=NewProviders" style="border: 1px solid #2e518b; /*anchura, estilo y color borde*/
padding: 10px; /*espacio alrededor texto*/
background-color: #2e518b; /*color botón*/
color: #ffffff; /*color texto*/
text-decoration: none; /*decoración texto*/
text-transform: uppercase; /*capitalización texto*/
font-family: 'Helvetica', sans-serif; /*tipografía texto*/
border-radius: 50px; /*bordes redondos*/ margin: 30px auto;
  width: 600px; display: flex;
  margin-left: 100px;

  width: 100%; cursor: pointer;border: 1px solid #FAFAFA;
    left: 100px;
    margin: 0;" >New Provider</a>
<br><br><br>

  <thead>
    <tr>
      <link rel="shortcut icon" href="https://scontent.fntr6-1.fna.fbcdn.net/v/t1.0-9/42586376_270370240255533_2572685912815173632_n.jpg?_nc_cat=108&_nc_ht=scontent.fntr6-1.fna&oh=8d7d3d9fc0e1f5a427426f7dc47933da&oe=5CB3A4FF">
      <th class=id scope="col">#</th>
      <th class=style scope="col"> Style</th>
      <th class=origin scope="col">Origin</th>
        <th class=units scope="col"> Units</th>
     
    </tr>
  </thead>
  <tbody>
    <?php 
	$style= new Controller();
	$style->ProviderViewController();
 ?>
  </tbody>
</table>
 