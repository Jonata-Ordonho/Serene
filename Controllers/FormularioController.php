<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use DataBase\Connections;

class FormularioController
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Connections;
    }

    public function validarCPF($cpf)
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica tamanho
        if (strlen($cpf) != 11) return false;

        // Elimina sequências repetidas
        if (preg_match('/(\d)\1{10}/', $cpf)) return false;

        // Valida 1º dígito
        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($i = 0; $i < $t; $i++) {
                $soma += $cpf[$i] * (($t + 1) - $i);
            }
            $digito = ((10 * $soma) % 11) % 10;
            if ($cpf[$t] != $digito) {
                return false;
            }
        }
        return true;
    }

    public function autenticarFormulario($email, $cpf)
    {
        try {
            $query_colaborador = "SELECT colaborador_id FROM colaboradores WHERE colaborador_email = :email AND colaborador_cpf = :cpf";
            $stmt_colaborador = $this->conn->connectBd()->prepare($query_colaborador);
            $stmt_colaborador->bindValue(':email', $email, \PDO::PARAM_STR);
            $stmt_colaborador->bindValue(':cpf', $cpf, \PDO::PARAM_STR);
            $stmt_colaborador->execute();

            if ($stmt_colaborador->rowCount() == 0) {
                $insert_colaborador = "INSERT INTO colaboradores (colaborador_setor_id, colaborador_nome, colaborador_email, colaborador_cpf, colaborador_funcao) VALUES (:setor_id, :nome, :email, :cpf, :funcao)";
                $stmt_insert_colaborador = $this->conn->connectBd()->prepare($insert_colaborador);
                $stmt_insert_colaborador->bindValue(':setor_id', $_SESSION['setor_id'], \PDO::PARAM_INT);
                $stmt_insert_colaborador->bindValue(':nome', $_SESSION['nome'], \PDO::PARAM_STR);
                $stmt_insert_colaborador->bindValue(':email', $email, \PDO::PARAM_STR);
                $stmt_insert_colaborador->bindValue(':cpf', $cpf, \PDO::PARAM_STR);
                $stmt_insert_colaborador->bindValue(':funcao', $_SESSION['funcao'], \PDO::PARAM_STR);
                $stmt_insert_colaborador->execute();

                $query_colaborador = "SELECT colaborador_id FROM colaboradores WHERE colaborador_email = :email AND colaborador_cpf = :cpf";
                $stmt_colaborador = $this->conn->connectBd()->prepare($query_colaborador);
                $stmt_colaborador->bindValue(':email', $email, \PDO::PARAM_STR);
                $stmt_colaborador->bindValue(':cpf', $cpf, \PDO::PARAM_STR);
                $stmt_colaborador->execute();
            }
            $dados_colaborador = $stmt_colaborador->fetch(\PDO::FETCH_ASSOC);

            if ($dados_colaborador) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertRespostas($resp1, $resp2, $resp3, $resp4, $resp5, $obs){
        try {
            $query = "INSERT INTO respostas (resposta_colaborador_id, resposta_questao_1, resposta_questao_2, resposta_questao_3 ,resposta_questao_4, resposta_questao_5, resposta_questao_observacao) VALUE (:colaborador_id, :questao_1, :questao_2, :questao_3, :questao_4, :questao_5, :questao_observacao)";
            $stmt = $this->conn->connectBd()->prepare($query);
            $stmt->bindValue(':colaborador_id', 1, \PDO::PARAM_INT);
            $stmt->bindValue(':questao_1', $resp1, \PDO::PARAM_INT);
            $stmt->bindValue(':questao_2', $resp2, \PDO::PARAM_INT);
            $stmt->bindValue(':questao_3', $resp3, \PDO::PARAM_INT);
            $stmt->bindValue(':questao_4', $resp4, \PDO::PARAM_INT);
            $stmt->bindValue(':questao_5', $resp5, \PDO::PARAM_INT);
            $stmt->bindValue(':questao_observacao', $obs, \PDO::PARAM_STR);
            $stmt->execute();

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
