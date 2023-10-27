<?php 
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: ../index.php");
  var_dump($_SESSION["user"]);
  exit();
}

$datos_maestro = $_SESSION["data_maestro"] ;

$maestro = $_SESSION["user"];
var_dump($maestro);
var_dump($datos_maestro);

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h4>Dashboard del maestro</h4>

  <h5>Bienvenido <?= $maestro[0]["nombres"] ?></h5>
  <p>Puedes ver los nombres de tus alumnos junto a la clase que impartes.</p>

  <a href="/model/Logout.php">Logout</a>

  <table>
    <thead>
      <tr>
        <td>Maestro</td>
        <td>Nombre del alumno</td>
        <td>Email Alumno</td>
        <td>Clase</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($datos_maestro as $entry){ ?>
      <tr>
        <td><?php echo $entry['nombre_maestro']; ?></td>
        <td><?php echo $entry['nombre_alumno']; ?></td>
        <td><?php echo $entry['email_alumno']; ?></td>
        <td><?php echo $entry['nombre_clase']; ?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>

</body>

</html>