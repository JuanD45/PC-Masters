function filterProducts() {
    const filterValue = document.getElementById('filter').value;
    const productList = document.getElementById('product-list');
    const products = Array.from(productList.getElementsByClassName('product'));

    if (filterValue === 'low-high') {
        products.sort((a, b) => a.dataset.price - b.dataset.price);
    } else if (filterValue === 'high-low') {
        products.sort((a, b) => b.dataset.price - a.dataset.price);
    }

    // Limpiar la lista actual y agregar los productos ordenados
    productList.innerHTML = '';
    products.forEach(product => productList.appendChild(product));
}
