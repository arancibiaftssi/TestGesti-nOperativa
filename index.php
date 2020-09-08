<!DOCTYPE html>
<?php

$ContadorRegistro = 0;

//Api de los datos del vendedor 
$direccionVendedor ="https://api.mercadolibre.com/sites/MLA/search?seller_id=179571326";
$json = file_get_contents($direccionVendedor);
$productosPublicados = json_decode($json,true);


//archivo para la creación del log
$file = fopen("log.txt", "w");

//recorrer los productos que tiene publicado el vendedor
foreach ($productosPublicados['results'] as $item)
{
$ContadorRegistro++;    
//esta es la url para el nombre de las categorias
$direccionCategorias = "https://api.mercadolibre.com/categories/".$item["category_id"];
$jsonCategorias = file_get_contents($direccionCategorias);
$nombreCategorias = json_decode($jsonCategorias,true);

// si se necesita confirmación visual de los productos descomentar linea de abajo
// echo $item["id"].", ".$item["title"].", ".$item["category_id"].", ".$nombreCategorias["name"]."<br>";

//escribir fichero
fwrite($file, $item["id"].", ".$item["title"].", ".$item["category_id"].", ".$nombreCategorias["name"]. PHP_EOL);

}
//cerrar archivo
fclose($file);

echo "Log creado con:".$ContadorRegistro." registros.";



?>































