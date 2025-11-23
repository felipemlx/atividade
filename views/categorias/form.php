<link rel="stylesheet" href="style.css">
<div class="container">
    <div class="links-topo">
        <a href="index.php?controller=Tarefa&action=index">Voltar para Tarefas</a>
        <a href="index.php?controller=Categoria&action=index">Lista de Categorias</a>
    </div>
    <h2><?= isset($categoria) ? 'Editar Categoria' : 'Nova Categoria' ?></h2>
    <form method="post">
        <label for="nome">Nome da categoria</label>
        <input type="text" name="nome" id="nome" value="<?= isset($categoria) ? htmlspecialchars($categoria['nome']) : '' ?>" required>
        <button type="submit">Salvar</button>
    </form>
</div>