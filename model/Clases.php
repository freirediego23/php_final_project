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
}