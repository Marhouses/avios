<header>
			<?php 
			session_start();
			
				if (isset($_GET["action"])) {
					$enlaceController = $_GET["action"];
				}

				if($enlaceController == "Login")
				{

				}
				else if($_SESSION["usuario"] == "RiskDenimSystem")
				{
					include 'menu.php';
				}
				else if($_SESSION["usuario"] == "PurchasingAgent")
				{
					include 'menuU2.php';
				}
				else if($_SESSION["usuario"] == "InventoryManager")
				{
					include 'menuU3.php';
				}
			else if($_SESSION["usuario"] == "Engineering")
				{
					include 'menuU4.php';
				}
				else if($_SESSION["usuario"] == "MeasureAuditor")
				{
					include 'menuU5.php';
				}
			
				
		?>
		<link rel="shortcut icon" href="https://scontent.ftrc1-1.fna.fbcdn.net/v/t1.0-9/42586376_270370240255533_2572685912815173632_n.jpg?_nc_cat=108&_nc_ht=scontent.ftrc1-1.fna&oh=898a6a8d84935e3d48dc15020bb73546&oe=5D2A4BFF">
</header>
	<hr>
		<section>
			<?php 
			$objmvvc= new Controller();
			$objmvvc->paginaController();
			?>
		</section>