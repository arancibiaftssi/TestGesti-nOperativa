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


///sites/{Site_id}/categories
///categories/{Category_id}

/*
Cómo parte de nuestras tareas en soporte, tenemos la necesidad de consultar
información masivamente. Para poder agilizar estas tareas necesitamos construir un
script que nos permita realizar la siguiente tarea:
1. Recorrer todos los ítems publicados por el seller_id = 179571326 del
site_id = "MLA"
2. Generar un archivo de LOG que contenga los siguientes datos de
cada ítem:
a. " id " del ítem, " title " del item, " category_id " donde está
publicado, " name " de la categoría.
(*) Usar como ayuda el siguiente site http://developers.mercadolibre.com/
● Tu tarea consiste en: construir el script en cualquier lenguaje de
programación para realizar lo anteriormente solicitado. Hacerlo de forma
genérica para poder re-utilizarlo con uno o múltiples users como entrada.
● En el caso que no puedas resolverlo en algún lenguaje de programación,
detallar todas las APIs que encontraste y armar la estructura en
pseudocódigo.
Algunos requisitos:
● El script debe estar subido a una cuenta de github para que todos podamos
descargarlo (pasar link).
● Debe tener documentación explicando como usarlo.
● Subir el file de output generado por el script
 *  */

?>



<html>

    
</html>




























