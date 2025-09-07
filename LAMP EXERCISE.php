$> sudo apt-get install mysql-server

$> systemctl status mysql

sudo apt-get install php

$: php --version

$: sudo mysql -u root -p

mysql> CREATE DATABASE tienda;

CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';
FLUSH PRIVILEGES;

mysql> USE tienda;

CREATE TABLE Productos (
  ProductoID INT PRIMARY KEY,
  NombreProducto VARCHAR(50),
  Descripcion VARCHAR(255),
  Precio DECIMAL(10, 2),
  Stock INT
);

INSERT INTO Productos (ProductoID, NombreProducto, Descripcion, Precio, Stock)
VALUES 
  (1, 'Camiseta', 'Camiseta negra simple de talla unica', 10, 16),
  (2, 'Pantalon', 'Pantalon argo azul tipo chino', 20, 24),
  (3, 'Gorra', 'Gorra azul con el logo de los Yankees', 15, 32),
  (4, 'Zapatillas', 'Zapatillas de running de color blanco y verde', 35, 13);


// Librerar puerto MV
// sudo ufw allow 80/tcp
// sudo ufw reload





<?php
$servername = "localhost";
$username = "tu_usuario"; 
$password = "tu_password"; 
$database = "tu_base_datos"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT ProductoID, NombreProducto, Descripcion FROM Productos";
$result = $conn->query($sql);

echo "<h2>Tabla de Productos</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='padding: 10px;'>ProductoID</th>";
    echo "<th style='padding: 10px;'>NombreProducto</th>";
    echo "<th style='padding: 10px;'>Descripción</th>";
    echo "</tr>";
    
    // Mostrar datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='padding: 8px;'>" . htmlspecialchars($row['ProductoID']) . "</td>";
        echo "<td style='padding: 8px;'>" . htmlspecialchars($row['NombreProducto']) . "</td>";
        echo "<td style='padding: 8px;'>" . htmlspecialchars($row['Descripcion']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    // Mostrar cantidad de resultados
    echo "<p style='margin-top: 10px;'><strong>Total de productos: " . $result->num_rows . "</strong></p>";
} else {
    echo "<p>No hay productos en la tabla.</p>";
}

// Cerrar conexión
$conn->close();
?>
