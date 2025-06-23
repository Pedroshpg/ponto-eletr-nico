<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    $sql = "SELECT id, senha, ADM FROM usuarios WHERE email = ?";
    if ($query = $conn->prepare($sql)) {
        $query->bind_param("s", $email);
        $query->execute();
        $query->bind_result($id, $senha_bd, $ADM);
        $query->fetch();

        if ($id && strcmp($senha, $senha_bd) === 0) {
            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario_adm'] = $ADM;
            header("Location: index.php");
            exit;
        } else {
            $erro = "E-mail ou senha inválidos.";
        }

        $query->close();
    } else {
        $erro = "Erro ao acessar o banco de dados.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Entrar</h2>

        <?php if (isset($erro)) : ?>
            <div class="alert alert-danger text-center"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Seu e-mail" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Sua senha" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Acessar</button>
            </div>
        </form>
    </div>

</body>
</html>
