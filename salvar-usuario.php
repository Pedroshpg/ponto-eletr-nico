<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<?php

    switch($_REQUEST["acao"]) {
        
        case 'cadastrar':
            $Nome = $_POST["Nome"];
            $Data_Nasc = $_POST["Data_Nasc"];
            $Email = $_POST["Email"];
            $Senha = $_POST["Senha"];
            $ADM = $_POST["ADM"];

            $sql = "INSERT INTO usuarios (Nome ,Data_Nasc ,Email ,Senha ,ADM) VALUES
             ('{$Nome}','{$Data_Nasc}', '{$Email}', '{$Senha}', '{$ADM}' )";
            $res = $conn->query($sql);

            if($res ==true){
                print"<script>alert('Cadastro realizado com sucesso');</script>";
                header("Location:?page=listar");
            }else{
                print"<script>alert('Ocorreu um erro');</script>";
                header("Location:?page=listar");
            }
        break;
        case 'editar':
            $Nome = $_POST["Nome"];
            $Data_Nasc = $_POST["Data_Nasc"];
            $Email = $_POST["Email"];
            $Senha = $_POST["Senha"];
            $ADM = $_POST["ADM"];

            $sql = "UPDATE usuarios set Nome ='{$Nome}',                                       
                                        Data_Nasc ='{$Data_Nasc}',
                                        Email ='{$Email}',
                                        Senha ='{$Senha}',
                                        ADM = '{$ADM}' WHERE Id=".$_REQUEST["id"];                       

            $res = $conn->query($sql);

            if($res ==true){
                print"<script>alert('Editado realizado com sucesso');</script>";
                header("Location:?page=listar");
            }else{
                print"<script>alert('Não foi possível editar');</script>";
                header("Location:?page=listar");
            }
        break;
         case 'excluir':

            $sql1 = "DELETE FROM registros WHERE usuario_id = " . $_REQUEST["id"];
            $res1 = $conn->query($sql1);

    
            $sql2 = "DELETE FROM usuarios WHERE id = " . $_REQUEST["id"];
            $res2 = $conn->query($sql2);

            if($res2 ==true){
                print"<script>alert('Excluido com sucesso');</script>";
                header("Location:?page=listar");
            }else{
                print"<script>alert('Não foi possível excluir');</script>";
                header("Location:?page=listar");
            }
         case 'excluirponto':

            $sql = "DELETE FROM registros WHERE id=".$_REQUEST["id"] ;

            $res = $conn->query($sql);

            if($res ==true){
                print"<script>alert('Excluido com sucesso');</script>";
                header("Location:?page=ponto");
            }else{
                print"<script>alert('Não foi possível excluir');</script>";
                header("Location:?page=ponto");
            }

        break;
    }