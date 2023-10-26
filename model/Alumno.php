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

}