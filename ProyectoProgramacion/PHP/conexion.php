<?php
class CConexion {
    private $conecta = null;

    public function estableceConexion() {
        $usuario = getenv('MYSQLUSER');
        $contraseña = getenv('MYSQLPASSWORD');
        $bd = getenv('MYSQLDATABASE');
        $ip = getenv('MYSQLHOST');
        $puerto = getenv('MYSQLPORT');

        $cadena = "mysql:host=" . $ip . ";port=" . $puerto . ";dbname=" . $bd;

        try {
            $this->conecta = new PDO($cadena, $usuario, $contraseña);
            $this->conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conecta;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}
?>
