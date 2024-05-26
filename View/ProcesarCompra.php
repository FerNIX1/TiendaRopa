<?php
require_once '../Model/Conexion/Conexion.php';
require_once '../Model/Productos.php';
require_once '../Controller/RopaControler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ProductoID = intval($_POST['ProductoID']);
    $Cantidad = intval($_POST['Cantidad']);

    $RopaControler = new RopaControler();
    $Producto = $RopaControler->ObtenerProductoPorID($ProductoID);

    if ($Producto && $Cantidad > 0 && $Cantidad <= $Producto['CantidadEnStock']) {
        $nuevoStock = $Producto['CantidadEnStock'] - $Cantidad;
        if ($RopaControler->ActualizarStock($ProductoID, $nuevoStock)) {
            // Redirigir al usuario a una página de confirmación de compra exitosa
            header('Location: CompraExitosa.php');
            exit();
        } else {
            // Redirigir al usuario a una página de error
            header('Location: error_compra.php');
            exit();
        }
    } else {
        // Redirigir al usuario a una página de error
        header('Location: error_compra.php');
        exit();
    }
} else {
    echo "Método no permitido.";
}
?>

