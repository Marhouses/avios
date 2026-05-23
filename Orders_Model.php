<?php 

/**
 * 
 */
class Orders extends Conexion
{
		public function newOrder($dataModel, $table){
			$consulta="SELECT * FROM $table WHERE  (`style`='$dataModel[style]');";
			$rs = Conexion::conectar()->query($consulta);


			$sql = "INSERT INTO $table (style, clients, cut, dat, po, descript, units, fabric, color)
					VALUES ('$dataModel[style]',
							'$dataModel[client]',
							'$dataModel[cut]',
							'$dataModel[dat]',
							'$dataModel[po]',
							'$dataModel[descript]',
							'$dataModel[units]',
							'$dataModel[fabric]',
							'$dataModel[color]');";
							$rs = Conexion::conectar()->query($sql);
			if ($rs) {
				return "success";
			}else{
				return var_dump($sql);
				
			}
			$rs->close();
		

}



			

	public function OrderViews($tabla)
	{
		$sql = "select * from $tabla where status = 'available';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}

	public function detailOrdersModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function editOrdersModel($dataModel, $tabla){

		
		$sql = "UPDATE `$tabla` SET `style` = '$dataModel[style]', `clients`='$dataModel[client]' , 
		`cut`= '$dataModel[cut]', `dat` = '$dataModel[dat]', `po`='$dataModel[po]', 
		`descript` = '$dataModel[descript]', `units` = '$dataModel[units]', `fabric` = '$dataModel[fabric]',
		`color` = '$dataModel[color]' where (`id` ='$dataModel[id]') ;";
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

	public function detailOrdersDeleteModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function DeleteOrdersModel($dataModel, $tabla){
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
		public function OrderSearchBy($tabla,$dato)
	{
		$sql = "select * from $tabla order by $dato ;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}
	public function OrderSearch($tabla,$dato)
	{
		$sql = "select * from orders where clients Like '$dato' or dat like '$dato' or style like '$dato' or cut like '$dato' or po like '$dato' or descript like '$dato' or units like '$dato' or fabric like '$dato' or color like '$dato'; ;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}




}

 ?>