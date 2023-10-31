<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/Main_controller.php");

require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/Crud_controller.php");

$controller_main = new Main_controller();
$controller_crud = new Crud_controller();

$urlCompleta = $_SERVER["REQUEST_URI"];
$urlPartida = explode("?", $urlCompleta);
$url = $urlPartida[0];

// if role is admin then redirect to the admin dashboard and the same with other roles
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  switch ($url) {
      case "/index.php":
          $controller_main->index();
          break;
      case "/create_view":
          $controller_main->crear_page();
          break;
      case "/create_class_view":
          $controller_main->crear_class_page();
          break;
      case "/edit_maestro":
        $controller_crud->edit_maestro($_GET["id"]);
        case "/edit_class":
        $controller_crud->edit_class_page($_GET["id"]);
        break;
      case "/edit_alumno":
        $controller_crud->edit_alumno($_GET["id"]);
        break;
      default:
          echo "No se encuentra la URL";
          break;
        }
      }

if($_SERVER["REQUEST_METHOD"]=== "POST"){
  switch ($url) {
    
    case "/log":
      $controller_main->logger($_POST);
      break;
    //Actualiza controlador y Model para la funcion para crear usuarios  
    case '/create':
      $controller_crud->adding($_POST);
      break;

    case '/create_class':
      $controller_crud->adding_class($_POST);
      break;

    case '/delete_clase';
      $controller_crud->deleting_class($_POST["clase_id"]);
      break;

    case '/update_class';
      $controller_crud->updating_class($_POST);
      break;

    case '/delete_alumno';
      $controller_crud->deleting($_POST["alumno_id"]);
      break;
    
    case '/delete_maestro';
      $controller_crud->deleting_maestro($_POST["maestro_id"]);
      break;

    case "/update_maestro":
      $controller_crud->update_maestro($_POST);
      break;

    case "/update_alumno":
      $controller_crud->update_alumno($_POST);
      break;
      
    default:
      echo "No se encuentra la URL";
      break;
  }
}