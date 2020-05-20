<?php
  include_once("funcion.php");
  session_start();
 
    $mensajes = $_SESSION["mensajes"];
    $telefonos = $_SESSION["telefonos"];
    $port = 3;
   for ($i=0; $i < count($mensajes) ; $i++) 
    { 
      $data = ["event" => "txsms","num" => "$telefonos[$i]","port" => "$port","encoding" => "0","smsinfo"
     => "$mensajes[$i]"];
       CallAPI("POST","http://192.168.1.240/API/SendSMS",$data);
       if ($port = 1){ $port = 3;}else{$port = 1;}
       sleep(10);

    }
   
    $_SESSION["telefonos"] = null;
    $_SESSION["mensajes"] = null;
  header("Location:index.php?page=0");
?>