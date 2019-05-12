<?php
include_once "./Clases/producto.php";
include_once "./Funciones/cargarFoto.php";

if(isset ($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["precio"]) isset ($_FILES ["imagen"]) && isset($_POST["usuario"]) )
{
    
    $miClase = new producto();
    $foto=cargar($_FILES,$_POST["id"])
    $arrayMiClase = producto::leerArchivo("./Archivos/producto.txt");
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
    if($flag==false)
    {
    	$miClase -> miConstructor($_POST["id"], $_POST["nombre"], $_POST["precio"], $foto, $_POST ["usuario"]);
    	$miClase -> guardarArchivo("./Archivos/producto.txt");
    }
    else {
    	echo "ID repetido";
    }
    
    }
    else
    {
        $miClase -> miConstructor($_POST["id"], $_POST["nombre"], $_POST["precio"], $foto, $_POST ["usuario"]);
        $miClase -> guardarArchivo("./Archivos/producto.txt");
    }
    
}
else
{
    echo "falta completar datos";
}

?>