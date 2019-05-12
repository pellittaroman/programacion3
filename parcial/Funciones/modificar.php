<?php
include_once "./Clases/productos.php";
include_once "./Funciones/agregarFoto.php";

if(isset($_POST["id"]) isset($_POST["nombre"]) && isset($_POST["precio"])&& isset($_FILES["imagen"]) && isset ($_POST["usuario"]) )
{
    
    $miClase = new producto();
   
    $arrayMiClase = producto::leerArchivo("./Archivos/productos.txt");
   	$flag=false;
   	$foto=cargar($_FILES["imagen"],$_POST["id"]);
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
    	$miClase -> miConstructor($_POST["id"], $_POST["nombre"],$_POST["precio"],$foto,$_POST["usuario"]);
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