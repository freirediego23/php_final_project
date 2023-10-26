<?php
// Conexión a la base de datos
class DB
{
    public static function connect()
    {
        $dsn = "mysql:host=localhost;dbname=escuela";
        $options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];

        $pdo = new PDO($dsn, "root", "", $options);

        return $pdo;
    }

    public static function query($string)
    {
        $pdo = DB::connect();
        $res = $pdo->query($string);

        return $res;
    }
}