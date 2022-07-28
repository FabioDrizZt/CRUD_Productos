<?php

$PDO = new PDO("mysql:host=localhost; port=3306; dbname=crud_productos", "root", "");
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$consulta = $PDO->prepare("SELECT * FROM productos ORDER BY fecha_creacion");
$consulta->execute();
$productos = $consulta->fetchAll(pdo::FETCH_ASSOC);
/* echo "<pre>";
var_dump($productos);
echo "</pre>"; */
?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis Productos</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <h1>CRUD Productos</h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imagen</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
      <th scope="col">fecha de creacion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($productos as $i => $producto) {?>
        <tr>
        <th scope="row"><?=$i + 1?></th>
        <td></td>
        <td><?=$producto['nombre']?></td>
        <td><?=$producto['descripcion']?></td>
        <td><?=$producto['precio']?></td>
        <td><?=$producto['fecha_creacion']?></td>
        </tr>
    <?php }?>
    </tbody>
</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
