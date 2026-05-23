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
   <br><br>


 <a class="boton" href="index.php?action=NewOrder" style="border: 1px solid #2e518b; /*anchura, estilo y color borde*/
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
    margin: 0;" >New Order</a>
<br>
<br>

<br>

  <thead>
    <tr>
      <link rel="shortcut icon" href="https://scontent.fntr6-1.fna.fbcdn.net/v/t1.0-9/42586376_270370240255533_2572685912815173632_n.jpg?_nc_cat=108&_nc_ht=scontent.fntr6-1.fna&oh=8d7d3d9fc0e1f5a427426f7dc47933da&oe=5CB3A4FF">
      <th class=id scope="col">#</th>
      <th class=style scope="col">Style</th>
      <th class=client scope="col">Client</th>
      <th class=cut scope="col">Cut</th>
      <th class=date scope="col">Date</th>
      <th class=po scope="col">P.O</th>
      <th class=description scope="col">Description</th>
      <th class=units scope="col">Units</th>
      <th class=fabric scope="col">Fabric</th>
      <th class=color scope="col">Color</th>
    </tr>
  </thead>
  <tbody>
<form method="POST">
<input type="text" name="look">
<input type="submit" name="search" value="search">
</form> 
<form method="POST"> 
<select name="camps">
  <option value="id">id</option>
  <option value="style">style</option>
  <option value="clients">clients</option>
  <option value="cut">cut</option>
  <option value="dat">date</option>
  <option value="po">po</option>
  <option value="descript">description</option>
  <option value="units">units</option>
  <option value="fabric">fabric</option>
  <option value="color">options</option>
</select>
<input type="submit" name="orderb">

</form> 

    <?php 
	$order = new Controller();
	$order->OrderViewSearchController();

  $order2 = new Controller();
  $order2->OrderViewSearch2Controller();


 ?>
  </tbody>
</table>
 