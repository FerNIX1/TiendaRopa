<?php
require_once '../Model/Conexion/Conexion.php';
require_once '../Model/Productos.php';

class RopaControler {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::getConexion();
    }

    public function AgregarProducto(Productos $producto) {
        $sql = "INSERT INTO productos (Nombre, Descripcion, Precio, Talla, Color, CantidadEnStock) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $producto->Nombre, $producto->Descripcion, $producto->Precio, $producto->Talla, $producto->Color, $producto->CantidadEnStock);
        return $stmt->execute();
    }

    public function ListarProductos() {
        $sql = "SELECT * FROM productos";
        $result = $this->conn->query($sql);
        $productos = [];
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
        return $productos;
    }

    public function ObtenerProductoPorID($id) {
        $sql = "SELECT * FROM productos WHERE ProductoID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function ActualizarStock($ProductoID, $nuevoStock) {
        $sql = "UPDATE productos SET CantidadEnStock = ? WHERE ProductoID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $nuevoStock, $ProductoID);
        return $stmt->execute();
    }
}
?>
