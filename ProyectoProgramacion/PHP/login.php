<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $cedula = $_POST['cedula'];

    $conexion = new CConexion();
    $conn = $conexion->estableceConexion();

    if ($conn) {
        try {
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND cedula = :cedula");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Inicio de sesión exitoso.";
            } else {
                echo "Usuario o cédula incorrectos.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "No se pudo conectar a la base de datos.";
    }
}
?>
