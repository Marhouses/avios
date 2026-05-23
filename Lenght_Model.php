<?php 

/**
 * 
 */
class Lenght extends Conexion
{
	public function newLenght($dataModel, $table){
		


$sql = "INSERT INTO $table (style, lenght, xs, s, m, l,xl, xxl, xxx, xxxx, xxxxx,total)
					VALUES ('$dataModel[style]',
							'$dataModel[lenght]',
							'$dataModel[xs]',
							'$dataModel[s]',
							'$dataModel[m]',
							'$dataModel[l]',
							'$dataModel[xl]',
							'$dataModel[xxl]',
							'$dataModel[xxx]',
							'$dataModel[xxxx]',
							'$dataModel[xxxxx]',
							'$dataModel[total]');";

							$rs = Conexion::conectar()->query($sql);
			if ($rs) {
				return "success";
			}else{
				return var_dump($sql);
				
			}
			$rs->close();
		}





			

	public function LenghtViews($tabla)
	{
		$sql = "select * from $tabla where status = 'available';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
	}

	public function detailLenghtModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function editLenghtModel($dataModel, $tabla){

		
		$sql = "UPDATE `$tabla` SET `style` = '$dataModel[style]', `lenght`='$dataModel[lenght]' , 
		`xs`= '$dataModel[xs]', `s` = '$dataModel[s]', `m`='$dataModel[m]', `l`='$dataModel[l]', 
		`xl` = '$dataModel[xl]', `xxl` = '$dataModel[xxl]', `xxx` = '$dataModel[xxx]',
		`xxxx` = '$dataModel[xxxx]',`xxxxx`='$dataModel[xxxxx]' ,
		`total` = '$dataModel[total]' where (`id` ='$dataModel[id]') ;";
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

	public function detailLenghtDeleteModel($datosModel, $tabla){

			$sql = "SELECT * FROM $tabla WHERE
										id = '$datosModel';";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}
	public function DeleteLenghtModel($dataModel, $tabla){
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