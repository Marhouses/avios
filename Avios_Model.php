<?php 

/**
 * 
 */
class Avios extends Conexion
{
	public function NewAvios($dataModel, $table){
			
                   

$sql = "INSERT INTO $table (idstyle, descript, supplier, yield, totalsupplier)
					VALUES ('$dataModel[idstyle]',
							'$dataModel[descript]',
							'$dataModel[supplier]',
							'$dataModel[yield]',
							'$dataModel[totalsupplier]');"; 
							$rs = Conexion::conectar()->query($sql);
			if ($rs) {
				return "success";
			}else{
				return var_dump($sql);
				
			}
			$rs->close();
		}





			

	public function AviosViews($tabla)
	{
		$sql = "select* from $tabla where status = 'available';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}

	public function detailAviosModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function editAviosModel($dataModel, $tabla){

		
		$sql = "UPDATE `$tabla` SET `idstyle` = '$dataModel[idstyle]', `descript`='$dataModel[descript]' , 
		`supplier`= '$dataModel[supplier]', `yield` = '$dataModel[yield]', `totalsupplier`='$dataModel[totalsupplier]'  where (`id` ='$dataModel[id]') ;";
		$rs = Conexion::conectar()->query($sql);
		if ($rs) 
		{
			return "success";
		}
		else
		{
			return var_dump($rs);
			
		}
			$rs->close();
	}

	public function detailAviosDeleteModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function DeleteAviosModel($dataModel, $tabla){
		$sql = "UPDATE `n260m_23927797_prueb`.`$tabla` SET `status` = 'unavailible' WHERE (`id` = '$dataModel[id]');";

		$rs = Conexion::conectar()->query($sql);
		if ($rs) 
		{
			return "success";
		}
		else
		{
			return var_dump($rs);
			
		}
			$rs->close();
	}

	public function AviosSearchBy($tabla,$dato)
	{
		$sql = "select * from $tabla order by $dato ;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}
	public function AviosSearch($tabla,$dato)
	{
		$sql = "select * from avios where supplier Like '$dato' or totalsupplier like '$dato' or yield like '$dato' or idstyle like '$dato' or descript like '$dato' ; ;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}


}

 ?>