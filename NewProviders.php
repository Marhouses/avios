<?php 
  //session_start();
  if(!$_SESSION["valida"]){
    header("location: index.php?action=Login");

    exit();
  }
 ?>
 <html lang="en">
<form method="POST">

	<link rel="shortcut icon" href="https://scontent.fntr6-1.fna.fbcdn.net/v/t1.0-9/42586376_270370240255533_2572685912815173632_n.jpg?_nc_cat=108&_nc_ht=scontent.fntr6-1.fna&oh=8d7d3d9fc0e1f5a427426f7dc47933da&oe=5CB3A4FF">

<label>ID Style:</label>
					<input type='number' name='style'  placeholder="Write the style" >

<label >Origin:</label>
					<input type='text' name='origin' placeholder="Write the origin" >

					<label >Units:</label>
					<input type='number' name='units'  placeholder="Write the units" >



<input type="submit" name="newProvider" value="Add">
</form>
<?php 
  $objinsert = new Controller();
  $objinsert->insertProviderController();
  ?>