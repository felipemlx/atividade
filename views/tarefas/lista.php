<link rel="stylesheet" href="style.css">
<div class="container">
    <div class="topo-links">
        <span>Olá, <?= htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário'); ?>!</span> |
        <a href="index.php?controller=Categoria&action=index">Gerenciar Categorias</a> |
        <a href="index.php?controller=Auth&action=logout">Sair</a>
    </div>

    <h2>Minhas Tarefas</h2>

    <a class="botao" href="index.php?controller=Tarefa&action=criar">+ Nova Tarefa</a>

    <table>
        <thead>
        <tr>
            <th>Título</th>
            <th>Categoria</th>
            <th>Status</th>
            <th>Criada em</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($tarefas)): ?>
            <?php foreach ($tarefas as $tarefa): ?>
                <?php
                    $statusClass = $tarefa['status'] === 'concluida' ? 'status-concluida' : 'status-pendente';
                ?>
                <tr>
                    <td><?= htmlspecialchars($tarefa['titulo']) ?></td>
                    <td><?= htmlspecialchars($tarefa['nome'] ?? 'Sem categoria') ?></td>
                    <td class="<?= $statusClass ?>">
                        <?= htmlspecialchars($tarefa['status']) ?>
                    </td>
                    <td><?= htmlspecialchars($tarefa['criada_em'] ?? '') ?></td>
                    <td class="acoes">
                        <a href="index.php?controller=Tarefa&action=editar&id=<?= $tarefa['id'] ?>">Editar</a>
                        <a href="index.php?controller=Tarefa&action=deletar&id=<?= $tarefa['id'] ?>"
                           onclick="return confirm('Deseja realmente excluir esta tarefa?');">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Nenhuma tarefa cadastrada.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>