<?php 
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: ../index.php");
 
  exit();
}

$maestros= $_SESSION["maestros2"];

// Traje la informacion desde la db en Maestro::find_maestro en crud controller, guardo los resultados en una variable de sesion que estoy mostrando en esta vista para editar. En el miniproyecto lo traje desde un model pero aqui lo traigo de un model en el controller y lo guardo en una variable de sesion para mostrarlo.

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="stylesheet" href="/src/style.css">
  <title>Editar Maestro</title>
</head>

<body>


  <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
    <a href="/views/dash_admin.php">Volver</a>
    <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
      <h1 class="text-2xl font-bold mb-8">Editar Informacion de Maestro</h1>
      <form id="form" action="/update_maestro" method="post">
        <input type="text" hidden name="id" value="<?= $maestros[0]["id"] ?>">
        <div class="relative z-0 w-full mb-5">
          <input type="text" name="nombre" value="<?= $maestros[0]["nombres"] ?>" placeholder=" " required
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
          <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nombre</label>

        </div>

        <div class="relative z-0 w-full mb-5">
          <input type="text" name="email" placeholder=" " value="<?= $maestros[0]["email"] ?>"
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
          <label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Email</label>

        </div>

        <div class="relative z-0 w-full mb-5">
          <input type="text" name="password" placeholder=" " value="<?= $maestros[0]["passwords"] ?>"
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
          <label for="password" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Password</label>

        </div>

        <div class="relative z-0 w-full mb-5">
          <select name="roles"
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200">
            <option value="admin">Admin</option>
            <option value="alumno">Alumno</option>
            <option value="maestro">Maestro</option>
          </select>

          <label for="rol" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Rol</label>

        </div>



        <button id="button" type="submit"
          class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none">
          Actualizar
        </button>
      </form>
    </div>
  </div>


</body>

</html>