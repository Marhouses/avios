 <!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="styless.css">
    <meta charset="UTF-8">
  
    <link rel="shortcut icon" href="https://scontent.ftrc1-1.fna.fbcdn.net/v/t1.0-9/42586376_270370240255533_2572685912815173632_n.jpg?_nc_cat=108&_nc_ht=scontent.ftrc1-1.fna&oh=898a6a8d84935e3d48dc15020bb73546&oe=5D2A4BFF">
    <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
    
</head>   
<body>
  <div class="topnav" id="myTopnav">
    <a href="index.php" class="active">Home</a>
    <a  href="index.php?action=Order">Order</a>
    <a  href="index.php?action=Avios">AVIOS</a>
    <a  href="index.php?action=Lenght">Lenght</a>
    <a  href="index.php?action=OrderComplete">Order Complete</a>
    <a  href="index.php?action=MissingAvios">Missing Avios</a>
     <a  href="index.php?action=Providers">Providers</a>
    <a  href="index.php?action=Login">Login</a>
   
    <a class="active" href="index.php?action=Logout">Logout</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <ion-icon name="menu"></ion-icon>

    
  </div>
  
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>


    </body>
    </html> 