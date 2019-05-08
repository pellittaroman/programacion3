<?php
include_once "./Clases/productos.php";


if(isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["precio"])&&isset($_POST["foto"]) )
{
    
    $miClase = new producto();
   
    $arrayMiClase = producto::leerArchivo("./Archivos/productos.txt");
   	$flag=false;
   	
    $i = 0;
    if($arrayMiClase!=null)
    {
    foreach($arrayMiClase as $value)
    {
        if($value["id"] == $_POST["id"])
        {
            $flag= true;
            break;
        }
        $i++;
    }
    if($flag==true)
    {
    	$miClase -> miConstructor($_POST["id"], $_POST["nombre"],$_POST["precio"],$_POST["foto"]);
    	$miClase -> guardarArchivo("./Archivos/productos.txt");
    }
    else {
    	echo "No se encontro id";
    }
    
    }
    else
    {
       echo "Error al leer archivo";
    }
    
}
else
{
    echo "falta completar datos";
}

?>