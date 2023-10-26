<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Admin.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Maestro.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Alumno.php");

class Main_controller {
  
  public function index(){

  include $_SERVER["DOCUMENT_ROOT"] . "/views/login.php";
  }

  public function logger($data){

   // extract($data);
    var_dump($data);

    $email = $data['email'];
    $password = $data['password'];
    
    // Check the user's role
    $admin = Admin::login_admin($email, $password);
    $alumno = Alumno::login_alumno($email, $password);
    $maestro = Maestro::login_maestro($email, $password);

    if ($admin) {
      // User is an admin
      // Perform actions for admin
      header("Location: /views/dash_admin.php");
    } elseif ($alumno) {
      // User is an alumno
      // Perform actions for alumno
      header("Location: /views/dash_alumno.php");
    } elseif ($maestro) {
      // User is a maestro
      // Perform actions for maestro
      header("Location: /views/dash_maestro.php");
    } else {
      header("Location: /index.php");
      // Invalid login
      // Handle invalid login, show an error message, or redirect to a login error page
    }

    
      //if ($roles === "admin") {
      //session_start();
     // header("Location: /views/dash_admin.php");
    // } //if ($roles === "maestro") {
    //   //session_start();
    //    header("Location: /views/dash_maestro.php");
    // } if ($roles === "alumno") {
    //    //session_start();
    //    header("Location: /views/dash_alumno.php");
    //  } else {
    //    echo "There is no response of login";
    //  }

  }
}