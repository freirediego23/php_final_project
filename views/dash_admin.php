<?php 
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: ../index.php");
  var_dump($_SESSION["user"]);
  exit();
}
$administrador = $_SESSION["user"];
$alumnos= $_SESSION["alumnos"];
$maestros= $_SESSION["maestros"];
$clases= $_SESSION["class"];


//var_dump($maestros);
// var_dump($alumnos);
// var_dump($administrador);
// var_dump($clases);
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/output.css" rel="stylesheet">
</head>

<body>
  <h1 class="text-3xl font-bold underline">
    Dashboard for admin
  </h1>
  <a class="text-red" href="/model/Logout.php">Logout</a>
  <h3>Bienvenido <?= $administrador[0]["email"]?></h3>
  <p>Puedes agregar, modificar, o remover registros de alumnos y profesores</p>
  <br>

  <a class="text-blue-500" href="/create_view">Crear</a>

  <h3>Lista de Maestros</h3>
  <!-- Tabla de maestros -->
  <table>
    <thead>
      <tr>
        <td>Maestro</td>
        <td>Email</td>
        <td>Rol</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($maestros as $entry){ ?>
      <tr>
        <td><?php echo $entry["nombres"]; ?></td>
        <td><?php echo $entry["email"]; ?></td>
        <td><?php echo $entry["rol_type"]; ?></td>
        <td><a href="#">editar</a></td>
        <td><a href="#">eliminar</a></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
  <br>
  <!-- Tabla de alumnos -->
  <h3>Lista de Alumnos</h3>
  <table>
    <thead>
      <tr>
        <td>Alumno</td>
        <td>Email</td>
        <td>Rol</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($alumnos as $entry){ ?>
      <tr>
        <td><?php echo $entry["nombres"]; ?></td>
        <td><?php echo $entry["email"]; ?></td>
        <td><?php echo $entry["rol_type"]; ?></td>
        <td><a href="#">editar</a></td>
        <td><a href="#">eliminar</a></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
  <br>
  <!-- Tabla de Clases -->
  <h3>Lista de Clases</h3>
  <table>
    <thead>
      <tr>
        <td>Id</td>
        <td>Clase</td>

      </tr>
    </thead>
    <tbody>
      <?php foreach($clases as $entry){ ?>
      <tr>
        <td><?php echo $entry["id"]; ?></td>
        <td><?php echo $entry["nombre_clase"]; ?></td>
        <td><a href="#">editar</a></td>
        <td><a href="#">eliminar</a></td>
      </tr>
      <?php }?>
    </tbody>
  </table>

</body>

</html>