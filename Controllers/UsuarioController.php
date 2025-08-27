<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use DataBase\Connections;

class UsuarioController
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Connections;
    }

    public function login($email, $senha)
    {
        try {
            $query_login = "SELECT * FROM usuarios WHERE usuario_email = :email AND usuario_senha = :senha";
            $stmt_login = $this->conn->connectBd()->prepare($query_login);
            $stmt_login->bindValue(':email', $email, \PDO::PARAM_STR);
            $stmt_login->bindValue(':senha', sha1($senha), \PDO::PARAM_STR);
            $stmt_login->execute();

            if ($stmt_login->rowCount() != 0) {
                return $stmt_login->fetch(\PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
