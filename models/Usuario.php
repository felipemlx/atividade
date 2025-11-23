<?php
class Usuario {
    private $conexao;
    public function __construct() {
        $this->conexao = Database::getInstance()->getConnection();
    }

    public function criar($nome, $email, $senha) {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $statement = $this->conexao->prepare($sql);
        $hash = password_hash($senha, PASSWORD_BCRYPT); //funçao simples do php mesmo pra encriptar a senha no banco com bcrypt
        return $statement->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $hash
        ]);
    }

    public function buscarPeloEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
