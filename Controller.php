<?php 

class Controller
{

	public function plantilla()
	{
		include 'views/template.php';
	}

	public function paginaController()
	{
		if (isset($_GET["action"])) {
			$enlaceController = $_GET["action"];
		}
		else
		{
			$enlaceController = "Home";
		}

		$respuesta = EnlacesModel::paginaModel($enlaceController);
		include $respuesta;
	}




	public function loginUsuarioController()
	{
		if (isset($_POST["Enter"])) {
			$datosController = array(
				"usuario" 	=> $_POST["usuario"],
				"clave" => $_POST["clave"]);
			$respuesta = Users::loginUsuarioModel($datosController, "username");
			var_dump($respuesta);
			if(($respuesta["usuario"] == $_POST["usuario"]) && ($respuesta["clave"] == $_POST["clave"])){
				
					//session_start();
				$_SESSION["valida"] = true;
				$_SESSION["usuario"] = $respuesta["usuario"];

 if($_SESSION["usuario"] == "RiskDenimSystem")
				{
				header ("location: index.php?action=Home");
				}
				else if($_SESSION["usuario"] == "PurchasingAgent")
				{
					header ("location: index.php?action=MissingAvios");
				}
				else if($_SESSION["usuario"] == "InventoryManager")
				{
				header ("location: index.php?action=Avios");
				}
			else if($_SESSION["usuario"] == "Engineering")
				{
				header ("location: index.php?action=Home");
				}
				else if($_SESSION["usuario"] == "MeasureAuditor")
				{
			header ("location: index.php?action=Lenght");
				}
				
			}
			else{
				
				echo "<script>
				alert('You have to write a correct user/password, try again');
				window.location= 'location: index.php?action=Login&error=true'
				</script>";

			}
		}
	}

	public function insertOrderController(){
		if (isset($_POST["neworder"])) {
			$dataController = array(
				"style" => $_POST["style"],
				"client" => $_POST["client"],
				"cut" => $_POST["cut"],
				"dat" => $_POST["dat"],
				"po" => $_POST["po"],
				"descript" => $_POST["descript"],
				"units" => $_POST["units"],
				"fabric" => $_POST["fabric"],
				"color" => $_POST["color"]);


if ($_POST["style"]=="" || $_POST["client"] ==""|| $_POST["cut"]=="" || $_POST["dat"] ==""|| $_POST["po"]=="" || $_POST["descript"]=="" || $_POST["units"]=="" || $_POST["fabric"]=="" || $_POST["color"]=="" )
{
	echo '<script>
                    alert("Needs completing all fields");
                    </script>'; 
   
}else{

$fecha = $_POST [ 'dat']; 
$anno =  date( 'Y', strtotime ($fecha));

//$anno>= 2019 && $anno <= 2022 && $_POST["style"] < 1 && $_POST["po"] < 1 && $_POST["units"] < 100 

if ($anno>= 2019 && $anno <= 2022 && $_POST["style"] >= 1 && $_POST["po"] > 1 && $_POST["units"] >= 100){

$respuesta = Orders::newOrder($dataController, "orders");
if($respuesta=="error"){echo '<script>
                    alert("The style already exist");
                    </script>'; }
                    else{
if ($respuesta == "success") {
//echo "insert correcto";
//header("location: index.php");
header("location: index.php?action=OrderComplete&msj=ok");
header("location: index.php?action=Order");
//var_dump($dataController);
}else{
echo "error: falla insert <br>";


var_dump($respuesta);

}
    
}
}else{
    echo '<script>
                    alert("Date should be between 2019 and 2022. Style Should be > 0. PO should be >0. Units Should be > 100");
                    </script>';
}

	}
}}



	
	public function OrderViewController(){
		$respuesta = Orders::OrderViews("orders");
		foreach ($respuesta as $row => $item) {
			echo '<tr>
			<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>
			<td>'.$item[3].'</td>
			<td>'.$item[4].'</td>
			<td>'.$item[5].'</td>
			<td>'.$item[6].'</td>
			<td>'.$item[7].'</td>
			<td>'.$item[8].'</td>
			<td>'.$item[9].'</td>

			<td><button><a href="index.php?action=EditOrder&id='.$item[0].'">Edit</a></td></button>
			<td><button><a href="index.php?action=DeleteOrder&id='.$item[0].'">Delete</a></td></button>
			<td><button><a href="index.php?action=OrdComp&id='.$item[0].'">Finish</a></td></button>
			</tr>';
		}
	}


	public function OrderViewSearchController(){
		if (isset($_POST["orderb"]))
		{
			$dato = $_POST["camps"];
			$respuesta = Orders::OrderSearchBy("orders", $dato);
			foreach ($respuesta as $row => $item) {
			echo '<tr>
			<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>
			<td>'.$item[3].'</td>
			<td>'.$item[4].'</td>
			<td>'.$item[5].'</td>
			<td>'.$item[6].'</td>
			<td>'.$item[7].'</td>
			<td>'.$item[8].'</td>
			<td>'.$item[9].'</td>

			<td><button><a href="index.php?action=EditOrder&id='.$item[0].'">Edit</a></td></button>
			<td><button><a href="index.php?action=DeleteOrder&id='.$item[0].'">Delete</a></td></button>
			<td><button><a href="index.php?action=OrdComp&id='.$item[0].'">Finish</a></td></button>
			</tr>';
		}
		}
		

		
	}
	public function OrderViewSearch2Controller(){
		if (isset($_POST["search"]))
		{
			$dato = $_POST["look"];
			$respuesta = Orders::OrderSearch("orders", $dato);
			foreach ($respuesta as $row => $item) {
			echo '<tr>
			<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>
			<td>'.$item[3].'</td>
			<td>'.$item[4].'</td>
			<td>'.$item[5].'</td>
			<td>'.$item[6].'</td>
			<td>'.$item[7].'</td>
			<td>'.$item[8].'</td>
			<td>'.$item[9].'</td>

			<td><button><a href="index.php?action=EditOrder&id='.$item[0].'">Edit</a></td></button>
			<td><button><a href="index.php?action=DeleteOrder&id='.$item[0].'">Delete</a></td></button>
			<td><button><a href="index.php?action=OrdComp&id='.$item[0].'">Finish</a></td></button>
			</tr>';
		}
		}
		

		
	}


	public function detailOrdersController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = Orders::detailOrdersModel($datosController, "orders");

			echo "

			<form method='POST' id='edit'>
			<label for=''>id:</label><br>
			<input type='text' name='id' value=".$respuesta['id']." readonly><br>

			<label for=''>style:</label><br>
			<input type='number' name='style' value=".$respuesta['style']."><br>

			<label for=''>client:</label><br>
			<input type='text' name='client' value=".$respuesta['clients']."><br>

			<label for=''>cut:</label><br>
			<input type='text' name='cut' value=".$respuesta['cut']."><br>

			<label for=''>dat:</label><br>
			<input type='date' name='dat' value=".$respuesta['dat']."><br>

			<label for=''>PO:</label><br>
			<input type='number' name='po' value=".$respuesta['po']."><br>

			<label for=''>Description:</label><br>
			<textarea required id='description' name='descript' cols='30' rows='5' >".$respuesta['descript']."</textarea><br>

			<label for=''>Units:</label><br>
			<input type='number' name='units' value=".$respuesta['units']."><br>

			<label for=''>Fabric:</label><br>
			<input type='text' name='fabric' value=".$respuesta['fabric']."><br>

			<label for=''>Color:</label><br>
			<input type='text' name='color' value=".$respuesta['color']."><br>

			<input type='submit' name='Edit' value='Edit'>
			</form>

			<script type='text/javascript'>
       (function() {
         var form = document.getElementById('edit');
         form.addEventListener('submit', function(event) {
           // si es false entonces que no haga el submit
           if (!confirm('Do you want to edit the ID?')) {
             event.preventDefault();
           }
         }, false);
       })();
     </script>
			";
		}

	}

	public function editOrderController(){

		if (isset($_POST["Edit"])) 
		{
			$dataController2 = array(
				"id" => $_POST["id"],
				"style" => $_POST["style"],
				"client" => $_POST["client"],
				"cut" => $_POST["cut"],
				"dat" => $_POST["dat"],
				"po" => $_POST["po"],
				"descript" => $_POST["descript"],
				"units" => $_POST["units"],
				"fabric" => $_POST["fabric"],
				"color" => $_POST["color"]);

			$respuesta2 = Orders::EditOrdersModel($dataController2, "orders");

			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=OrderComplete&msj=ok");
				header("location: index.php?action=Order");
					//var_dump($dataController);
			}
			else{
				echo "error: falla edit";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}

	public function detailOrdersDeleteController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = Orders::detailOrdersDeleteModel($datosController, "orders");

			echo "

			<form method='POST' id='delete'>
			<label for=''>id:</label><br>
			<input type='text' name='id' value=".$respuesta['id']." readonly><br>

			<label for=''>style:</label><br>
			<input type='text' name='style' value=".$respuesta['style']."><br>

			<label for=''>client:</label><br>
			<input type='text' name='client' value=".$respuesta['clients']."><br>

			<label for=''>cut:</label><br>
			<input type='text' name='cut' value=".$respuesta['cut']."><br>

			<label for=''>dat:</label><br>
			<input type='date' name='dat' value=".$respuesta['dat']."><br>

			<label for=''>PO:</label><br>
			<input type='number' name='po' value=".$respuesta['po']."><br>

			<label for=''>Description:</label><br>
			<textarea required id='description' name='descript' cols='30' rows='5' >".$respuesta['descript']."</textarea><br>

			<label for=''>Units:</label><br>
			<input type='number' name='units' value=".$respuesta['units']."><br>

			<label for=''>Fabric:</label><br>
			<input type='text' name='fabric' value=".$respuesta['fabric']."><br>

			<label for=''>Color:</label><br>
			<input type='text' name='color' value=".$respuesta['color']."><br>

			<input type='submit' name='Delete' value='Delete' onclick='pregunta()'>
			</form>
			<script type='text/javascript'>
       	function pregunta(){ 
    if (confirm('¿Do you want to delete this ID?')){ 
       document.tuformulario.submit() 
    } 
} 
     </script>

			";
		}

	}

	public function DeleteOrderController(){
		if (isset($_POST["Delete"])) 
		{
			$dataController2 = array(
				"id" => $_POST["id"],
				"style" => $_POST["style"],
				"client" => $_POST["client"],
				"cut" => $_POST["cut"],
				"dat" => $_POST["dat"],
				"po" => $_POST["po"],
				"descript" => $_POST["descript"],
				"units" => $_POST["units"],
				"fabric" => $_POST["fabric"],
				"color" => $_POST["color"]);

			$respuesta2 = Orders::DeleteOrdersModel($dataController2, "orders");
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=OrderComplete&msj=ok");
				header("location: index.php?action=Order");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}




	public function OrdersCompleteController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = OrdComp::OrdersCompleteModel($datosController, "orders");

			echo "

			<form method='POST' id='Finish'>
			<label for=''>id:</label><br>
			<input type='text' name='id' value=".$respuesta['id']." readonly><br>

			<label for=''>style:</label><br>
			<input type='text' name='style' value=".$respuesta['style']."><br>

		
			<label for=''>dat:</label><br>
			<input type='date' name='dat' value=".$respuesta['dat']."><br>

			<label for=''>Units:</label><br>
			<input type='number' name='units' value=".$respuesta['units']."><br>


			<input type='submit' name='Finish' value='Finish'>
			</form>
			<script type='text/javascript'>
       (function() {
         var form = document.getElementById('Finish');
         form.addEventListener('submit', function(event) {
           // si es false entonces que no haga el submit
           if (!confirm('Do you finish this ID?')) {
             event.preventDefault();
           }
         }, false);
       })();
     </script>

			";
		}

	}

	public function FinishOrdersController(){
		if (isset($_POST["Finish"])) 
		{
			
			$dataController2 = array(
				"id" => $_POST["id"],
				"style" => $_POST["style"],
				"dat" => $_POST["dat"],
				"units" => $_POST["units"]
			);
$dataController3 = array(
				"style" => $_POST["style"],
				"dat" => $_POST["dat"],
				"units" => $_POST["units"]
			);

			$respuesta2 = OrdComp::FinishOrdersModel($dataController2, "orders", $dataController3, "completed");


			

			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=OrderComplete&msj=ok");
				header("location: index.php?action=OrderComplete");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}

public function DelOrdersController(){
		if (isset($_POST["Finish"])) 
		{
			
			$dataController2 = array(
				"id" => $_POST["id"],
				"style" => $_POST["style"],
				"dat" => $_POST["dat"],
				"units" => $_POST["units"]
			);

			$respuesta2 = OrdComp::DelOrdersModel($dataController2, "orders");
			

			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=OrderComplete&msj=ok");
				header("location: index.php?action=Orders");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}


public function OrdCompViewController(){
		$respuesta = OrdComp::OrdCompViews("completed");
		foreach ($respuesta as $row => $item) {
			echo '
			<tr>
			<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>
			<td>'.$item[3].'</td>
			

		
			<td><button><a href="index.php?action=DeleteOrdComp&id='.$item[0].'">Delete</a></td></button>

			</tr>
			<br>
			';
		}
		echo'<form method="POST"><input type="submit" name="Exp" value="Exportar"></form>';
	}

	public function exportOrderCompleteController(){

		$nombreCSV = "ordComp";
		$file_ending = "xls";
		$respuesta = OrdComp::OrdCompViews("completed");

		if (isset($_POST["Exp"])){
			$respuesta = OrdComp::OrdCompViews("completed");
			header("Content-Type: application/csv");    
			header("Content-Disposition: attachment; filename=$nombreCSV.csv");  
			header("Pragma: no-cache"); 
			header("Expires: 0");
			$sep = "\t";

			for ($i = 0; $i < mysql_num_fields($respuesta); $i++) {
			echo mysql_field_name($respuesta,$i) . "\t";
			}
			print("\n"); 

			while($row = mysql_fetch_row($respuesta))
    		{
		        $schema_insert = "";
		        for($j=0; $j<mysql_num_fields($respuesta);$j++)
		        {
		            if(!isset($row[$j]))
		                $schema_insert .= "NULL".$sep;
		            elseif ($row[$j] != "")
		                $schema_insert .= "$row[$j]".$sep;
		            else
		                $schema_insert .= "".$sep;
		        }
		        $schema_insert = str_replace($sep."$", "", $schema_insert);
		        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
		        $schema_insert .= "\t";
		        print(trim($schema_insert));
		        print "\n";
    }   


		}



	}

	public function detailOrdCompController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = OrdComp::detailOrdCompModel($datosController, "completed");

			echo "

			<form method='POST' id='edit'>
			<label for=''>id:</label><br>
			<input type='text' name='id' value=".$respuesta['id']." readonly><br>

			<label for=''>style:</label><br>
			<input type='number' name='style' value=".$respuesta['style']."><br>

			<label for=''>dat:</label><br>
			<input type='date' name='dat' value=".$respuesta['dat']."><br>

			<label for=''>Units:</label><br>
			<input type='number' name='units' value=".$respuesta['units']."><br>

	

			<input type='submit' name='Edit' value='Edit'>
			</form>

			<script type='text/javascript'>
       (function() {
         var form = document.getElementById('edit');
         form.addEventListener('submit', function(event) {
           // si es false entonces que no haga el submit
           if (!confirm('Do you want to edit the ID?')) {
             event.preventDefault();
           }
         }, false);
       })();
     </script>
			";
		}

	}


	public function detailOrdCompDeleteController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = OrdComp::detailOrdCompDeleteModel($datosController, "completed");

			echo "

			<form method='POST' id='delete'>
			<label for=''>id:</label><br>
			<input type='text' name='id' value=".$respuesta['id']." readonly><br>

			<label for=''>style:</label><br>
			<input type='text' name='style' value=".$respuesta['style']."><br>



			<label for=''>dat:</label><br>
			<input type='date' name='dat' value=".$respuesta['dat']."><br>


			<label for=''>Units:</label><br>
			<input type='number' name='units' value=".$respuesta['units']."><br>



			<input type='submit' name='Delete' value='Delete'>
			</form>
			<script type='text/javascript'>
       (function() {
         var form = document.getElementById('delete');
         form.addEventListener('submit', function(event) {
           // si es false entonces que no haga el submit
           if (!confirm('Do you want to delete the ID?')) {
             event.preventDefault();
           }
         }, false);
       })();
     </script>

			";
		}

	}

	public function DeleteOrdCompController(){
		if (isset($_POST["Delete"])) 
		{
			$dataController2 = array(
				"id" => $_POST["id"],
				"style" => $_POST["style"],
				
				"dat" => $_POST["dat"],
				
				"units" => $_POST["units"]);

			$respuesta2 = OrdComp::DeleteOrdCompModel($dataController2, "completed");
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=OrderComplete&msj=ok");
				header("location: index.php?action=OrderComplete");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}














	public function insertStyleController(){
		if (isset($_POST["newStyle"])) {
			$dataController = array(
				"nameStyle" => $_POST["nameStyle"],
				"descript" => $_POST["descript"]
			);


if ($_POST["namestyle"]=="" || $_POST["descript"]==""  )
{
	echo '<script>
                    alert("Needs completing all fields");
                    </script>'; 
   
}

else{
			$respuesta = Style::newStyle($dataController, "styles");



			if($respuesta=="error"){echo '<script>
			alert("The style already exist");
			</script>'; }
			else{
				if ($respuesta == "success") {
					//echo "insert correcto";
					//header("location: index.php");
					header("location: index.php?action=StyleComplete&msj=ok");
					header("location: index.php?action=Home");
					//var_dump($dataController);
				}
				else{
					echo "error: falla insert <br>";


					var_dump($respuesta);

				}
			}
		}


	}
}



	public function StyleViewController(){
		$respuesta = Style::StyleViews("styles");
		foreach ($respuesta as $row => $item) {
			echo '<tr>
			<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>

			<td><button><a href="index.php?action=EditStyle&idstyles='.$item[0].'">Edit</a></td></button>
			<td><button><a href="index.php?action=DeleteStyle&idstyles='.$item[0].'">Delete</a></td></button>
			</tr>';
		}
	}

	public function detailStyleController(){
		if(isset($_GET["idstyles"])){
			$datosController =$_GET["idstyles"];
			$respuesta = Style::detailStyleModel($datosController, "styles");


			echo "

			<form method='POST'>

			<label for=''>id:</label><br>
			<input type='text' name='idstyles' value=".$respuesta['idstyles']." readonly><br>

			<label for=''>nameStyle:</label><br>
			<input type='text' name='nameStyle' value=".$respuesta['nameStyle']."><br>


			<label for=''>Description:</label><br>
			<textarea required id='description' name='descript' cols='30' rows='5' >".$respuesta['descript']."</textarea><br>


			<input type='submit' name='Edit' value='Edit'>
			</form>
			";
		}

	}

	public function editStyleController(){


		if (isset($_POST["Edit"])) 
		{
			$dataController2 = array(
				
				"idstyles" => $_POST["idstyles"],
				"nameStyle" => $_POST["nameStyle"],
				"descript" => $_POST["descript"]);

			$respuesta2 = Style::EditStyleModel($dataController2, "styles");
			var_dump($respuesta2);
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=StyleComplete&msj=ok");
				header("location: index.php?action=Home");
					//var_dump($dataController);
			}
			else{
				echo "error: falla edit";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}

	public function detailStyleDeleteController(){
		if(isset($_GET["idstyles"])){
			$datosController =$_GET["idstyles"];
			$respuesta = Style::detailStyleDeleteModel($datosController, "styles");

			echo "

			<form method='POST'>
			<label for=''>id:</label><br>
			<input type='text' name='idstyles' value=".$respuesta['idstyles']." readonly><br>

			<label for=''>style:</label><br>
			<input type='text' name='nameStyle' value=".$respuesta['nameStyle']."><br>

			<label for=''>Description:</label><br>
			<textarea required id='description' name='descript' cols='30' rows='5' >".$respuesta['descript']."</textarea><br>

			<input type='submit' name='Delete' value='Delete'>
			</form>
			";
		}

	}

	public function DeleteStyleController(){
		if (isset($_POST["Delete"])) 
		{
			$dataController2 = array(
				"idstyles" => $_POST["idstyles"],
				"nameStyle" => $_POST["nameStyle"],
				"descript" => $_POST["descript"]);

			$respuesta2 = Style::DeleteStyleModel($dataController2, "styles");
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=StyleComplete&msj=ok");
				header("location: index.php?action=Home");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}





		

		

	public function insertLenghtController(){
		if (isset($_POST["newLenght"])) {
			$dataController = array(

				"style" => $_POST["style"],
				"lenght" => $_POST["lenght"],
				"xs" => $_POST["xs"],
				"s" => $_POST["s"],
				"m" => $_POST["m"],
				"l" => $_POST["l"],
				"xl" => $_POST["xl"],
				"xxl" => $_POST["xxl"],
				"xxx" => $_POST["xxx"],
				"xxxx" => $_POST["xxxx"],
				"xxxxx" => $_POST["xxxxx"],
				"total" => $_POST["total"]

			);



if ($_POST["style"]=="" || $_POST["lenght"]=="" || $_POST["xs"]=="" || $_POST["s"]=="" || $_POST["m"]=="" || $_POST["l"] ==""|| $_POST["xl"] ==""|| $_POST["xxl"]=="" || $_POST["xxx"] ==""|| $_POST["xxxx"]=="" || $_POST["xxxxx"] ==""|| $_POST["total"] =="")
{
	echo '<script>
                    alert("Needs completing all fields");
                    </script>'; 
   
}

else{
			$respuesta =Lenght::newLenght($dataController, "lenght");

			if ($respuesta == "success") {

					//echo "insert correcto";
					//header("location: index.php");
			header("location: index.php?action=LenghtComplete&msj=ok");
				header("location: index.php?action=Lenght");
					//var_dump($dataController);
			}
			else{
				echo "error: falla insert <br>";

				var_dump($respuesta);

			}
		} 
	}
		
		}	







		


	public function LenghtViewController(){
		$respuesta = Lenght::LenghtViews("lenght");
		foreach ($respuesta as $row => $item) {
			echo '<tr>
			<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>
			<td>'.$item[3].'</td>
			<td>'.$item[4].'</td>
			<td>'.$item[5].'</td>
			<td>'.$item[6].'</td>
			<td>'.$item[7].'</td>
			<td>'.$item[8].'</td>
			<td>'.$item[9].'</td>
			<td>'.$item[10].'</td>
			<td>'.$item[11].'</td>
			<td>'.$item[12].'</td>
			<td><button><a href="index.php?action=EditLenght&id='.$item[0].'">Edit</a></td></button>
			<td><button><a href="index.php?action=DeleteLenght&id='.$item[0].'">Delete</a></td></button>
			</tr>';
		}
	}

	public function detailLenghtController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = Lenght::detailLenghtModel($datosController, "lenght");


			echo "

			<form method='POST'>
				<label for=''>id:</label><br>
			<input type='text' name='id' value=".$respuesta['id']." readonly><br>

			<label for=''>Style:</label><br>
			<input type='number' name='style' value=".$respuesta['style']." readonly><br>

			<label for=''>Length:</label><br>
			<input type='text' name='lenght' value=".$respuesta['lenght']."><br>

			<label for=''>XS:</label><br>
			<input type='number' name='xs' value=".$respuesta['xs']."><br>

			<label for=''>S:</label><br>
			<input type='number' name='s' value=".$respuesta['s']."><br>
			<label for=''>M:</label><br>
			<input type='number' name='m' value=".$respuesta['m']."><br>
			<label for=''>L:</label><br>
			<input type='number' name='l' value=".$respuesta['l']."><br>
			<label for=''>XL:</label><br>
			<input type='number' name='xl' value=".$respuesta['xl']."><br>
			<label for=''>XXL:</label><br>
			<input type='number' name='xxl' value=".$respuesta['xxl']."><br>
			<label for=''>3X:</label><br>
			<input type='number' name='xxx' value=".$respuesta['xxx']."><br>
			<label for=''>4X:</label><br>
			<input type='number' name='xxxx' value=".$respuesta['xxxx']."><br>
			<label for=''>5X:</label><br>
			<input type='number' name='xxxxx' value=".$respuesta['xxxxx']."><br>
			<label for=''>Total:</label><br>
			<input type='number' name='total' value=".$respuesta['total']."><br>


			<input type='submit' name='Edit' value='Edit'>
			</form>
			";
		}

	}

	public function editLenghtController(){


		if (isset($_POST["Edit"])) 
		{
			$dataController2 = array(
				"id" => $_POST["id"],
				"style" => $_POST["style"],
				"lenght" => $_POST["lenght"],
				"xs" => $_POST["xs"],
				"s" => $_POST["s"],
				"m" => $_POST["m"],
				"l" => $_POST["l"],
				"xl" => $_POST["xl"],
				"xxl" => $_POST["xxl"],
				"xxx" => $_POST["xxx"],
				"xxxx" => $_POST["xxxx"],
				"xxxxx" => $_POST["xxxxx"],
				"total" => $_POST["total"]
			);

			



			$respuesta2 = Lenght::EditLenghtModel($dataController2, "lenght");
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=LenghtComplete&msj=ok");
				header("location: index.php?action=Lenght");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Edit";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}

	public function detailLenghtDeleteController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = Lenght::detailLenghtDeleteModel($datosController, "lenght");

			echo "

			<form method='POST'>



	<label for=''>id:</label><br>
			<input type='text' name='id' value=".$respuesta['id']." readonly><br>

			<label for=''>Style:</label><br>
			<input type='number' name='style' value=".$respuesta['style']." readonly><br>

			<label for=''>Length:</label><br>
			<input type='text' name='lenght' value=".$respuesta['lenght']."><br>

			<label for=''>XS:</label><br>
			<input type='number' name='xs' value=".$respuesta['xs']."><br>

			<label for=''>S:</label><br>
			<input type='number' name='s' value=".$respuesta['s']."><br>
			<label for=''>M:</label><br>
			<input type='number' name='m' value=".$respuesta['m']."><br>
			<label for=''>L:</label><br>
			<input type='number' name='l' value=".$respuesta['l']."><br>
			<label for=''>XL:</label><br>
			<input type='number' name='xl' value=".$respuesta['xl']."><br>
			<label for=''>XXL:</label><br>
			<input type='number' name='xxl' value=".$respuesta['xxl']."><br>
			<label for=''>2X:</label><br>
			<input type='number' name='xxx' value=".$respuesta['xxx']."><br>
			<label for=''>4X:</label><br>
			<input type='number' name='xxxx' value=".$respuesta['xxxx']."><br>
			<label for=''>5X:</label><br>
			<input type='number' name='xxxxx' value=".$respuesta['xxxxx']."><br>
			<label for=''>Total:</label><br>
			<input type='number' name='total' value=".$respuesta['total']."><br>





			<input type='submit' name='Delete' value='Delete'>
			</form>
			";
		}

	}

	public function DeleteLenghtController(){
		if (isset($_POST["Delete"])) 
		{
			$dataController2 = array(
				"id" => $_POST["id"],
				"style" => $_POST["style"],
				"lenght" => $_POST["lenght"],
				"xs" => $_POST["xs"],
				"s" => $_POST["s"],
				"m" => $_POST["m"],
				"l" => $_POST["l"],
				"xl" => $_POST["xl"],
				"xxl" => $_POST["xxl"],
				"xxx" => $_POST["xxx"],
				"xxxx" => $_POST["xxxx"],
				"xxxxx" => $_POST["xxxxx"],
				"total" => $_POST["total"]

			);

			$respuesta2 = Lenght::DeleteLenghtModel($dataController2, "lenght");
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=LenghtComplete&msj=ok");
				header("location: index.php?action=Lenght");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}







	public function insertAviosController(){
		if (isset($_POST["NewAvios"])) {
			$dataController = array(

				"idstyle" => $_POST["idstyle"],
				"descript" => $_POST["descript"],
				"supplier" => $_POST["supplier"],
				"yield" => $_POST["yield"],
				"totalsupplier" => $_POST["totalsupplier"]

			);


if ($_POST["idstyle"]=="" || $_POST["descript"] ==""|| $_POST["supplier"]=="" || $_POST["yield"]=="" || $_POST["totalsupplier"]=="" )
{
	echo '<script>
                    alert("Needs completing all fields");
                    </script>'; 
   
}

else{

			$respuesta = Avios::NewAvios($dataController, "avios");

			if ($respuesta == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=AviosComplete&msj=ok");
				header("location: index.php?action=Avios");
					//var_dump($dataController);
			}
			else{
				echo "error: falla insert <br>";


				var_dump($respuesta);

			}
		} 
	}


}



	public function AviosViewController(){
		$respuesta = Avios::AviosViews("avios");
		foreach ($respuesta as $row => $item) {
			echo '<tr>
			<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>
			<td>'.$item[3].'</td>
			<td>'.$item[4].'</td>
			<td>'.$item[5].'</td>

			<td><button><a href="index.php?action=EditAvios&id='.$item[0].'">Edit</a></td></button>
			<td><button><a href="index.php?action=DeleteAvios&id='.$item[0].'">Delete</a></td></button>
			<td><button><a href="index.php?action=MissA&id='.$item[0].'">Missing</a></td></button>
			</tr>';
		}
	}

	public function OrderViewSearchController(){
		if (isset($_POST["orderb"]))
		{
			$dato = $_POST["camps"];
			$respuesta = Avios::AviosSearchBy("avios", $dato);
			foreach ($respuesta as $row => $item) {
			echo '<tr>
<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>
			<td>'.$item[3].'</td>
			<td>'.$item[4].'</td>
			<td>'.$item[5].'</td>

			<td><button><a href="index.php?action=EditAvios&id='.$item[0].'">Edit</a></td></button>
			<td><button><a href="index.php?action=DeleteAvios&id='.$item[0].'">Delete</a></td></button>
			<td><button><a href="index.php?action=MissA&id='.$item[0].'">Missing</a></td></button>
			</tr>';
		}
		}
		

		
	}
	public function OrderViewSearch2Controller(){
		if (isset($_POST["search"]))
		{
			$dato = $_POST["look"];
			$respuesta = Avios::AviosSearch("avios", $dato);
			foreach ($respuesta as $row => $item) {
			echo '<tr>
			<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>
			<td>'.$item[3].'</td>
			<td>'.$item[4].'</td>
			<td>'.$item[5].'</td>

			<td><button><a href="index.php?action=EditAvios&id='.$item[0].'">Edit</a></td></button>
			<td><button><a href="index.php?action=DeleteAvios&id='.$item[0].'">Delete</a></td></button>
			<td><button><a href="index.php?action=MissA&id='.$item[0].'">Missing</a></td></button>
			</tr>';
		}
		}
		

		
	}
	public function detailAviosController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = Avios::detailAviosModel($datosController, "avios");


			echo "

			<form method='POST'>
			<label for=''>ID</label><br>
			<input type='number' name='id' value=".$respuesta['id']." readonly><br>
			<label for=''>ID Style:</label><br>
			<input type='number' name='idstyle' value=".$respuesta['idstyle']." readonly><br>
			<label for=''>Description:</label><br>
			<textarea required id='description' name='descript' cols='30' rows='5' >".$respuesta['descript']."</textarea><br>


			<label for=''>Supplier:</label><br>
			<input type='text' name='supplier' value=".$respuesta['supplier']."><br>

			<label for=''>Yield:</label><br>
			<input type='number' name='yield' value=".$respuesta['yield']."><br>
			<label for=''>Total Supplier:</label><br>
			<input type='number' name='totalsupplier' value=".$respuesta['totalsupplier']."><br>

			<input type='submit' name='Edit' value='Edit'>
			</form>
			";
		}

	}






	public function EditAviosController(){


		if (isset($_POST["Edit"])) 
		{
			$dataController2 = array(
				"id" => $_POST["id"],
				"idstyle" => $_POST["idstyle"],
				"descript" => $_POST["descript"],
				"supplier" => $_POST["supplier"],
				"yield" => $_POST["yield"],
				"totalsupplier" => $_POST["totalsupplier"]
			);

			$respuesta2 = Avios::editAviosModel($dataController2, "avios");
			var_dump($respuesta2);
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=AviosComplete&msj=ok");
				header("location: index.php?action=Avios");
					//var_dump($dataController);
			}
			else{
				echo "error: falla edit";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}

	public function detailAviosDeleteController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = Avios::detailAviosDeleteModel($datosController, "avios");

			echo "

		
			<form method='POST'>
			<label for=''>ID</label><br>
			<input type='number' name='id' value=".$respuesta['id']." readonly><br>
			<label for=''>ID Style:</label><br>
			<input type='number' name='idstyle' value=".$respuesta['idstyle']." readonly><br>
			<label for=''>Description:</label><br>
			<textarea required id='description' name='descript' cols='30' rows='5' >".$respuesta['descript']."</textarea><br>


			<label for=''>Supplier:</label><br>
			<input type='text' name='supplier' value=".$respuesta['supplier']."><br>

			<label for=''>Yield:</label><br>
			<input type='number' name='yield' value=".$respuesta['yield']."><br>
			<label for=''>Total Supplier:</label><br>
			<input type='number' name='totalsupplier' value=".$respuesta['totalsupplier']."><br>

		


			<input type='submit' name='Delete' value='Delete'>
			</form>
			";
		}

	}



		



	public function DeleteAviosController(){
		if (isset($_POST["Delete"])) 
		{
			$dataController2 = array(
				"id" => $_POST["id"],
				"idstyle" => $_POST["idstyle"],
				"descript" => $_POST["descript"],
				"supplier" => $_POST["supplier"],
				"yield" => $_POST["yield"],
				"totalsupplier" => $_POST["totalsupplier"]
			);
			$respuesta2 = Avios::DeleteAviosModel($dataController2, "avios");
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=AviosComplete&msj=ok");
				header("location: index.php?action=Avios");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}



		





		
				
			

	public function insertProviderController(){
		if (isset($_POST["newProvider"])) {
			$dataController = array(

				"style" => $_POST["style"],
				"origin" => $_POST["origin"],
				"units" => $_POST["units"]

			);

if ($_POST["style"]=="" || $_POST["origin"]=="" || $_POST["units"] =="" )
{
	echo '<script>
                    alert("Needs completing all fields");
                    </script>'; 
   
}
else{


			$respuesta = Provider::newProvider($dataController, "provider");

			if ($respuesta == "success") {

					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=ProvidersComplete&msj=ok");
				header("location: index.php?action=Providers");
					//var_dump($dataController);
			}
			else{
				echo "error: falla insert <br>";

				var_dump($respuesta);

			}
		} }
	}










	public function ProviderViewController(){
		$respuesta = Provider::ProviderViews("provider");
		foreach ($respuesta as $row => $item) {
			echo '<tr>
			<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>
			<td>'.$item[3].'</td>


			<td><button><a href="index.php?action=EditProviders&id='.$item[0].'">Edit</a></td></button>
			<td><button><a href="index.php?action=DeleteProviders&id='.$item[0].'">Delete</a></td></button>
			</tr>';
		}
	}

	public function detailProviderController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = Provider::detailProviderModel($datosController, "provider");


			echo "

			<form method='POST'>
				<label for=''>id:</label><br>
			<input type='text' name='id' value=".$respuesta['id']." readonly><br>

			<label for=''>ID Style:</label><br>
			<input type='number' name='style' value=".$respuesta['style']." readonly><br>

			<label for=''>Origin:</label><br>
			<input type='text' name='origin' value=".$respuesta['origin']."><br>

			<label for=''>Units:</label><br>
			<input type='number' name='units' value=".$respuesta['units']."><br>

			<input type='submit' name='Edit' value='Edit'>
			</form>
			";
		}

	}



		
		

		

	public function editProviderController(){


		if (isset($_POST["Edit"])) 
		{
			$dataController2 = array(
				"id" => $_POST["id"],
				"style" => $_POST["style"],
				"origin" => $_POST["origin"],
				"units" => $_POST["units"]

			);

			$respuesta2 = Provider::EditProviderModel($dataController2, "provider");
			var_dump($respuesta2);
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=ProvidersComplete&msj=ok");
				header("location: index.php?action=Providers");
					//var_dump($dataController);
			}
			else{
				echo "error: falla edit";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}

	public function detailProviderDeleteController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = Provider::detailProviderDeleteModel($datosController, "provider");

			echo "
			<form method='POST'>
				<label for=''>id:</label><br>
			<input type='text' name='id' value=".$respuesta['id']." readonly><br>

			<label for=''>ID Style:</label><br>
			<input type='number' name='style' value=".$respuesta['style']." readonly><br>

			<label for=''>Origin:</label><br>
			<input type='text' name='origin' value=".$respuesta['origin']."><br>

			<label for=''>Units:</label><br>
			<input type='number' name='units' value=".$respuesta['units']."><br>


			<input type='submit' name='Delete' value='Delete'>
			</form>
			";
		}

	}

	public function DeleteProviderController(){
		if (isset($_POST["Delete"])) 
		{
			$dataController2 = array(
				"id" => $_POST["id"],
				"style" => $_POST["style"],
				"origin" => $_POST["origin"],
				"units" => $_POST["units"]
			);

			$respuesta2 = Provider::DeleteProviderModel($dataController2, "provider");
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=ProvidersComplete&msj=ok");
				header("location: index.php?action=Providers");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}





	public function MissingController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = Missing::MissAvModel($datosController, "avios");

			echo "

			<form method='POST' id='Missing'>

			<form method='POST'>
			<label for=''>ID</label><br>
			<input type='number' name='id' value=".$respuesta['id']." readonly><br>
			
			<label for=''>Description:</label><br>
			<textarea required id='description' name='descript' cols='30' rows='5' >".$respuesta['descript']."</textarea><br>


			<label for=''>Total Supplier:</label><br>
			<input type='number' name='totalsupplier' value=".$respuesta['totalsupplier']."><br>




			<input type='submit' name='Missing' value='Missing'>
			</form>
			<script type='text/javascript'>
       (function() {
         var form = document.getElementById('Missing');
         form.addEventListener('submit', function(event) {
           // si es false entonces que no haga el submit
           if (!confirm('Is it a missing AVIO??')) {
             event.preventDefault();
           }
         }, false);
       })();
     </script>

			";
		}

	}

	public function MissController(){
		if (isset($_POST["Missing"])) 
		{
			
			$dataController2 = array(
			
				"id" => $_POST["id"],
				"descript" => $_POST["descript"],
			
				"totalsupplier" => $_POST["totalsupplier"]
			);
$dataController3 = array(
			
				
				"descript" => $_POST["descript"],
			
				"totalsupplier" => $_POST["totalsupplier"]
			);

			$respuesta2 = Missing::MissingModel($dataController2, "avios", $dataController3, "missing");


			

			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=MissingAvios&msj=ok");
				header("location: index.php?action=MissingAvios");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}

public function DelMissController(){
		if (isset($_POST["Missing"])) 
		{
			
			$dataController2 = array(
				"id" => $_POST["id"],
			
				
				"descript" => $_POST["descript"],
			
				"totalsupplier" => $_POST["totalsupplier"]
			);

			$respuesta2 = Missing::DelMissModel($dataController2, "avios");
			

			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=MissingAvios&msj=ok");
				header("location: index.php?action=MissingAvios");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}


public function MissViewController(){
		$respuesta = Missing::MissViews("missing");
		foreach ($respuesta as $row => $item) {
			echo '<tr>
			<td>'.$item[0].'</td>
			<td>'.$item[1].'</td>
			<td>'.$item[2].'</td>

			

		
			<td><button><a href="index.php?action=DelMiss&id='.$item[0].'">Delete</a></td></button>
			
			</tr>';
		}
	}



	public function detailMissDeleteController(){
		if(isset($_GET["id"])){
			$datosController =$_GET["id"];
			$respuesta = Missing::detailMissDeleteModel($datosController, "missing");

			echo "

			<form method='POST' id='delete'>
			<label for=''>id:</label><br>
			<input type='text' name='id' value=".$respuesta['id']." readonly><br>

			
			<label for=''>Description:</label><br>
			<textarea required id='description' name='descript' cols='30' rows='5' >".$respuesta['descript']."</textarea><br>


			<label for=''>Total Supplier:</label><br>
			<input type='number' name='totalsupplier' value=".$respuesta['totalsupplier']."><br>




			<input type='submit' name='Delete' value='Delete'>
			</form>
			<script type='text/javascript'>
       (function() {
         var form = document.getElementById('delete');
         form.addEventListener('submit', function(event) {
           // si es false entonces que no haga el submit
           if (!confirm('Do you want to delete the ID?')) {
             event.preventDefault();
           }
         }, false);
       })();
     </script>

			";
		}

	}

	public function DeleteMissController(){
		if (isset($_POST["Delete"])) 
		{
			$dataController2 = array(
				"id" => $_POST["id"],
	
				
				"descript" => $_POST["descript"],
			
				"totalsupplier" => $_POST["totalsupplier"]
	);
			$respuesta2 = Missing::DeleteMissModel($dataController2, "missing");
			if ($respuesta2 == "success") {
					//echo "insert correcto";
					//header("location: index.php");
				header("location: index.php?action=MissingAviosng&msj=ok");
				header("location: index.php?action=MissingAvios");
					//var_dump($dataController);
			}
			else{
				echo "error: falla Delete";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($dataController2);
			}
		}


	}




	public function ExportOController(){
	if (isset($_POST['export'])) {

$delimiter = ",";
    $filename = "significant_" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     
    //set column headers



		$fields = array(
				"id" => $_POST["id"],
				"style" => $_POST["style"],
				"client" => $_POST["client"],
				"cut" => $_POST["cut"],
				"dat" => $_POST["dat"],
				"po" => $_POST["po"],
				"descript" => $_POST["descript"],
				"units" => $_POST["units"],
				"fabric" => $_POST["fabric"],
				"color" => $_POST["color"]);
  fputcsv($f, $fields, $delimiter);
			$respuesta2 = Exp::ExportO($fields, "orders");

			if ($respuesta2 == "success") {

					    //move back to beginning of file
    fseek($f, 0);
     
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
     
    //output all remaining data on a file pointer
    fpassthru($f);
 
			}
			else{
				echo "error: falla edit";
				echo "<br>";
				var_dump($respuesta2);
				echo "<br>";
				var_dump($fields);
			}
		}


	}



	





}

?>