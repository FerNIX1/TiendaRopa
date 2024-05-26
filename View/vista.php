<?php
require_once '../Model/Conexion/Conexion.php';
require_once '../Model/Productos.php';
require_once '../Controller/RopaControler.php';

try {
    $dbConnection = Conexion::getConexion();
    echo "Conexión exitosa a la base de datos<br>";
} catch (Exception $e) {
    die("Error de conexión: " . $e->getMessage());
}

$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
$requestUri = str_replace($scriptName, '', $_SERVER['REQUEST_URI']);
$requestUri = trim($requestUri, '/');

$path = explode('/', $requestUri)[0];

if ($path === 'view' || $path === '') {
    $RopaControler = new RopaControler();
    $Productos = $RopaControler->ListarProductos();
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tienda de Ropa</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="#" class="navbar-brand">Tienda de Ropa</a>
  </div>
</nav>
<div class="container mt-4">
    <h1 class="mb-4">Lista de Productos</h1>
    <div class="row">
        <?php if (!empty($Productos)): ?>
            <?php foreach ($Productos as $Producto): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($Producto['Nombre']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($Producto['Descripcion']); ?></p>
                            <p class="card-text"><strong>Precio:</strong> $<?php echo htmlspecialchars($Producto['Precio']); ?></p>
                            <p class="card-text"><strong>Talla:</strong> <?php echo htmlspecialchars($Producto['Talla']); ?></p>
                            <p class="card-text"><strong>Color:</strong> <?php echo htmlspecialchars($Producto['Color']); ?></p>
                            <p class="card-text"><strong>En Stock:</strong> <?php echo htmlspecialchars($Producto['CantidadEnStock']); ?></p>
                            <a href="comprar.php?id=<?php echo $Producto['ProductoID']; ?>" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">No hay productos disponibles.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
} else {
    echo "Página no encontrada";
}
?>




