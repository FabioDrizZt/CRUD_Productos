<?php

$PDO = new PDO("mysql:host=localhost; port=3306; dbname=crud_productos", "root", "");
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* echo "<pre>";
var_dump($_POST);
echo "</pre>"; */

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $consulta = $PDO->prepare("INSERT INTO productos(nombre, imagen, precio, descripcion)
                            VALUE(:nombre, :imagen, :precio, :descripcion)");
    $consulta->bindValue(":nombre", $_POST['nombre']);
    $consulta->bindValue(":imagen", $_POST['imagen']);
    $consulta->bindValue(":precio", $_POST['precio']);
    $consulta->bindValue(":descripcion", $_POST['descripcion']);
    $consulta->execute();
}

$errores = [];

if (!$_POST['nombre']) {
    $errores[] = "El nombre del producto es obligatorio";
}

if (!$_POST['precio'] or $_POST['precio'] < 0) {
    $errores[] = "El precio del producto es obligatorio y debe ser positivo";
}

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
    <h1>Creación de Productos</h1>
    <a href="index.php"><button type="button" class="btn btn-success btn-lg">Volver</button></a>

    <?php foreach ($errores as $error) {?>
      <div class="alert alert-danger" role="alert">
        <?=$error?>
      </div>
    <?php }?>

    <form method="post" >

  <div class="mb-3">
    <label>Imagen</label>
    <input type="file" class="form-control" id="imagen" name="imagen">
  </div>
  <div class="mb-3">
    <label>Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" >
  </div>
  <div class="mb-3">
    <label>Descripcion</label>
    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
  </div>
  <div class="mb-3">
    <label>Precio</label>
    <input type="number" step="0.01" class="form-control" id="precio" name="precio" >
  </div>

  <button type="submit" class="btn btn-primary">Crear Producto</button>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
