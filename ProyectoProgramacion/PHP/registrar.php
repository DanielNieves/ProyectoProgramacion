<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $cedula = $_POST['cedula'];

    $conexion = new CConexion();
    $conn = $conexion->estableceConexion();

    if ($conn) {
        try {
            $stmt = $conn->prepare("INSERT INTO usuarios (usuario, cedula) VALUES (:usuario, :cedula)");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->execute();
            echo "Usuario registrado con éxito.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "No se pudo conectar a la base de datos.";
    }
}
?>


