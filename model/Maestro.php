<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php");

class Maestro {

  public static function login_maestro($email, $password){
    //extract($data);
    
    $query = "select * from maestros WHERE email = '$email' AND passwords = '$password'";
    $res = DB::query($query);
    $info = $res->fetchAll(PDO::FETCH_ASSOC);
    //if ($email === $info[0]["email"]) {
      return $info;
    //}
    
  }

  public static function maestro_data($email, $password){

    $query = "select
    maestros.nombres as nombre_maestro ,
    alumnos.nombres as nombre_alumno,
    alumnos.email as email_alumno ,
    clases.nombre_clase
  from
    clases_maestros
  inner join maestros on
    clases_maestros.maestro_id = maestros.id
  inner join clases_alumnos on
    clases_alumnos.clase_id = clases_maestros.clase_id
  inner join alumnos on
    clases_alumnos.alumno_id = alumnos.id
  inner join clases on
    clases_maestros.clase_id = clases.id 
    where maestros.email = '$email' AND maestros.passwords = '$password'";

    $res = DB::query($query);
    $info = $res->fetchAll(PDO::FETCH_ASSOC);

    return $info;

  }

  public static function all_maestros(){
    $query = "select * from maestros";
    $res = DB::query($query);
    $info = $res->fetchAll(PDO::FETCH_ASSOC);
    //if ($email === $info[0]["email"]) {
      return $info;
  }


  // Agregar un maestro
  public static function add_maestro($data){
    extract($data);
    $query = "insert into maestros(nombres, email, passwords, rol_type) values ('$nombres', '$email', '$password', '$roles')";

    $res = DB::query($query);
    if ($res) {
      return true;
    }

  }


  // BORRAR un maestro
  public static function erase_maestro($id){
    
    $query = "delete from maestros where id =$id";

    $res = DB::query($query);
    if ($res) {
      return true;
    }

  }

  // Encontrar un maestro
  public static function find_maestro($id){
    
    $query = "select * from maestros where id =$id;";

    $res = DB::query($query);
    $data = $res->fetchAll(PDO::FETCH_ASSOC);
    return $data;

  }

  // Actualizar un maestro
  public static function actualiza_maestro($data){
    $id = $data["id"];
    $nombre = $data["nombre"];
    $email = $data["email"];
    $passwrd = $data["password"];
    $rol = $data["roles"];

    $query = "update maestros set nombres = '$nombre', email = '$email', passwords = '$passwrd', rol_type = '$rol' where id =$id;";

    $res = DB::query($query);
    if ($res) {
      return $res;
    }
    // $datos = $res->fetchAll(PDO::FETCH_ASSOC);
    // return $datos;

  }

  public static function update_rol_type_maestro($id, $rol_type) {
    $query = "UPDATE maestros SET rol_type = '$rol_type' WHERE id = '$id'";
    
    // Execute the query with prepared statements
    $res = DB::query($query);
    
    return $res;
}

// De maestro a alumno/////////

public static function update_rol_type_alumno($id, $rol_type){
  $query = "UPDATE alumnos SET rol_type = '$rol_type' WHERE id = '$id'";

  $res = DB::query($query);
  return $res;

}

// Agrega como alumno en tabla alumno si cambia el rol

public static function add_table_alumno($data){
  extract($data);
  $query = "insert into alumnos(nombres, email, passwords, rol_type) values ('$nombre', '$email', '$password', '$roles')";

  $res = DB::query($query);
  if ($res) {
    return $res;
  }
}
  

}