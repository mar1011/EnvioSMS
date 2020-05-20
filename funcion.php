<?php
include_once('config_global.php');

function verificar($nombre,$apellido,$mail){

    if(empty($nombre) || empty($apellido) || empty($mail) ){
        $error=true;

}else{
    $error=false;
}
return($error);
}


function imprimir_detalle($ruta,$tipo)
{
    return file_exists($ruta) ? limpiar_string(file_get_contents($ruta)) : "Sin $tipo";
}

function ontenerContenido($dir)
{
    $contenido = array();
    $cdir = scandir($dir);
    foreach ($cdir as $key => $c)
    {
       if (!in_array($c,array(".","..")))
       {

             $contenido[] = $c;
       }
    }
   
    return $contenido;
}

function limpiar_string($str){
    return nl2br(htmlentities(trim($str)));
}

function nombre_limpio($carpeta){
    $nombre = trim($carpeta);
    $nombre = strtolower($nombre);

    $nombre = str_replace(" ","_",$nombre);

    return $nombre;
}

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();
    

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
        
            if ($data)
                $postdata = json_encode($data);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            break;
        
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //ApiUserAdmin -> {"result":"error","content":"request error"}
    //admin -> {"result":"error","content":"username error"}
    curl_setopt($curl, CURLOPT_USERPWD, 'ApiUserAdmin' . ':' . 'M0rph3u5');

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}
