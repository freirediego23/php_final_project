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
}