<?php

session_start();
include 'bd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT idusuario, nombre, contrasena, rol FROM usuarios WHERE email = ? AND estado = 'activo'";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $usuario = $result->fetch_assoc();
            // Cambiamos la verificación de la contraseña
            if ($contrasena === $usuario['contrasena']) {
                $_SESSION['idusuario'] = $usuario['idusuario'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['rol'] = $usuario['rol'];

                // Redirigir a la página de bienvenida
                header("Location: index.php");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "No se encontró un usuario con ese correo electrónico o la cuenta está inactiva.";
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close();
}
