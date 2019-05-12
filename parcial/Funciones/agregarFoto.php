<?php

function cargar($file, $id)
{
	$dic = "./Fotos/";
	$dicBackup = "./FotosBackUp/";
    $nameImagen = $file["imagen"]["name"];
    $hoy = date("m.d.y");
	if($id!=null)
	{
		$datoImagen=$id."-".$hoy;
	}
    else{
        $datoImagen = "sinDatos";
    }
    
	$explode = explode(".", $nameImagen);
	$tamaño = count($explode);

	$dic .= $datoImagen;
	$dic .= ".";
	$dic .= $explode[$tamaño - 1];

	
    $dicBackup.=$datoImagen;
    $dicBackup.="."
	$dicBackup .= $dic;

	if(!file_exists($dic))
	{
        
        move_uploaded_file($_FILES["foto"]["tmp_name"], $dic);	
        	
	}
	else
	{
        copy($dic, $dicBackup);
        
		//move_uploaded_file($_FILES["foto"]["tmp_name"], $dic);
	}
    
    return $dic;
}


?>