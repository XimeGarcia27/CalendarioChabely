<?php

class Conexion
{
	var $con;

	function conectar()
	{
		$con = null;
		try {
			$con = new PDO('mysql:host=localhost;dbname=citas', 'root', '');
			//manejar errores
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e) {
			die('Error conectado con la base de datos:' . $e->getMessage());
		}
		
		return $con;
	}

	function getListaByServi($servic){
		$con = $this->conectar();
		$consulta = 'SELECT *
		             From servicios
					 WHERE servicio LIKE '.$servic;
		$stmt = $con->prepare($consulta);
		$stmt->execute();
		$registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//$numRegistros = count($registro);

		return $registro;
	}

	function getNameById($id){
		$con = $this->conectar();
		$consulta = 'SELECT nombre_servicio, servicio, apellido, estado
		             From servicios
					 WHERE id = '.$id;
		$stmt = $con->prepare($consulta);
		$stmt->execute();
		$registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//$numRegistros = count($registro);

		return $registro;
	}

	function cita(){
		$con = $this->conectar();
		$consulta = 'SELECT id, title
		             From agenda';
		$stmt = $con->prepare($consulta);
		$stmt->execute();
		$registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//$numRegistros = count($registro);

		return $registro;
	}

	function getNameByService($servic){
		$con = $this->conectar();
		$consulta = 'SELECT id, nombre_servicio, apellido
		             From servicios
					 WHERE servicio LIKE '.$servic;
		$stmt = $con->prepare($consulta);
		$stmt->execute();
		$registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//$numRegistros = count($registro);

		return $registro;
	}

}
    // Url donde estara el proyecto, debe terminar con un "/" al final
    $base_url = "http://localhost/Chabely/";
