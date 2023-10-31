<?php 
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: ../index.php");
  
  exit();
}

$datos_maestro = $_SESSION["data_maestro"] ;

$maestro = $_SESSION["user"];


?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/output.css" rel="stylesheet">
  <title>Dashboard del Maestro</title>
</head>

<body>
  <div class="bg-[#fff5d2] inline-block w-full">
    <nav class="border-gray-200   dark:bg-gray-800 dark:border-gray-700">
      <div class="max-w-screen-xl  flex flex-wrap items-center justify-between p-4">
        <a href="#" class="flex items-center">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Mestro Dashboard</span>
        </a>
      </div>
    </nav>
  </div>

  <div class="ml-5 mt-5">
    <a class="text-red" href="/model/Logout.php">Logout</a>
    <h5>Bienvenido <?= $maestro[0]["nombres"] ?></h5>
    <p>Puedes ver los nombres de tus alumnos junto a la clase que impartes.</p>
  </div>



  <h1 class="ml-7 mb-7 mt-7 font-bold text-2xl">Dashboard del Maestro</h1>
  <table id="" class="display" style="width:100%">
    <thead>
      <tr>
        <th>Maestro</th>
        <th>Nombre del Alumno</th>
        <th>Email Alumno</th>
        <th>Clase</th>
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

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <script>
  $(document).ready(function() {
    new DataTable('table.display');
    $('#example').DataTable({

      // Add any customization options here
    });
  });
  </script>

</body>

</html>