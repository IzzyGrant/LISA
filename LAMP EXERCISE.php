// Consulta para obtener los datos de la tabla Productos
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
