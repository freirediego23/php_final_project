<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php");

class Alumno {

  public static function login_alumno($email, $password){
    //extract($data);
    
    $query = "select * from alumnos WHERE email = '$email' AND passwords = '$password'";
    $res = DB::query($query);
    $info = $res->fetchAll(PDO::FETCH_ASSOC);
    //if ($email === $info[0]["email"]) {
      return $info;
    //}
  }

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

  public static function all_alumno(){
    $query = "select * from alumnos";
    $res = DB::query($query);
    $info = $res->fetchAll(PDO::FETCH_ASSOC);
    //if ($email === $info[0]["email"]) {
      return $info;
  }
}