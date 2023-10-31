<?php 
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: ../index.php");
  
  exit();
}

$datos_alumno = $_SESSION["data_alumno"];
$alumno = $_SESSION["user"];


?>



<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/output.css" rel="stylesheet">
  <title>Dashboard del Alumno</title>
</head>

<body>



  <div class="bg-[#fff5d2] inline-block w-full">
    <nav class="border-gray-200   dark:bg-gray-800 dark:border-gray-700">
      <div class="max-w-screen-xl  flex flex-wrap items-center justify-between p-4">
        <a href="#" class="flex items-center">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Alumno Dashboard</span>
        </a>
      </div>
    </nav>
  </div>

  <div class="ml-5 mt-5 mb-5">
    <a class="text-red" href="/model/Logout.php">Logout</a>
    <h5>Bienvenido <?= $alumno[0]["nombres"] ?></h5>
    <p>Puedes ver los nombres de tus alumnos junto a la clase que impartes.</p>
  </div>

  <table id="" class="display" style="width:100%">
    <thead>
      <tr>
        <th>Nombre del Alumno</th>
        <th>Clase</th>
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