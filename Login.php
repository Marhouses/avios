 <!DOCTYPE html>

<html>
    <head>
        
        <title class="title">RISK DENIM - System</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8">
        <meta name="system" content="width=device-width">
       <link rel="shortcut icon" href="https://scontent.ftrc1-1.fna.fbcdn.net/v/t1.0-9/42586376_270370240255533_2572685912815173632_n.jpg?_nc_cat=108&_nc_ht=scontent.ftrc1-1.fna&oh=898a6a8d84935e3d48dc15020bb73546&oe=5D2A4BFF">
        
    </head>
<body>

  
<div class=ind>
  <center>
      <img src="https://scontent.ftrc1-1.fna.fbcdn.net/v/t1.0-9/42586376_270370240255533_2572685912815173632_n.jpg?_nc_cat=108&_nc_oc=AQnrCEGkZIaK9Qf172zikMFdTcbjqyQ38zPOInrS80LQn36Du8Zn-4YLZkX8FwsyffE&_nc_ht=scontent.ftrc1-1.fna&oh=7fd6a66269b6099b9b73a0f4d33187b9&oe=5DA0F2FF" width="200" height="100" >
    </center>

<form method="POST">
             
           <center>
     <div class=index>
        <label for="">User</label><br>
	<input type="text" placeholder="user" name="usuario"><br>
	
	<label for="">Password</label><br>
	<input type="password" placeholder="password" name="clave"><br> <br>

	<input type="submit" value="Enter" name="Enter"class="boton"/>
  <br>



    </center>
  </div>
  </form>
  </div>
              

</body>

    
</html>

  <?php 
  $obj = new Controller();
  $obj ->loginUsuarioController();

 ?>