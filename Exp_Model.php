<?php 

/**
 * 
 */
class Export extends Conexion
{
	


	public function ExportO($datosModel, $tabla){

		$consulta="SELECT id, style, client, cut, dat, po, descript, units, fabric, color FROM orders where (id = '$dataModel[id]' and style = '$dataModel[style]'  and client = '$dataModel[client]'  and cut = '$dataModel[cut]'  and dat = '$dataModel[dat]'  and po = '$dataModel[po]'  and descript = '$dataModel[descript]' and units = '$dataModel[units]'  and fabric = '$dataModel[fabric]'   and color = '$dataModel[color]'  ) ;";
				$rs = Conexion::conectar()->query($consulta);
			
		$resultado = $rs->fetch_assoc();
			return $resultado;
			$rs->close();
		}

	



}










 ?>