<link rel="stylesheet" href="style.css">
<h2>Login</h2>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?= htmlspecialchars($error); ?></p>
<?php endif; ?>

<form method="post">
    <label>E-mail</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Entrar</button>
</form>

<p>Não tem conta? <a href="index.php?controller=Auth&action=registro">Cadastre-se</a></p>