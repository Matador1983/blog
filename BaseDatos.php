<?php


class B_Datos {
    public $host;
    public $usuario;
    public $contrasena;
    public $nombreBD;
    private $pdo;

    public function __construct($host, $usuario, $contrasena, $nombreBD) {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->nombreBD = $nombreBD;
    }

    public function conectar() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->nombreBD}";
            $this->pdo = new PDO($dsn, $this->usuario, $this->contrasena);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // die("Conexión Exitosa" );
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function consulta($sql, $parametros = array()) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {          
            echo'
            <script>
            alert("Registro duplicado ");	
            location.href="Panelpost.php";		
            </script>';
        }
    }
    public function consultaAg($sql, $parametros = array()) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {          
            echo'
            <script>
            alert("Registro duplicado ");	
            location.href="registro.php";		
            </script>';
        }
    }
}
?>