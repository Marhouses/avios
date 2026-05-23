<?php 

/**
 * 
 */
class Provider extends Conexion
{
	public function newProvider($dataModel, $table){
			
                   

$sql = "INSERT INTO $table (style,origin, units)
					VALUES ('$dataModel[style]',
							'$dataModel[origin]',
							'$dataModel[units]'
							
							);";
							$rs = Conexion::conectar()->query($sql);
			if ($rs) {
				return "success";
			}else{
				return var_dump($sql);
				
			}
			$rs->close();
		}





			

	public function ProviderViews($tabla)
	{
		$sql = "select * from $tabla where status = 'available';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}

	public function detailProviderModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function editProviderModel($dataModel, $tabla){

		
		$sql = "UPDATE `$tabla` SET `style` = '$dataModel[style]', `origin`='$dataModel[origin]' , 
		`units`= '$dataModel[units]'  where (`id` ='$dataModel[id]') ;";
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

	public function detailProviderDeleteModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function DeleteProviderModel($dataModel, $tabla){
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