<?php
// Datos de conexion a la base de datos
$servidor = 'localhost';
$usuario = 'root';
$pass = '';
$bd = 'citas';

// Nos conectamos a la base de datos
$conexion = new mysqli($servidor, $usuario, $pass, $bd);

// Definimos que nuestros datos vengan en utf8
$conexion->set_charset('utf8'); 

if ($conexion->connect_error){
	die("No hay Conexion con la base de datos: " . $db->connect_error);
}

// Url donde estara el proyecto, debe terminar con un "/" al final
$base_url = "http://localhost/Chabely/";
?>
