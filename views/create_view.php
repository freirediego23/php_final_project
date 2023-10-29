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
  <form action="/create" method="post">

    <label for="">Nombre</label><br>
    <input type="text" name="nombres">
    <br>
    <label for="">Email</label><br>
    <input type="text" name="email"><br>
    <label for="">Password</label><br>
    <input type="text" name="password"><br>
    <label for="">Rol</label>
    <select name="roles" id="">
      <option value="admin">Admin</option>
      <option value="alumno">Alumno</option>
      <option value="maestro">Maestro</option>
    </select>
    <br>
    <label for="">Clase</label>
    <p>deben ser numeros que correspondan a id</p>
    <select name="clase_id" id="">
      <!-- <option value="admin">clase1</option>
      <option value="alumno">clase2</option>
      <option value="maestro">clase3</option> -->
      <?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/model/Clases.php");
    $classes = Clases::all_clases(); // Fetch available classes
    foreach ($classes as $class) {
      echo "<option value='" . $class['id'] . "'>" . $class['nombre_clase'] . "</option>";
    }
    ?>
    </select>

    <!-- Add a hidden field to store alumno_id from the session -->
    <input type="hidden" name="alumno_id" value="<?php echo $_SESSION["user"][0]["id"]; ?>">

    <button type="submit">Add</button>
  </form>


</body>

</html>