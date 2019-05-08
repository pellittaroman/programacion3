<?php

class productos
{
    public $id;
    public $nombre;
    public $precio;
    public $foto=$_FILES;

    public function miConstructor($id,$nombre, $precio,$foto)
    {
        $this -> id=$id;
        $this -> nombre = $nombre;
        $this -> precio = $precio;
       	$this -> $foto;
    }

    public function retornarJSon()
    {
        return json_encode($this);
    }

    

    public function guardarArchivo($path)
    {
        if($path != null)
        {
            $archivo = $path;
            $actual = $this -> retornarJSon();
            
            if(file_exists($archivo))
            {
                $archivo = fopen($path, "a");		 
            }else
            {
                $archivo = fopen($path, "w");	 
            }
            
            $renglon = $actual.="\r\n";
            
            fwrite($archivo, $renglon); 		 
            fclose($archivo);
        }
    }

    public static function leerArchivo($path)
    {
        $archivo = $path;
		if(file_exists($archivo))
		{
			$gestor = @fopen($archivo, "r");
			$array = array();
			$i = 0;
			while (($bufer = fgets($gestor, 4096)) !== false)
        	{
                $miClase = new producto();
                $miClase = json_decode($bufer, true);
        		$array[$i] = $miClase;
        		$i++;
           	}
           	
           	if (!feof($gestor)) 
    		{
       	 		echo "Error: fallo inesperado de fgets()\n";
            }		
            	
    		fclose($gestor);
    		return $array;
		}   	
    }

   
}
?>