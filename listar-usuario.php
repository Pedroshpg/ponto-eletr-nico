<h1>Listar Usuários</h1>

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

$sql = "SELECT * FROM usuarios";
$res = $conn->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    echo "<table class='table table-striped table-bordered'>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Nome</th>";
    echo "<th>Data de Nascimento</th>";
    echo "<th>E-mail</th>";
    echo "<th>Perfil ADM</th>";
    echo "<th>Ações</th>";
    echo "</tr>";
    
   
    while ($row = $res->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $row->Id . "</td>";
        echo "<td>" . $row->Nome . "</td>";
        echo "<td>" . $row->Data_Nasc . "</td>";
        echo "<td>" . $row->Email . "</td>";
        echo "<td>" . $row->ADM . "</td>";
        echo "<td>
                <button onclick=\"location.href='?page=editar&id=".$row->Id."';\" class='btn btn-success'>Editar</button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->Id."';}else{false}\" class='btn btn-danger'>Excluir</button>
              </td>";
        echo "</tr>";
    }
    
    echo "</table>"; 
} else {
    echo "<p class='alert alert-danger'>Não foram encontrados resultados!</p>";
}
?>
