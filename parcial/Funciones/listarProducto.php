<?php
include_once "./Clases/producto.php";

    $miClase = new producto();
    $arrayMiClase = producto::leerArchivo("./Archivos/producto.txt");
   	
   	
    $i = 0;
    if($arrayMiClase!=null)
    {
    foreach($arrayMiClase as $value)
    {
        echo "ID: $value["id"] -- Nombre: $value["nombre"] -- Precio: $value["precio"] -- Foto: $value["foto"] -- Usuario: $value["usuario"]";
        $i++;
    }
    
    }
    else
    {
        echo "Error al leer el archivo";
    }

?>