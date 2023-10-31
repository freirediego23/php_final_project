<?php 
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: ../index.php");
 
  exit();
}

$clase= $_SESSION["clase2"];

?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="stylesheet" href="/src/style.css">
  <title>Editar Clase</title>
</head>

<body>

  <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
    <a href="/views/dash_admin.php">Volver</a>
    <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
      <h1 class="text-2xl font-bold mb-8">Editar Informacion de Clase</h1>
      <form id="form" action="/update_class" method="post">
        <input type="text" hidden name="id" value="<?= $clase[0]["id"] ?>">
        <div class="relative z-0 w-full mb-5">
          <input type="text" name="nombre" value="<?= $clase[0]["nombre_clase"] ?>" placeholder=" " required
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
          <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nombre de Clase</label>

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