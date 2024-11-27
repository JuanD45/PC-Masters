<?php

use PHPUnit\Framework\TestCase;

class CarritoTest extends TestCase
{
    private $url = "http://localhost/PC-Masters/carrito.php";
    public function testFinalizarCompra()
    {
        $postData = [
            "productos" => json_encode([
                ["idproductos" => 1, "cantidad" => 2],
                ["idproductos" => 2, "cantidad" => 1]
            ]),
        ];
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $this->assertEquals(200, $httpCode, "El servidor no respondió con éxito.");
        $this->assertStringContainsString("Compra finalizada", $response, "El mensaje esperado no está en la respuesta.");
    }
}
