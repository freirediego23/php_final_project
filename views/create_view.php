<?php 
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: ../index.php");
  var_dump($_SESSION["user"]);
  exit();
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Create a new user</h3>
  <br>
  <a href="/views/dash_admin.php">Back</a>
  <form action="/create.php" method="post">

    <label for="">Nombre</label><br>
    <input type="text" name="nombres">
    <br>
    <label for="">Email</label><br>
    <input type="text" name="email">
    <label for="">Rol</label>
    <select name="roles" id="">
      <option value="admin">Admin</option>
      <option value="alumno">Alumno</option>
      <option value="maestro">Maestro</option>
    </select>
  </form>
</body>

</html>