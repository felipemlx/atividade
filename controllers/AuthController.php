<?php
class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $usuario = $this->usuarioModel->buscarPeloEmail($email);
            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario_id']   = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                header('Location: index.php?controller=Tarefa&action=dashboard');
                exit;
            } else {
                $error = "E-mail ou senha inválidos.";
            }
        }
        include 'views/auth/login.php';
    }

    public function registro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome     = $_POST['nome'] ?? '';
            $email    = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $this->usuarioModel->criar($nome, $email, $senha);
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }
        include 'views/auth/registro.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?controller=Auth&action=login');
    }
}
