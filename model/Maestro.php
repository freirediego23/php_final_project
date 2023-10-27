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


}