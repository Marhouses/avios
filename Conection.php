<?php 
	class Conexion{
		public function conectar()
		{
			 $host ="localhost";
			 $user ="root";
			 $pass ="";
			 $db="n260m_23927797_prueb";
			$conn = new mysqli ($host,$user,$pass, $db) or die ("problem with conection with server");
			mysqli_select_db($conn,$db) or die("problem with selection Database");
			return $conn;
		}
	}

 ?>