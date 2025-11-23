<?php
class TarefaController {
    private $tarefaModel;
    private $categoriaModel;

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }
        $this->tarefaModel      = new Tarefa();
        $this->categoriaModel  = new Categoria();
    }

    public function dashboard() {
        $usuarioId   = $_SESSION['usuario_id'];
        $tarefas    = $this->tarefaModel->buscarTarefasDoUsuario($usuarioId);
        $categorias = $this->categoriaModel->buscarCategorias();

        include 'views/dashboard.php';   // lista de tarefas
    }

    public function criar() {
        $usuarioId = $_SESSION['usuario_id'];
        $categorias = $this->categoriaModel->buscarCategorias();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo       = $_POST['titulo'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $categoria  = $_POST['categoria'] ?? null;

            $this->tarefaModel->criarTarefa($usuarioId, $titulo, $descricao, $categoria);
            header('Location: index.php?controller=Tarefa&action=dashboard');
            exit;
        }
        include 'views/tarefas/form.php';
    }

    public function editar() {
        $usuarioId = $_SESSION['usuario_id'];
        $id     = $_GET['id'] ?? null;
        $tarefa   = $this->tarefaModel->buscarTarefa($id, $usuarioId);
        $categorias = $this->categoriaModel->buscarCategorias();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo       = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $status      = $_POST['status'];
            $categoria  = $_POST['categoria'] ?? null;

            $this->tarefaModel->atualizarTarefa($id, $usuarioId, $titulo, $descricao, $status, $categoria);
            header('Location: index.php?controller=Tarefa&action=dashboard');
            exit;
        }

        include 'views/tarefas/form.php';
    }

    public function deletar() {
        $usuarioId = $_SESSION['usuario_id'];
        $id     = $_GET['id'] ?? null;

        $this->tarefaModel->deletarTarefa($id, $usuarioId);
        header('Location: index.php?controller=Tarefa&action=dashboard');
    }
}
