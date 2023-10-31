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


  // AGREGAR CLASE NUEVA EN TABLA CLASES
  public static function add_class($info) {
    extract($info);

    $query = "INSERT INTO clases (nombre_clase) VALUES ('$nombre_clase')";
    $res = DB::query($query);
  
    if ($res) {
      return true;
    } else {
      return false;
    }
  }

  // BORRA CLASE EN TABLA CLASES
  public static function deleting_class($id) {
   

    $query = "delete from clases where id =$id";
    $res = DB::query($query);

    if($res){
      return $res;
    }
  }

  // Encontrar una clase
  public static function find_class($id){
    
    $query = "select * from clases where id =$id;";

    $res = DB::query($query);
    $data = $res->fetchAll(PDO::FETCH_ASSOC);
    return $data;

  }

  // Actualizar una clase
  public static function update_class($info){
    
    $id = $info["id"];
    $nombre = $info["nombre"];
   
    
    $query = "update clases set nombre_clase = '$nombre' where id =$id;";

    $res = DB::query($query);

    if ($res) {
      return $res;
    }

  }
  
}