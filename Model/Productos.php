<?php
class Productos {
    public $ProductoID;
    public $Nombre;
    public $Descripcion;
    public $Precio;
    public $Talla;

    public $Color;

    public $CantidadEnStock;

    public function __construct($nombre, $Descripcion, $precio, $Talla,$Color,$CantidadEnStock) {
        $this->Nombre = $nombre;
        $this->Descripcion = $Descripcion;
        $this->Precio = $precio;
        $this->Talla = $Talla;
        $this->Color=$Color;
        $this->CantidadEnStock=$CantidadEnStock;
    }
}
?>
