<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Olá, <?= htmlspecialchars($_SESSION['usuario_nome']); ?>!</h2>
    <h3>Suas tarefas</h3>

    <div style="margin-bottom: 20px;">
        <a href="index.php?controller=Tarefa&action=criar" class="botao">+ Nova Tarefa</a>
        <a href="index.php?controller=Categoria&action=index">Gerenciar Categorias</a> |
        <a href="index.php?controller=Auth&action=logout">Sair</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Categoria</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tarefas as $tarefa): ?>
                <tr>
                    <td><?= htmlspecialchars(!empty($tarefa['titulo']) ? $tarefa['titulo'] : 'Sem título'); ?></td>
                    <td><?= htmlspecialchars(!empty($tarefa['nome_categoria']) ? $tarefa['nome_categoria'] : 'Sem categoria'); ?></td>
                    <td><?= htmlspecialchars($tarefa['status']); ?></td>
                    <td>
                        <a href="index.php?controller=Tarefa&action=editar&id=<?= $tarefa['id']; ?>">Editar</a> |
                        <a href="index.php?controller=Tarefa&action=deletar&id=<?= $tarefa['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>