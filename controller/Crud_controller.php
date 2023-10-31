<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Admin.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Maestro.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Alumno.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Clases.php");

class Crud_controller {

  

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
  

  if ($data['roles'] === "alumno") {
    // Tuve que hacer un query directo porque
    // el metodo no retornaba el ult id
    $lastInsertId = DB::query("SELECT id from alumnos order by id desc limit 1")->fetchColumn();
    $_SESSION["user"][0]["id"] = $lastInsertId;

    // Insert into clases_alumnos table
    $clase_id = $data['clase_id']; 
    $inserted = Clases::add_clase_alumno($lastInsertId, $clase_id); 

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



} 


public function deleting($id) {
  session_start();
  
 
  $deleted = Alumno::erase_alumno($id);
  $deleted2= Alumno::erase_alumno_class($id);
  
  if($deleted && $deleted2) {
    //Actualiza la sesion despues de borrar los valores
    $todosalumnos = Alumno::all_alumno();
    $_SESSION["alumnos"] = $todosalumnos;
   
    header("Location:/views/dash_admin.php");
  }
}

// Delete maestros
public function deleting_maestro($id) {
  session_start();

  
  $deleted = Maestro::erase_maestro($id);
  
  if($deleted ) {
    //Actualiza la sesion despues de borrar los valores
    $todomaestros = Maestro::all_maestros();
    $_SESSION["maestros"] = $todomaestros;
   
    header("Location:/views/dash_admin.php");
  }
}

// Edit maestros

public function edit_maestro($id) {
  session_start();

  
  $data = Maestro::find_maestro($id);
  
  if($data) {
    //Actualiza la sesion despues de borrar los valores
    //$todomaestros = Maestro::all_maestros();
    $_SESSION["maestros2"] = $data;
 
    
    header("Location:/views/edit_view_maestro.php");
  }
}

// ACTUALIZAR MAESTROS ////////////////

public function update_maestro($info) {
  session_start();
  $id = $info['id'];
  $clase_id = $info['clase_id'];
  $rol_type = $info['roles'];
  // Actualiza la info del maestro
  $data = Maestro::actualiza_maestro($info);

  // Si el rol se cambia a alumno
  if ($rol_type === 'alumno') {
    $result = Maestro::update_rol_type_alumno($id, $rol_type);
    $added_alumno = Maestro::add_table_alumno($info);
    $deleted_maestro = Maestro::erase_maestro($id);
  if($data) {

    // COMO SE ACTUALIZA LA VARIABLE DE SESION
    //Si el valore es true, retorna los datos en $data luego de ejecutar la query en actualiza_maestro.
    //Llama all_maestros despues para traer todos los maestros luego de haber sido actualizados
    //Guarda los valores actualizados en la variable de sesion que se muestra en la vista dash_admin
    $updated_alumnos = Alumno::all_alumno();
    $updated_maestros = Maestro::all_maestros();
    $_SESSION["alumnos"] = $updated_alumnos;
    $_SESSION["maestros"] = $updated_maestros;
    var_dump($data);
    
     header("Location: /views/dash_admin.php");
  } else {echo "No data";}
} else{ 
  $updated_maestros = Maestro::all_maestros();
  $_SESSION["maestros"] = $updated_maestros;
  header("Location: /views/dash_admin.php");}
}

//datos del alumno en la vista edit view alumnos

public function edit_alumno($id) {
  session_start();

  
  $data = Alumno::find_alumno($id);
  
  if($data) {
    //Actualiza la sesion despues de borrar los valores
    //$todomaestros = Maestro::all_maestros();
    $_SESSION["alumnos2"] = $data;
    //var_dump($deleted2);
    
    header("Location:/views/edit_view_alumnos.php");
  }
}

// Update alumno
// Actualizar la informacion del alumno en la db y la sesion, y tambien LA VISTA

public function update_alumno($info) {
  session_start();
  $id = $info['id'];
  $clase_id = $info['clase_id'];
  $rol_type = $info['roles'];

  // Actualiza la info del alumno
  $data = Alumno::actualiza_alumno($info);

  //Si el rol se cambia a maestro
  if ($rol_type === 'maestro') {
    $result = Alumno::update_rol_type($id, $rol_type);
    $added_master = Alumno::add_table_master($info);
    $deleted_alumno = Alumno::erase_alumno($id);
    

    if($data) {

    
      $updated_alumnos = Alumno::all_alumno();
      $updated_maestros = Maestro::all_maestros();
      $_SESSION["alumnos"] = $updated_alumnos;
      $_SESSION["maestros"] = $updated_maestros;
      var_dump($data);
      
       header("Location: /views/dash_admin.php");
    } else { echo "No data";}

  } else{ 
    $updated_alumnos = Alumno::all_alumno();
    $_SESSION["alumnos"] = $updated_alumnos;
    header("Location: /views/dash_admin.php");}
  
}

// AGREGAR UNA NUEVA CLASE
public function adding_class($info){
  session_start();
  $add_class = Clases::add_class($info);

  if ($add_class) {
    $todasclases = Clases::all_clases();
    $_SESSION["class"] = $todasclases;
    header("Location: /views/dash_admin.php");
  }
  
}

// BORRAR UNA CLASE
public function deleting_class($info){
  
  session_start();
  var_dump($info);
  //extract($info);
  
  $del_class = Clases::deleting_class($info);
  
  if ($del_class){
    
    $todasclases = Clases::all_clases();
    $_SESSION["class"] = $todasclases;
   
    header("Location:/views/dash_admin.php");
  }

}

// PAGINA PARA ACCEDER PAGINA DE EDITAR
public function edit_class_page($id){
  
  session_start();

  
  $data = Clases::find_class($id);
  
  if($data) {
    //Actualiza la sesion despues de borrar los valores
    //$todomaestros = Maestro::all_maestros();
    $_SESSION["clase2"] = $data;
    //var_dump($deleted2);
    
    header("Location:/views/edit_view_clases.php");
  }

}

// ACTUALIZAR LA CLASE EN DASH ADMIN 
public function updating_class($info){
  
  session_start();

  
  $data = Clases::update_class($info);
  
  if($data) {
    //Actualiza la sesion despues de borrar los valores
    $todasclases = Clases::all_clases();

    $_SESSION["class"] = $todasclases;
    //var_dump($deleted2);
    
    header("Location:/views/dash_admin.php");
  }

}
  
}