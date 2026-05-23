<?php 

/**
 * 
 */
class Missing extends Conexion
{
	


	public function MissAvModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
		public function MissingModel($dataModel, $tabla){


		$consulta="SELECT  id,descript, totalsupplier FROM avios where (id = '$dataModel[id]' and descript = '$dataModel[descript]' and totalsupplier = '$dataModel[totalsupplier]') ;";

		$rs = Conexion::conectar()->query($consulta);
			
		$resultado = $rs->fetch_assoc();

		if($resultado){
			$sql = "INSERT INTO missing (  descript, totalsupplier)
					VALUES (
							'$dataModel[descript]',
							'$dataModel[totalsupplier]');";
			$rs = Conexion::conectar()->query($sql);
			if ($rs) {
				$sql2 = "DELETE FROM $tabla where (id='$dataModel[id]');";
				$rs2 = Conexion::conectar()->query($sql2);
				if ($rs2)
				{
					return "success";
				}
				
			}else{
				return var_dump($sql);
				
			}
			$rs->close();
		}
else{return "error";}
}

public function DelMissModel($tabla)
	{
		$sql = "DELETE from `$tabla` where (`id` = '$dataModel[id]') ;";
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
	
      
	public function MissViews($tabla)
	{
		$sql = "select * from $tabla where status = 'available';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}

	

	public function detailMissDeleteModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function DeleteMissModel($dataModel, $tabla){
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







}










 ?>