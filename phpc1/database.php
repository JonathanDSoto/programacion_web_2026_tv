
<?php

class Database
{
    // Configuración de conexión
    private string $host = "localhost";
    private int $port = 3306;
    private string $database = "pweb26";
    private string $username = "root";
    private string $password = "";

    private ?PDO $connection = null;

    // Obtener conexión
    public function connect(): PDO
    {
        if ($this->connection === null) {
            try {
                $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database};charset=utf8mb4";

                $this->connection = new PDO(
                    $dsn,
                    $this->username,
                    $this->password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false
                    ]
                );

            } catch (PDOException $e) {
                error_log("Error de conexión MySQL: " . $e->getMessage());
                throw new RuntimeException(
                    "No fue posible conectar con la base de datos."
                );
            }
        }

        return $this->connection;
    }

    // Cerrar conexión
    public function disconnect(): void
    {
        $this->connection = null;
    }
}
