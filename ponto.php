<?php
date_default_timezone_set('America/Sao_Paulo');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

include("config.php");

$usuario_id = $_SESSION['usuario_id'];


$is_admin = ($_SESSION['usuario_adm'] === 'sim');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $horario = date("Y-m-d H:i:s");


    $sql = "INSERT INTO registros (usuario_id, tipo, horario) VALUES ($usuario_id, '$tipo', '$horario')";
    if (mysqli_query($conn, $sql)) {
        echo "<p class='alert alert-success'>Ponto registrado com sucesso!</p>";
    } else {
        echo "<p class='alert alert-danger'>Erro ao registrar ponto. Tente novamente.</p>";
    }
}
?>

<h2 class="mb-4">Registro de Ponto</h2>

<form method="post" class="mb-4">
    <div class="btn-group" role="group">
        <button type="submit" name="tipo" value="Entrada" class="btn btn-outline-primary">Entrada</button>
        <button type="submit" name="tipo" value="Saída Almoço" class="btn btn-outline-primary">Saída p/ Almoço</button>
        <button type="submit" name="tipo" value="Volta Almoço" class="btn btn-outline-primary">Volta do Almoço</button>
        <button type="submit" name="tipo" value="Saída" class="btn btn-outline-primary">Saída</button>
    </div>
</form>

<h4>Registros</h4>
<table class="table table-bordered table-striped">
    <thead class="thead-light">
        <tr>
            <th>Tipo</th>
            <th>Horário</th>
            <?php if ($is_admin) : ?>
                <th>Usuário</th>
            <?php endif; ?>
            <?php if ($is_admin) : ?>
                <th>Ações</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php
        
        if ($is_admin) {
            $sql = "SELECT registros.tipo, registros.horario, registros.usuario_id, usuarios.nome, registros.id
                    FROM registros
                    JOIN usuarios ON registros.usuario_id = usuarios.id
                    WHERE DATE(registros.horario) = CURDATE()
                    ORDER BY registros.horario DESC";
        } else {
            $sql = "SELECT tipo, horario, id FROM registros WHERE usuario_id = $usuario_id AND DATE(horario) = CURDATE() ORDER BY horario DESC";
        }

        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["tipo"] . "</td>";
                echo "<td>" . $row["horario"] . "</td>";

                
                if ($is_admin) {
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>
                            <button onclick=\"if(confirm('Tem certeza que deseja excluir?')) {
                                location.href='?page=salvar&acao=excluirponto&id=" . $row["id"] . "';
                            } else { false }\" class='btn btn-danger'>Excluir</button>
                          </td>";
                }

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='" . ($is_admin ? 4 : 2) . "'>Nenhum registro encontrado.</td></tr>";
        }
        ?>
    </tbody>
</table>
