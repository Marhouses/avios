<?php 
	class EnlacesModel
	{
		public function paginaModel($enlaceModel)
		{
			if ($enlaceModel == "Home" ||
				$enlaceModel == "Orders" ||
		        $enlaceModel == "Avios" ||
		        $enlaceModel == "Lenght" ||
		        $enlaceModel == "OrderComplete" ||
		       	$enlaceModel == "OrdersComplete"||
		       	$enlaceModel == "Providers"||
		       	$enlaceModel == "Login"||
		       	$enlaceModel == "Logout" ||
		        $enlaceModel == "Order"||
		        $enlaceModel == "NewOrder"||
		        $enlaceModel == "EditOrder"||
		        $enlaceModel == "newStyle"||
		        $enlaceModel == "EditStyle"||
		        $enlaceModel == "DeleteStyle"||
		         $enlaceModel == "NewAvios"||
		          $enlaceModel == "newLenght"||

		          $enlaceModel == "SearchByAvios"||

		          $enlaceModel == "export"||
 				$enlaceModel == "MissingAvios"||
				 $enlaceModel == "DelMiss"||
 $enlaceModel == "MissA"||
$enlaceModel == "DelOrders"||
 $enlaceModel == "EditOrdComp"||
 $enlaceModel == "OrdComp"||
 $enlaceModel == "DeleteOrdComp"||
		           $enlaceModel == "NewProviders"||
		            $enlaceModel == "DeleteAvios"||
		             $enlaceModel == "DeleteLenght"||
		              $enlaceModel == "DeleteProviders"||
		               $enlaceModel == "EditProviders"||
		                $enlaceModel == "EditAvios"||
		                 $enlaceModel == "EditLenght"||
		        $enlaceModel == "DeleteOrder"||
		    	$enlaceModel == "SearchByOrder") 
			{
				
				$seccion = "views/sections/".$enlaceModel.".php";
				return $seccion;
			}
		}
	}
 ?>