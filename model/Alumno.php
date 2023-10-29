<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php");

class Alumno {

  public static function login_alumno($email, $password){
    //extract($data);
    
    $query = "select * from alumnos WHERE email = '$email' AND passwords = '$password'";
    $res = DB::query($query);
    $info = $res->fetchAll(PDO::FETCH_ASSOC);
    
      return $info;
    
  }

  /*Alumnos con su clase asignada */
  public static function alumno_data($email, $password){
    $query ="select
    alumnos.nombres ,
    clases.nombre_clase
  from
    clases_alumnos
  inner join alumnos on
    clases_alumnos.alumno_id = alumnos.id
  inner join clases on
    clases_alumnos.clase_id = clases.id where alumnos.email = '$email'AND alumnos.passwords = '$password'";
    
    $res = DB::query($query);
    $info = $res->fetchAll(PDO::FETCH_ASSOC);
    
      return $info;
  }

  // Todos los alumnos
  public static function all_alumno(){
    $query = "select * from alumnos";
    $res = DB::query($query);
    $info = $res->fetchAll(PDO::FETCH_ASSOC);
    //if ($email === $info[0]["email"]) {
      return $info;
  }

// Agregar un alumno
  public static function add_alumno($data){
    extract($data);
    $query = "insert into alumnos(nombres, email, passwords, rol_type) values ('$nombres', '$email', '$password', '$roles')";

    $res = DB::query($query);
    if ($res) {
      return true;
    }

  }

  public static function ult_alumno(){
    
    $query = "SELECT id from alumnos order by id desc limit 1";

    $res = DB::query($query)->fetchAll();
    if ($res) {
      return true;
    }
  }

  public static function erase_alumno($id) {
    $query = "delete from alumnos where id =$id";
    $res = DB::query($query);

    if($res){
      return true;
    }
  }

  public static function erase_alumno_class($id) {
    $query = "delete from clases_alumnos where alumno_id =$id";
    $res = DB::query($query);

    if($res){
      return true;
    }
  }

}