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
<label>Style</label>
<input type="number" placeholder="Write the style" name="style" >
<label>Client</label>
<input type="text" placeholder="Write the client for this style" name="client" >
<label>Cut</label>
<input type="text" placeholder="Write the cut for this style" name="cut" >
<label>Date</label>
<input type="Date" placeholder="Date of delivery" name="dat"  >
<label>PO</label>
<input type="number" placeholder="Write the garment number" name="po" >
<label>Descript</label>
<textarea placeholder="Write the status of samples" name="descript" cols="30" rows="5" ></textarea>
<label>Units</label>
<input type="number" placeholder="Write the number of units to be made in this style" name="units">
<label>Fabric</label>
<input type="text" placeholder="Write the garment fabric" name="fabric" >
<label>Color</label>
<input type="text" placeholder="Write the color of this garment fabric" name="color">


<input type="submit" name="neworder" value="Add">
</form>
<?php 
  $objinsert = new Controller();
  $objinsert->insertOrderController();
  ?>
