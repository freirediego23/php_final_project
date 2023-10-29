<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php");

class Clases {

  public static function all_clases(){
    $query = "select * from clases";
    $res = DB::query($query);
    $info = $res->fetchAll(PDO::FETCH_ASSOC);
    //if ($email === $info[0]["email"]) {
      return $info;
  }

  public static function add_clase_alumno($alumno_id, $clase_id) {
    $query = "INSERT INTO clases_alumnos (alumno_id, clase_id) VALUES ('$alumno_id', '$clase_id')";
    $res = DB::query($query);
  
    if ($res) {
      return true;
    } else {
      return false;
    }
  }

  public static function add_clase_maestro($maestro_id, $clase_id) {
    $query = "INSERT INTO clases_maestros (maestro_id, clase_id) VALUES ('$maestro_id', '$clase_id')";
    $res = DB::query($query);
  
    if ($res) {
      return true;
    } else {
      return false;
    }
  }

  
}