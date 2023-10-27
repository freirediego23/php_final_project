<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Admin.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Maestro.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Alumno.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Clases.php");

class Main_controller {
  
  public function index(){

  include $_SERVER["DOCUMENT_ROOT"] . "/views/login.php";
  }

  public function crear_page (){
    include $_SERVER["DOCUMENT_ROOT"] . "/views/create_view.php";
  }

  public function logger($data){

  
    var_dump($data);

    $email = $data['email'];
    $password = $data['password'];
    
    // Check the user's role
    $admin = Admin::login_admin($email, $password);
    $alumno = Alumno::login_alumno($email, $password);
    $maestro = Maestro::login_maestro($email, $password);

    //Get all alumnos
    $todosalumnos = Alumno::all_alumno();
    // Get all classes listed
    $classes = Clases::all_clases();
    // Get all maestros listed
    $todosmaestros = Maestro::all_maestros();

    if ($admin) {
      // User is an admin
      // Perform actions for admin
      
      session_start();
      $_SESSION["user"] = $admin;
      $_SESSION["alumnos"] = $todosalumnos;
      $_SESSION["maestros"] = $todosmaestros;
      $_SESSION["class"] = $classes;
      var_dump($todosmaestros);
      header("Location: /views/dash_admin.php");
    } elseif ($alumno) {
      // User is an alumno
      // Perform actions for alumno
      $data_alumno = Alumno::alumno_data($email, $password);
      session_start();
      $_SESSION["user"] = $alumno;
      $_SESSION["data_alumno"] = $data_alumno;
      header("Location: /views/dash_alumno.php");
    } elseif ($maestro) {
      // User is a maestro
      // Perform actions for maestro
      $data_maestro = Maestro::maestro_data($email, $password);
      session_start();
      $_SESSION["user"] = $maestro;
      $_SESSION["data_maestro"] = $data_maestro;
      header("Location: /views/dash_maestro.php");
    } else {
      header("Location: /index.php");
      // Invalid login
      // Handle invalid login, show an error message, or redirect to a login error page
    }


  }
}