<?php
session_start();
$loggedIn = isset($_SESSION['idusuario']);
require_once 'bd.php'; // Asegúrate de tener el archivo de conexión a la base de datos

function formatPrice($precio) {
    return '$' . number_format($precio, 0, ',', '.') . ' COP';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Componentes - PC Masters</title>
    <link rel="stylesheet" href="componentes.css">
    <script src="carrito.js"></script>
</head>
<body>

<header>
    <h1>PC Masters</h1>
    <div class="auth-buttons">
        <?php if ($loggedIn): ?>
            <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
            <a href="logout.php" class="button">Cerrar Sesión</a>
        <?php else: ?>
            <a href="registrarse.php" class="button">Registrarse</a>
            <a href="login.php" class="button">Iniciar Sesión</a>
        <?php endif; ?>
    </div>
</header>

<nav>
    <a href="index.php">Inicio</a>
    <a href="carrito.php">Carrito</a>
    <a href="computadores.php">Computadores</a>
    <a href="componentes.php" class="active">Componentes</a>
    <a href="contactos.php">Contactos</a>
</nav>

<main>
    <section class="section">
        <h2>Catálogo de Componentes</h2>
        <div class="catalog">
            <?php
            // Consulta los productos que pertenecen a la categoría de componentes (categoria = 1)
            $query = "SELECT * FROM productos WHERE idcategoria = 1";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product">';
                    echo '<h2>' . htmlspecialchars($row['nombre']) . '</h2>';
                    echo '<img src="' . htmlspecialchars($row['imagen']) . '" alt="' . htmlspecialchars($row['nombre']) . '">';
                    echo '<p>' . htmlspecialchars($row['descripcion']) . '</p>';
                    echo '<p>' . formatPrice($row['precio']) . '</p>';
                    echo '<button onclick="agregarAlCarrito({idproductos: ' . $row['idproductos'] . ', nombre: \'' . htmlspecialchars($row['nombre']) . '\', precio: ' . $row['precio'] . '})" class="button">Agregar al carrito</button>';
                    echo '</div>';
                }
            } else {
                echo '<p>No hay componentes disponibles.</p>';
            }
            ?>
        </div>
    </section>
</main>
</body>
</html>
