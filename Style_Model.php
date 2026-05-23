<?php 
class Style extends Conexion
{
	public function newStyle($dataModel, $table){
			$consulta="SELECT * FROM $table WHERE  (`nameStyle`='$dataModel[nameStyle]');";
			$rs = Conexion::conectar()->query($consulta);
			
$resultado = $rs->fetch_assoc();

if($resultado){return "error";}
                    else{

$sql = "INSERT INTO $table (nameStyle, descript)
					VALUES ('$dataModel[nameStyle]',
							'$dataModel[descript]');";
							$rs = Conexion::conectar()->query($sql);
			if ($rs) {
				return "success";
			}else{
				return var_dump($sql);
				
			}
			$rs->close();
		}


}


			

	public function StyleViews($tabla)
	{
		$sql = "select * from $tabla where status = 'available';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}

	public function detailStyleModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										idstyles = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function editStyleModel($dataModel, $tabla){

		
		$sql = "UPDATE `$tabla` SET `nameStyle` = '$dataModel[nameStyle]', `descript` = '$dataModel[descript]' where (`idstyles` ='$dataModel[idstyles]') ;";
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

	public function detailStyleDeleteModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										idstyles = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function DeleteStyleModel($dataModel, $tabla){
		$sql = "UPDATE `n260m_23927797_prueb`.`$tabla` SET `status` = 'unavailible' WHERE (`idstyles` = '$dataModel[idstyles]');";
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