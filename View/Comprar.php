<?php
require_once '../Model/Conexion/Conexion.php';
require_once '../Model/Productos.php';
require_once '../Controller/RopaControler.php';

if (isset($_GET['id'])) {
    $ProductoID = intval($_GET['id']);

    $RopaControler = new RopaControler();
    $Producto = $RopaControler->ObtenerProductoPorID($ProductoID);

    if ($Producto):
        ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Comprar Producto</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="#" class="navbar-brand">Tienda de Ropa</a>
  </div>
</nav>
<div class="container mt-4">
    <h1 class="mb-4">Comprar Producto</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($Producto['Nombre']); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($Producto['Descripcion']); ?></p>
            <p class="card-text"><strong>Precio:</strong> $<?php echo htmlspecialchars($Producto['Precio']); ?></p>
            <p class="card-text"><strong>Talla:</strong> <?php echo htmlspecialchars($Producto['Talla']); ?></p>
            <p class="card-text"><strong>Color:</strong> <?php echo htmlspecialchars($Producto['Color']); ?></p>
            <p class="card-text"><strong>En Stock:</strong> <?php echo htmlspecialchars($Producto['CantidadEnStock']); ?></p>
            <form action="ProcesarCompra.php" method="post">
                <input type="hidden" name="ProductoID" value="<?php echo $Producto['ProductoID']; ?>">
                <div class="mb-3">
                    <label for="Cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="Cantidad" name="Cantidad" min="1" max="<?php echo $Producto['CantidadEnStock']; ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Confirmar Compra</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
    else:
        echo "Producto no encontrado.";
    endif;
} else {
    echo "ID de producto no especificado.";
}
?>


