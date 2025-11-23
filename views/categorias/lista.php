<link rel="stylesheet" href="style.css">
<div class="container">
    <div class="topo-links">
        <a href="index.php?controller=Tarefa&action=dashboard">Voltar para Tarefas</a>
    </div>
    <h2>Categorias</h2>
    <a class="botao" href="index.php?controller=Categoria&action=criar">+ Nova Categoria</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($categorias)): ?>
            <?php foreach ($categorias as $cat): ?>
                <tr>
                    <td><?= htmlspecialchars($cat['id']) ?></td>
                    <td><?= htmlspecialchars($cat['nome']) ?></td>
                    <td class="acoes">
                        <a href="index.php?controller=Categoria&action=editar&id=<?= $cat['id'] ?>">Editar</a>
                        <a href="index.php?controller=Categoria&action=deletar&id=<?= $cat['id'] ?>"
                           onclick="return confirm('Deseja realmente excluir esta categoria?');">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Nenhuma categoria cadastrada.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>