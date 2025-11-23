<?php
class Categoria {
    private $conexao;

    public function __construct() {
        $this->conexao = Database::getInstance()->getConnection();
    }

    public function buscarCategorias() {
        $sql = "SELECT * FROM categorias c";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //aqui vem o CRUD
    public function buscarCategoria($id){
        $sql = "SELECT * FROM categorias c WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criarCategoria($usuario_id, $nome) {
        $sql = "INSERT INTO categorias (usuario, nome)
                VALUES (:usuario_id, :nome)";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':nome' => $nome
        ]);
    }

    public function atualizarCategoria($id, $usuario_id, $nome) {
        $sql = "UPDATE categorias
                   SET usuario = :usuario_id,
                       nome = :nome
                 WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':nome' => $nome,
            ':id' => $id
        ]);
    }

    public function deletarCategoria($id, $usuario_id) {
        $sql = "DELETE FROM categorias WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([
            ':id' => $id
        ]);
    }
}
