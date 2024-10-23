<form method="GET" action="">
    <label for="orden">Ordenar por precio:</label>
    <select name="orden" id="orden">
        <option value="asc">De menor a mayor</option>
        <option value="desc">De mayor a menor</option>
    </select>
    <button type="submit">Filtrar</button>
</form>

<?php
// Conexión a la base de datos
include('bd.php');

// Obtener el valor del filtro de ordenación si está presente
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'asc';

// Definir la consulta con ordenamiento
$query = "SELECT * FROM productos WHERE categoria = 'componentes' ORDER BY precio ";
$query .= ($orden === 'desc') ? 'DESC' : 'ASC';

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $query);

// Mostrar los productos
if ($resultado) {
    while ($producto = mysqli_fetch_assoc($resultado)) {
        echo "<div class='producto'>";
        echo "<h2>" . $producto['nombre'] . "</h2>";
        echo "<p>Precio: $" . $producto['precio'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No se encontraron productos.";
}
?>
