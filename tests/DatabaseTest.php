<?php
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    private $db;

    protected function setUp(): void
    {
        $host = 'localhost';
        $dbName = 'compumax';
        $user = 'root';   
        $pass = '';             

        $this->db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $pass);
    }

   
    public function testConnection()
    {
        $this->assertNotNull($this->db, "La conexión a la base de datos falló.");
    }

   
    public function testProductosTableHasData()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM productos");
        $result = $query->fetch(PDO::FETCH_ASSOC);

        $this->assertGreaterThan(0, $result['total'], "La tabla 'productos' está vacía.");
    }


    public function testInsertAndRetrieveProducto()
    {
        
        $nombre = 'Producto de Prueba';
        $descripcion = 'Descripción de prueba';
        $precio = 123.45;
        $this->db->exec("INSERT INTO productos (nombre, descripcion, precio) VALUES ('$nombre', '$descripcion', $precio)");

    
        $query = $this->db->query("SELECT * FROM productos WHERE nombre = '$nombre'");
        $producto = $query->fetch(PDO::FETCH_ASSOC);


        $this->assertEquals($nombre, $producto['nombre']);
        $this->assertEquals($descripcion, $producto['descripcion']);
        $this->assertEquals($precio, (float) $producto['precio']);
    }
}
