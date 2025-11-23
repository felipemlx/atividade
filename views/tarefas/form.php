<link rel="stylesheet" href="style.css">

<div class="container">
    <h2><?= isset($tarefa) ? 'Editar Tarefa' : 'Nova Tarefa'; ?></h2>

    <form method="post">
        <label>Título</label>
        <input type="text" name="titulo" required value="<?= isset($tarefa) ? htmlspecialchars($tarefa['titulo']) : ''; ?>">

        <label>Descrição</label>
        <textarea name="descricao"><?= isset($tarefa) ? htmlspecialchars($tarefa['descricao']) : ''; ?></textarea>

        <label>Categoria</label>
        <select name="categoria">
            <option value="">-- Sem categoria --</option>
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id']; ?>"
                    <?= isset($tarefa) && $tarefa['categoria'] == $cat['id'] ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($cat['nome']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <?php if (isset($tarefa)): ?>
            <label>Status</label>
            <select name="status">
                <option value="pendente"  <?= $tarefa['status'] === 'pendente'  ? 'selected' : ''; ?>>Pendente</option>
                <option value="concluida" <?= $tarefa['status'] === 'concluida' ? 'selected' : ''; ?>>Concluída</option>
            </select>
        <?php endif; ?>

        <button type="submit">Salvar</button>
        <a href="index.php?controller=Tarefa&action=dashboard">Voltar para Dashboard</a>
    </form>
</div>