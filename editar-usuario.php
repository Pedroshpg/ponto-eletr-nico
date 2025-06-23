<h1>Editar Usuário</h1>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<?php
   $sql = "SELECT * FROM usuarios WHERE Id=".$_REQUEST["id"];

   $res = $conn->query($sql);
   $row = $res->fetch_object();
?>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php  print $row->Id; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="Nome" value="<?php
           print $row->Nome;?>
        "class="form-control">
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="Data_Nasc" value="<?php
           print $row->Data_Nasc;?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="Email" value="<?php
           print $row->Email;?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="Senha" value="<?php
           print $row->Senha;?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Qual tipo de Usuário?</label><br>
        <label>
            <input type="radio" name="ADM" value="não" <?php if ($row->ADM === 'não')echo 'checked'; ?>> Comum
        </label><br>
        <label>
            <input type="radio" name="ADM" value="sim" <?php if ($row->ADM === 'sim')echo 'checked'; ?>> Administrador
        </label>
    </div>
    <div class="mb-3">
         <button type="submit" class="btn btn-primary">Salvar</button>

    </div>
  
  </div>
</form>