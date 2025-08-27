<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use DataBase\Connections;

class ResultadoController
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Connections;
    }

    public function setores()
    {
        try {
            $query = "SELECT * FROM setores";
            $stmt = $this->conn->connectBd()->prepare($query);
            $stmt->execute();

            if ($stmt->rowCount() != 0) {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                return NULL;
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getSetor($id)
    {
        try {
            $query = "SELECT * FROM setores WHERE setor_id = :id";
            $stmt = $this->conn->connectBd()->prepare($query);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getColaborador($id)
    {
        try {
            $query = "SELECT * FROM colaboradores WHERE colaborador_id = :id";
            $stmt = $this->conn->connectBd()->prepare($query);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

        public function colaboradoresPorSetor($id)
    {
        try {
            $query = "SELECT * FROM colaboradores WHERE colaborador_setor_id = :id";
            $stmt = $this->conn->connectBd()->prepare($query);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getMediaRespostasMes($id_setor)
    {

        $data_inicio = sprintf("%04d-%02d-01 00:00:00", date('Y'), '07');
        $data_fim = date("Y-m-t 23:59:59", strtotime($data_inicio));

        $query = "SELECT AVG((resposta_questao_1 + resposta_questao_2 + resposta_questao_3 + resposta_questao_4 + resposta_questao_5) / 5) AS media_mes FROM respostas WHERE resposta_data_registro BETWEEN :data_inicio AND :data_fim AND resposta_colaborador_id IN (SELECT colaborador_id FROM colaboradores WHERE colaborador_setor_id = :setor_id)";
        $stmt = $this->conn->connectBd()->prepare($query);
        $stmt->bindValue(':data_inicio', $data_inicio, \PDO::PARAM_STR);
        $stmt->bindValue(':data_fim', $data_fim, \PDO::PARAM_STR);
        $stmt->bindValue(':setor_id', $id_setor, \PDO::PARAM_INT);

        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row['media_mes'] ?? null;
    }

    public function totalRespostaPorQuestao($id_setor, $i)
    {
        $data_inicio = sprintf("%04d-%02d-01 00:00:00", date('Y'), '07');
        $data_fim = date("Y-m-t 23:59:59", strtotime($data_inicio));

        $query = "SELECT
        SUM(CASE WHEN resposta_questao_".$i." = 1 THEN 1 END) AS 'total_resposta_1',
        SUM(CASE WHEN resposta_questao_".$i." = 2 THEN 1 END) AS 'total_resposta_2',
        SUM(CASE WHEN resposta_questao_".$i." = 3 THEN 1 END) AS 'total_resposta_3',
        SUM(CASE WHEN resposta_questao_".$i." = 4 THEN 1 END) AS 'total_resposta_4',
        SUM(CASE WHEN resposta_questao_".$i." = 5 THEN 1 END) AS 'total_resposta_5'
        FROM respostas WHERE resposta_data_registro
        BETWEEN :data_inicio AND :data_fim
        AND resposta_colaborador_id IN (SELECT colaborador_id FROM colaboradores WHERE colaborador_setor_id = :setor_id);
        ";
        $stmt = $this->conn->connectBd()->prepare($query);
        $stmt->bindValue(':data_inicio', $data_inicio, \PDO::PARAM_STR);
        $stmt->bindValue(':data_fim', $data_fim, \PDO::PARAM_STR);
        $stmt->bindValue(':setor_id', $id_setor, \PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);

    }

        public function totalRespostasColaborador($id_colaborador, $i)
    {
        $data_inicio = sprintf("%04d-%02d-01 00:00:00", date('Y'), '07');
        $data_fim = date("Y-m-t 23:59:59", strtotime($data_inicio));

        $query = "SELECT
        SUM(CASE WHEN resposta_questao_" . $i . " = 1 THEN 1 END) AS 'total_resposta_1',
        SUM(CASE WHEN resposta_questao_" . $i . " = 2 THEN 1 END) AS 'total_resposta_2',
        SUM(CASE WHEN resposta_questao_" . $i . " = 3 THEN 1 END) AS 'total_resposta_3',
        SUM(CASE WHEN resposta_questao_" . $i . " = 4 THEN 1 END) AS 'total_resposta_4',
        SUM(CASE WHEN resposta_questao_" . $i . " = 5 THEN 1 END) AS 'total_resposta_5'
        FROM respostas WHERE resposta_data_registro
        BETWEEN :data_inicio AND :data_fim
        AND resposta_colaborador_id = :colaborador_id";
        $stmt = $this->conn->connectBd()->prepare($query);
        $stmt->bindValue(':data_inicio', $data_inicio, \PDO::PARAM_STR);
        $stmt->bindValue(':data_fim', $data_fim, \PDO::PARAM_STR);
        $stmt->bindValue(':colaborador_id', $id_colaborador, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
