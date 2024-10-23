<?php
session_start();
$loggedIn = isset($_SESSION['idusuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computadores - PC Masters</title>
    <link rel="stylesheet" href="computadores.css">
</head>
<body>

    <header>
        <h1>PC Masters</h1>
        <div class="auth-buttons">
            <a href="registrarse.html" class="button">Registrarse</a>
            <a href="login.html" class="button">Iniciar Sesión</a>
        </div>
    </header>

<nav>
    <a href="index.html">Inicio</a>
    <a href="carrito.html">Carrito</a>
    <a href="computadores.html" class="active">Computadores</a>
    <a href="componentes.html">Componentes</a>
    <a href="contactos.html">Contactos</a>
</nav>

<main>
    <section class="section">
        <h2>Catálogo de Computadores</h2>
        
        <!-- Filtro de ordenación -->
        <div class="filter-section">
            <label for="filter">Ordenar por precio:</label>
            <select id="filter" onchange="filterProducts()">
                <option value="default">Selecciona una opción</option>
                <option value="low-high">Menor a mayor precio</option>
                <option value="high-low">Mayor a menor precio</option>
            </select>
        </div>
        
        <div class="catalog" id="product-list">
            <div class="product" data-price="17390000">
                <h2>PC PREDATOR</h2>
                <img src="Catalogo-index/pc1.png" alt="PC Gamer 1">
                <p>Intel core i9, RTX 4090, 2TB SSD, 64 RAM.</p>
                <p>$17,390.000 COP</p>
                <a href="carrito.html" class="button">Agregar al carrito</a>
            </div>
            <div class="product" data-price="5490000">
                <h2>Portatil MSI</h2>
                <img src="Catalogo-index/pc2.png" alt="PC Gamer 2">
                <p>Pantalla 15.6" intel core i5, SSD 512 GB, RTX 2060.</p>
                <p>$5,490.000 COP</p>
                <a href="carrito.html" class="button">Agregar al carrito</a>
            </div>
            <div class="product" data-price="8990000">
                <h2>Portatil Asus ROG Strix G15</h2>
                <img src="Catalogo-index/pc3.png" alt="PC Gamer 3">
                <p>Pantalla 15.6" intel core i7, SSD 1 TB, RTX 4060</p>
                <p>$8,990.000 COP</p>
                <a href="carrito.html" class="button">Agregar al carrito</a>
            </div>
            <div class="product" data-price="3990000">
                <h2>Portatil Asus ROG Strix G17</h2>
                <img src="Computadores/pc4.png" alt="PC Gamer 4">
                <p>Pantalla 15.6" Intel Core i5, SSD 512, RTX 2050 Ti</p>
                <p>$3,990.000 COP</p>
                <a href="carrito.html" class="button">Agregar al carrito</a>
            </div>
            <div class="product" data-price="6590000">
                <h2>PC Master g35</h2>
                <img src="Computadores/pc5.png" alt="PC Gamer 5">
                <p>Intel Core i9, SSD 1 TB, Ryzen 6600 xt.</p>
                <p>$6,590.000 COP</p>
                <a href="carrito.html" class="button">Agregar al carrito</a>
            </div>
            <div class="product" data-price="5990000">
                <h2>PC Master g23</h2>
                <img src="Computadores/pc6.png" alt="PC Gamer 6">
                <p>Incluye Pantalla 2k 144 hz, Intel core i7, SSD 512 GB, RTX 2080</p>
                <p>$5,990.000 COP</p>
                <a href="carrito.html" class="button">Agregar al carrito</a>
            </div>
        </div>
    </section>
</main>

<script src="filtros.js"></script>
</body>
</html>
