<?php 
    //session_start();
  if(!$_SESSION["valida"]){
    header("location: index.php?action=Login");

    exit();
  }
 ?>
<form method="POST">
  <link rel="shortcut icon" href="https://scontent.fntr6-1.fna.fbcdn.net/v/t1.0-9/42586376_270370240255533_2572685912815173632_n.jpg?_nc_cat=108&_nc_ht=scontent.fntr6-1.fna&oh=8d7d3d9fc0e1f5a427426f7dc47933da&oe=5CB3A4FF">

      <label for=''>Style</label><br>
      <input type="number" name="style" placeholder="Write the style"><br>

      <label for=''>Length</label><br>
      <input type="text" name="lenght" placeholder="Write the lenght"><br>
<br><br>Write the Units for each Length<br><br>
      <label for=''>XS</label><br>
      <input type="number" name="xs" ><br>

      <label for=''>S</label><br>
      <input type="number" name="s" ><br>
      <label for=''>M</label><br>
      <input type="number" name="m" ><br>
      <label for=''>L</label><br>
      <input type="number" name="l" ><br>
      <label for=''>XL</label><br>
      <input type="number" name="xl" ><br>
      <label for=''>XXL</label><br>
      <input type="number" name="xxl"><br>
      <label for=''>3X</label><br>
      <input type="number" name="xxx" ><br>
      <label for=''>4X</label><br>
      <input type="number" name="xxxx"   ><br>
      <label for=''>5X</label><br>
      <input type="number" name="xxxxx" ><br>
      <label for=''>Total</label><br>
      <input type="number" name="total" placeholder="Write the total"><br>

<input type="submit" name="newLenght" value="Add">
</form>
<?php 
  $objinsert = new Controller();
  $objinsert->insertLenghtController();
  ?>
