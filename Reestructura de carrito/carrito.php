
<?php
session_start();
require_once 'Carrito.php';

$carrito = new Carrito();
$productos = $carrito->obtenerProductos();
$total = $carrito->calcularTotal();
$loggedIn = isset($_SESSION['idusuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - PC Masters</title>
    <link rel="stylesheet" href="carrito.css">
    <script src="carrito.js"></script>
</head>
<body>
    <header>
        <h1>PC Masters</h1>
        <div class="auth-buttons">
            <?php if ($loggedIn): ?>
                <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
            <?php else: ?>
                <a href="login.html">Iniciar sesión</a>
            <?php endif; ?>
        </div>
    </header>
    <main>
        <h2>Carrito de Compras</h2>
        <?php if (count($productos) > 0): ?>
            <ul>
                <?php foreach ($productos as $id => $producto): ?>
                    <li>
                        <?php echo htmlspecialchars($producto['nombre']); ?> -
                        <?php echo $producto['cantidad']; ?> x $<?php echo number_format($producto['precio'], 2); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p>Total: $<?php echo number_format($total, 2); ?></p>
        <?php else: ?>
            <p>El carrito está vacío.</p>
        <?php endif; ?>
    </main>
</body>
</html>
