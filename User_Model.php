<?php 
	require_once 'Conection.php';

	/**
	 * 
	 */
	class Users extends Conexion
	{
		


		public function loginUsuarioModel($datosModel, $tabla){
			$sql = "SELECT usuario, clave from $tabla where usuario = '$datosModel[usuario]' and clave = '$datosModel[clave]' ; ";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_assoc();
			//$contador = $rs->num_rows;
			if ($rs) {
				$error = Conexion::conectar($rs)->error;
				return $resultado;
			}else{
				return "error";
			}
			$rs -> close();
		}
	}



 ?>