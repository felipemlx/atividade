<?php
class CategoriaController {
    private $categoriaModel;

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=Categoria&action=login');
            exit;
        }
        $this->categoriaModel  = new Categoria();
    }

    public function index() {
        $usuarioId = $_SESSION['usuario_id'];
        $categorias = $this->categoriaModel->buscarCategorias();
        include 'views/categorias/lista.php';
    }

    public function criar() {
        $usuarioId = $_SESSION['usuario_id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $this->categoriaModel->criarCategoria($usuarioId, $nome);
            header('Location: index.php?controller=Categoria&action=index');
            exit;
        }
        include 'views/categorias/form.php';
    }

    public function editar() {
        $usuarioId = $_SESSION['usuario_id'];
        $id = $_GET['id'] ?? null;
        $categoria = $this->categoriaModel->buscarCategoria($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $this->categoriaModel->atualizarCategoria($id, $usuarioId, $nome);
            header('Location: index.php?controller=Categoria&action=index');
            exit;
        }
        include 'views/categorias/form.php';
    }

    public function deletar() {
        $usuarioId = $_SESSION['usuario_id'];
        $id = $_GET['id'] ?? null;
        $this->categoriaModel->deletarCategoria($id, $usuarioId);
        header('Location: index.php?controller=Categoria&action=index');
    }
}
