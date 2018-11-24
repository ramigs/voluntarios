<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $intoClass)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $intoClass);
    }

    public function selectVoluntarioById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM voluntario WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voluntario');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function voluntarioByNIFExists($nif)
    {
        $sql = "SELECT COUNT(*) FROM voluntario WHERE nif = :nif";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nif', $nif);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function selectVoluntariosActive()
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM voluntario 
            WHERE tipo_remocao IS NULL
            ORDER BY nome ASC");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voluntario');
        return $stmt->fetchAll();
    }

    public function selectParticipacoesVoluntario($id)
    {
        $stmt = $this->pdo->prepare("SELECT acao.id, acao.nome, acao.local, acao.data FROM participacoes
                                    JOIN voluntario ON participacoes.voluntario_id = voluntario.id
                                    JOIN acao ON participacoes.acao_id = acao.id
                                    WHERE voluntario.id = :id
                                    ORDER BY acao.data ASC");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

?>