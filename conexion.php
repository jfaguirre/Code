<?php

use Illuminate\Http\JsonResponse;
use PDO;

class Conexion
{
    private $host = "localhost";
    private $user = "root";
    private $password = "1234";
    private $database = "TutorialAPI";

    private PDO $conexion;

    public function __construct()
    {
        $cadenaConexion = "mysql:host=".$this->host.";dbname=".$this->database.";charset=utf8";

        try
        {
            $this->conexion = new PDO(
                $cadenaConexion,
                $this->user,
                $this->password
            );

            $this->conexion->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            echo "Conexion Exitosa";
        }
        catch (Exception $e)
        {
            http_response_code(404);

            $error = response()->json([
                'estado' => false,
                'message' => $e->getMessage()
            ], 404);

            echo json_encode($error);
            exit;
        }

    }
    
    public function getConexion()
    {
        return $this->conexion;
    }
}

