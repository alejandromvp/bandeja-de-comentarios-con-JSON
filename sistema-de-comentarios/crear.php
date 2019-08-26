<?php

 $com =  strip_tags($_POST['mensaje']);
 $nick =  strip_tags($_POST['nick']);
 $fecha =  strip_tags($_POST['fecha']);


 $raiz = file_get_contents("bd/com.json");
 $raiz = json_decode($raiz);
 
 $array = array("con" => $com, "nick"  => $nick,"fecha"  => $fecha);
 
 $raiz[sizeof($raiz)] =  $array;
 
 echo json_encode($raiz);
 
 $f = fopen("bd/com.json","w");
 fwrite($f,json_encode($raiz));
 fclose($f);
 

?>	