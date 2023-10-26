<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/Main_controller.php");

$controller_main = new Main_controller();
$controller_main->index();


// ----- URL del navegador -----
$urlCompleta = $_SERVER["REQUEST_URI"];
// Cortamos la URL para que no muestre los query params "/edit?id=1"
$urlPartida = explode("?", $urlCompleta);
// Tomamos la primera posición porque esa es la que representa la acción "/create", "/index.php", etc...
$url = $urlPartida[0];

// if role is admin then redirect to the admin dashboard and the same with other roles

if($_SERVER["REQUEST_METHOD"]=== "POST"){
  switch ($url) {
    case '/log':
      $controller_main->logger($_POST);
      break;
    
    default:
      # code...
      break;
  }
}