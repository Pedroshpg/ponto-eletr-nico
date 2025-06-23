<h1>Novo Usuário</h1>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="Nome" class="form-control">
    </div>

    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="Data_Nasc" class="form-control">
    </div>

    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="Email" class="form-control">
    </div>

    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="Senha" class="form-control">
    </div>

    <div class="mb-3">
        <label>Qual tipo de Usuário?</label><br>
        <label>
            <input type="radio" name="ADM" value="não" checked> Comum
        </label><br>
        <label>
            <input type="radio" name="ADM" value="sim"> Administrador
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
