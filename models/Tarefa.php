<?php
class Tarefa {
    private $conexao;

    public function __construct() {
        $this->conexao = Database::getInstance()->getConnection();
    }

    public function buscarTarefasDoUsuario($usuarioId) {
        $sql = "SELECT t.*, c.nome AS nome_categoria
                  FROM tarefas t
             LEFT JOIN categorias c ON c.id = t.categoria
                 WHERE t.usuario = :id
              ORDER BY t.criado_em DESC";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':id' => $usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarTarefa($id, $userId) {
        $sql = "SELECT * FROM tarefas WHERE id = :id AND usuario = :usuario_id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':id' => $id, ':usuario_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //aqui vem o CRUD
    public function criarTarefa($usuario_id, $titulo, $descricao, $categoria) {
        $sql = "INSERT INTO tarefas (usuario, titulo, descricao, categoria)
                VALUES (:usuario_id, :titulo, :descricao, :categoria)";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':categoria' => $categoria ?: null
        ]);
    }

    public function atualizarTarefa($id, $usuario_id, $titulo, $descricao, $status, $categoria) {
        $sql = "UPDATE tarefas
                   SET titulo = :titulo,
                       descricao = :descricao,
                       status = :status,
                       categoria = :categoria
                 WHERE id = :id AND usuario = :usuario_id";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':status' => $status,
            ':categoria' => $categoria ?: null,
            ':id' => $id,
            ':usuario_id' => $usuario_id
        ]);
    }

    public function deletarTarefa($id, $usuario_id) {
        $sql = "DELETE FROM tarefas WHERE id = :id AND usuario = :usuario_id";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':usuario_id' => $usuario_id
        ]);
    }
}
