<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/config/DB.php");

class Admin {
  
  public static function login_admin($email, $password){
   // extract($data);
    
    $query = "select * from admin WHERE email = '$email' AND passwords = '$password'";
    $res = DB::query($query);
    $info = $res->fetchAll(PDO::FETCH_ASSOC);
    //if ($email === $info[0]["email"]) {
      return $info;
    //}
    
  }
}