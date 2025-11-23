<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>Cadastro</h2>

    <?php if (!empty($erro)): ?>
        <div class="erro"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>
    <form method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required>

        <label for="senha_confirmacao">Confirmar senha</label>
        <input type="password" name="senha_confirmacao" id="senha_confirmacao">

        <button type="submit">Cadastrar</button>
    </form>

    <div class="link">
        Já tem conta?
        <a href="index.php?controller=Auth&action=login">Faça login</a>
    </div>
</div>