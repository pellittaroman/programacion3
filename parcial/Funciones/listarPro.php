<?php
include_once "./Clases/producto.php";


if(isset ($_GET["id"]) && isset($_GET["usuario"]) )
{
    
    $miClase = new producto();
   
    $arrayMiClase = producto::leerArchivo("./Archivos/producto.txt");
   	$flag=false;
   	
    $i = 0;
    if($arrayMiClase!=null)
    {
    foreach($arrayMiClase as $value)
    {
        if($value["producto"] == $_GET["id"]|| $value["usuario"]==$_GET["usuario"])
        {
            $flag= true;
            echo "ID: $value["id"] -- Nombre: $value["nombre"] -- Precio: $value["precio"] -- Foto: $value["foto"] -- Usuario: $value["usuario"]";
        }
        $i++;
    }
    if($flag==false)
    {
        echo "Usuario o producto no encontrado";
    }
}
else
{
    echo "Error al leer el archivo";
}
}
?>