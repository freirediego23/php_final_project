<?php 
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: ../index.php");
  var_dump($_SESSION["user"]);
  exit();
}

$datos_alumno = $_SESSION["data_alumno"];
$alumno = $_SESSION["user"];
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Dashboard del alumno</h2>
  <h3>Bienvenido <?= $alumno[0]["nombres"] ?></h3>

  <a href="/model/Logout.php">Logout</a>

  <table>
    <thead>
      <tr>
        <td>Nombre del alumno</td>
        <td>Clase</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($datos_alumno as $entry){ ?>
      <tr>
        <td><?php echo $entry['nombres']; ?></td>
        <td><?php echo $entry['nombre_clase']; ?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>


</body>

</html>