function ordenarProductos() {
    const select = document.getElementById('price-filter');
    const orden = select.value;
    const catalogo = document.getElementById('product-catalog');
    const productos = Array.from(catalogo.children);

    if (orden === 'asc') {
        productos.sort((a, b) => parseFloat(a.getAttribute('data-price')) - parseFloat(b.getAttribute('data-price')));
    } else if (orden === 'desc') {
        productos.sort((a, b) => parseFloat(b.getAttribute('data-price')) - parseFloat(a.getAttribute('data-price')));
    }

    // Vaciamos el catálogo y agregamos los productos ordenados
    catalogo.innerHTML = '';
    productos.forEach(producto => catalogo.appendChild(producto));
}
