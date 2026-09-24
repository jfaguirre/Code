<?php

use PDO;
use PDOException;

class Conexion
{
    private PDO $conexion;

    private string $host = 'localhost';
    private string $user = 'root';
    private string $password = '1234';
    private string $database = 'TutorialAPI';

    public function __construct()
    {
        try {
            $this->conexion = new PDO(
                "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (PDOException $e) {
            http_response_code(500);

            echo json_encode([
                'estado' => false,
                'message' => 'Error al conectar con la base de datos.'
            ]);

            exit;
        }
    }

    public function getConexion(): PDO
    {
        return $this->conexion;
    }
}
