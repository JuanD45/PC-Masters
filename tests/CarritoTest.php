
<?php
use PHPUnit\Framework\TestCase;

require_once 'Carrito.php';

class CarritoTest extends TestCase {
    private $carrito;

    protected function setUp(): void {
        session_start();
        $_SESSION['carrito'] = [];
        $this->carrito = new Carrito();
    }

    public function testAgregarProducto() {
        $this->carrito->agregarProducto(1, 'Teclado', 50, 2);
        $productos = $this->carrito->obtenerProductos();
        $this->assertCount(1, $productos);
        $this->assertEquals(2, $productos[1]['cantidad']);
    }

    public function testCalcularTotal() {
        $this->carrito->agregarProducto(1, 'Teclado', 50, 2);
        $this->carrito->agregarProducto(2, 'Mouse', 25, 1);
        $total = $this->carrito->calcularTotal();
        $this->assertEquals(125, $total);
    }

    public function testEliminarProducto() {
        $this->carrito->agregarProducto(1, 'Teclado', 50, 2);
        $this->carrito->eliminarProducto(1);
        $productos = $this->carrito->obtenerProductos();
        $this->assertCount(0, $productos);
    }
}
?>
