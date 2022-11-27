<?php
// Incluimos nuestro archivo config
include './config.php';

//Obtener url
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
$url.= $_SERVER['HTTP_HOST'];
$url.= $_SERVER['REQUEST_URI'];

//obtener parametros de la url
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$sql='SELECT * FROM agenda WHERE id_ser='.$params['id'];

// Verificamos si existe un dato
if ($conexion->query($sql)->num_rows)
{ 
    // creamos un array
    $datos = array(); 

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0; 

    // Ejecutamos nuestra sentencia sql
    $e = $conexion->query($sql); 

    while($row=$e->fetch_array()) // realizamos un ciclo while para traer los agenda encontrados en la base de dato
    {
        // Alimentamos el array con los datos de los agenda
        $datos[$i] = $row; 
        $i++;
    }

    // Transformamos los datos encontrado en la BD al formato JSON
        echo json_encode(
                array(
                    "success" => 1,
                    "result" => $datos
                )
            );

    }
    else
    {
        // Si no existen agenda mostramos este mensaje.
        echo "No hay datos"; 
    }
?>