<?php 
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: ../index.php");
  //var_dump($_SESSION["user"]);
  exit();
}
$administrador = $_SESSION["user"];
$maestros= $_SESSION["maestros"];
$alumnos= $_SESSION["alumnos"];

$clases= $_SESSION["class"];

?>


<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/output.css" rel="stylesheet">
  <title>Admin Page</title>
</head>

<body>

  <div class="bg-[#fff5d2] inline-block w-full">
    <nav class="border-gray-200   dark:bg-gray-800 dark:border-gray-700">
      <div class="max-w-screen-xl  flex flex-wrap items-center justify-between p-4">
        <a href="#" class="flex items-center">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Admin Dashboard</span>
        </a>


      </div>
    </nav>
  </div>

  <!-- TESTEANDO -->
  <div class="ml-5 mt-5">
    <a class="text-red" href="/model/Logout.php">Logout</a>
    <p>Puedes agregar, modificar, o remover registros de alumnos y profesores</p>
  </div>

  <div class=" block mb-7 ml-5 mt-7 text-white  py-2">
    <a class=" bg-blue-500 rounded-lg p-2" href="/create_view">Crear Usuario</a>
  </div>

  <h1 class="ml-7 mb-7 font-bold text-2xl">Tabla Alumnos</h1>
  <table id="" class="display" style="width:100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Rol</th>
        <th>edit</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($alumnos as $entry){ ?>
      <tr>
        <td><?php echo $entry["nombres"]; ?></td>
        <td><?php echo $entry["email"]; ?></td>
        <td><?php echo $entry["rol_type"]; ?></td>
        <td>
          <a href="/edit_alumno?id=<?= $entry["id"] ?>">Editar</a>
          <form action="/delete_alumno" method="post">
            <button class="text-red-500" type="submit" name="alumno_id" value="<?= $entry["id"] ?>">Eliminar</button>
          </form>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>

  <h1 class="ml-7 mb-7 mt-7 font-bold text-2xl">Tabla Maestros</h1>
  <table id="" class="display" style="width:100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Rol</th>
        <th>edit</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($maestros as $entry){ ?>
      <tr>
        <td><?php echo $entry["nombres"]; ?></td>
        <td><?php echo $entry["email"]; ?></td>
        <td><?php echo $entry["rol_type"]; ?></td>
        <td>
          <a href="/edit_maestro?id=<?= $entry["id"] ?>">Editar</a>
          <form action="/delete_maestro" method="post">
            <button class="text-red-500" type="submit" name="maestro_id" value="<?= $entry["id"] ?>">Eliminar</button>
          </form>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>

  <h1 class="ml-7 mb-5 mt-7 font-bold text-2xl">Tabla Clases</h1><br>
  <div class="block text-white p-2 ml-6 mb-6">
    <a class=" bg-blue-500 rounded-lg p-2" href="/create_class_view">Crear Clase</a>
  </div>
  <table id="" class="display" style="width:100%">
    <thead>
      <tr>
        <th>id</th>
        <th>Clase</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($clases as $entry){ ?>
      <tr>
        <td><?php echo $entry["id"]; ?></td>
        <td><?php echo $entry["nombre_clase"]; ?></td>

        <td>
          <a href="/edit_class?id=<?= $entry["id"] ?>">Editar</a>
          <form action="/delete_clase" method="post">
            <button class="text-red-500" type="submit" name="clase_id" value="<?= $entry["id"] ?>">Eliminar</button>
          </form>
        </td>
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