<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Admin.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Maestro.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Alumno.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Clases.php");

class Crud_controller {

  // From chatgpt
//   public function adding($data) {
//     session_start();

//     $added = false; 

//     if ($data['roles'] === "alumno") {
//         $added = Alumno::add_alumno($data); // Insert data into the "alumnos" table.
//     } elseif ($data['roles'] === "maestro") {
//         $added = Maestro::add_maestro($data); // Insert data into the "maestros" table.
//     }

//     if ($added) {
//         // Update the session data based on the role
//         if ($data['roles'] === "alumno") {
//             $updated_alumnos = Alumno::all_alumno();
//             $_SESSION["alumnos"] = $updated_alumnos;
//         } elseif ($data['roles'] === "maestro") {
//             $updated_maestros = Maestro::all_maestros();
//             $_SESSION["maestros"] = $updated_maestros;
//         }

//         header("Location: /views/dash_admin.php");
//     }
// }


  

public function adding ($data) {
  session_start();

  $added = false;

  //$added = Alumno::add_alumno($data);
  //$added_maestro = Maestro::add_maestro($data);
  var_dump($added);

  if ($data['roles'] === "alumno") {
    $added = Alumno::add_alumno($data); // Insert data into the "alumnos" table.
} elseif ($data['roles'] === "maestro") {
    $added = Maestro::add_maestro($data); // Insert data into the "maestros" table.
}



if ($added) {
  
  
  //$alumno_id = $_SESSION["user"][0]["id"]; // Fetch alumno_id from session

  if ($data['roles'] === "alumno") {
    // Tuve que hacer un query directo porque
    // el metodo no retornaba el ult id
    $lastInsertId = DB::query("SELECT id from alumnos order by id desc limit 1")->fetchColumn();
    $_SESSION["user"][0]["id"] = $lastInsertId;

    // Insert into clases_alumnos table
    $clase_id = $data['clase_id']; // Get selected clase_id from form
    $inserted = Clases::add_clase_alumno($lastInsertId, $clase_id); // Custom method to add in clases_alumnos

    if ($inserted) {
      $updated_alumnos = Alumno::all_alumno();
      $_SESSION["alumnos"] = $updated_alumnos;
      header("Location: /views/dash_admin.php");
    } else {echo "no data";} 
    
    
    }
    
    elseif ($data['roles'] === "maestro") {
      $lastInsertId = DB::query("SELECT id from maestros order by id desc limit 1")->fetchColumn();
      $_SESSION["user"][0]["id"] = $lastInsertId;

      // Insert into clases_maestro table
      $clase_id = $data['clase_id']; // Get selected clase_id from form
      $inserted = Clases::add_clase_maestro($lastInsertId, $clase_id); // Custom method to add in clases_maestro
     
      if ($inserted) {
        $updated_maestros = Maestro::all_maestros();
        $_SESSION["maestros"] = $updated_maestros;
        header("Location: /views/dash_admin.php");
      }
      
    
    }
}


// if ($added) {

//   $alumno_id = $_SESSION["user"][0]['id'];

//   // Update the session data based on the role
//   if ($data['roles'] === "alumno") {
//       $updated_alumnos = Alumno::all_alumno();
//       $_SESSION["alumnos"] = $updated_alumnos;
  // } elseif ($data['roles'] === "maestro") {
  //     $updated_maestros = Maestro::all_maestros();
  //     $_SESSION["maestros"] = $updated_maestros;
  // }

//   header("Location: /views/dash_admin.php");
// }

} 


public function deleting($id) {
  session_start();
  
 
  $deleted = Alumno::erase_alumno($id);
  $deleted2= Alumno::erase_alumno_class($id);
  
  if($deleted && $deleted2) {
    //Actualiza la sesion despues de borrar los valores
    $todosalumnos = Alumno::all_alumno();
    $_SESSION["alumnos"] = $todosalumnos;
    //var_dump($deleted2);
    header("Location:/views/dash_admin.php");
  }
}

public function deleting_maestro($id) {
  session_start();

  
  $deleted = Maestro::erase_maestro($id);
  
  if($deleted ) {
    //Actualiza la sesion despues de borrar los valores
    $todomaestros = Maestro::all_maestros();
    $_SESSION["maestros"] = $todomaestros;
    //var_dump($deleted2);
    header("Location:/views/dash_admin.php");
  }
}
  
}