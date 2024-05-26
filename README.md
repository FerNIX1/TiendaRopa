<h1>Tienda de Ropa</h1>
<p>Este es un programa para mostrar productos de una tienda de Ropa</p>
<h2>Base de datos entidad relacion:</h2>
![image](https://github.com/FerNIX1/TiendaRopa/assets/90074636/125608db-88c8-4e37-97e6-1b19b0f4879c)
### Entidad Relación

![image](https://github.com/FerNIX1/TiendaRopa/assets/90074636/125608db-88c8-4e37-97e6-1b19b0f4879c)

## Estructura de la Base de Datos

```sql
CREATE DATABASE IF NOT EXISTS TiendaRopa;
USE TiendaRopa;

-- Creación de la tabla Productos
CREATE TABLE IF NOT EXISTS Productos (
    ProductoID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Descripcion TEXT,
    Precio DECIMAL(10, 2) NOT NULL,
    Talla VARCHAR(10),
    Color VARCHAR(50),
    CantidadEnStock INT NOT NULL
);

-- Creación de la tabla Clientes
CREATE TABLE IF NOT EXISTS Clientes (
    ClienteID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Direccion TEXT,
    Telefono VARCHAR(20),
    CorreoElectronico VARCHAR(100)
);

-- Creación de la tabla Ventas
CREATE TABLE IF NOT EXISTS Ventas (
    VentaID INT AUTO_INCREMENT PRIMARY KEY,
    Fecha DATE NOT NULL,
    ClienteID INT,
    ProductoID INT,
    Cantidad INT NOT NULL,
    PrecioTotal DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID),
    FOREIGN KEY (ProductoID) REFERENCES Productos(ProductoID)
);

-- Creación de la tabla Empleados
CREATE TABLE IF NOT EXISTS Empleados (
    EmpleadoID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Direccion TEXT,
    Telefono VARCHAR(20),
    CorreoElectronico VARCHAR(100),
    Cargo VARCHAR(50)
);
