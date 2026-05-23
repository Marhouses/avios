<?php 

/**
 * 
 */
class OrdComp extends Conexion
{
	


	public function OrdersCompleteModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
		public function FinishOrdersModel($dataModel, $tabla){


		$consulta="SELECT id, style, dat, units FROM orders where (id = '$dataModel[id]' and style = '$dataModel[style]' and units = '$dataModel[units]') ;";

		$rs = Conexion::conectar()->query($consulta);
			
		$resultado = $rs->fetch_assoc();

		if($resultado){
			$sql = "INSERT INTO completed (style,  dat, units)
					VALUES ('$dataModel[style]',
							'$dataModel[dat]',
							'$dataModel[units]');";
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

public function DelOrdersModel($tabla)
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
	
      
	public function OrdCompViews($tabla)
	{
		$sql = "select* from $tabla where status = 'available';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}

	public function detailOrdCompModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function editOrdCompModel($dataModel, $tabla){

		
		$sql = "UPDATE `$tabla` SET `style` = '$dataModel[style]',  `dat` = '$dataModel[dat]', `units` = '$dataModel[units]' where (`id` ='$dataModel[id]') ;";
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

	public function detailOrdCompDeleteModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function DeleteOrdCompModel($dataModel, $tabla){
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

		public function exportTable($tabla){
		$sql = "SELECT * FROM $tabla ;";
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