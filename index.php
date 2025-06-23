<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Ponto RH</title>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Ponto RH</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>

                    <?php if ($_SESSION['usuario_adm'] === 'sim') : ?>
                    <a class="nav-item nav-link active" href="?page=novo">Novo Usuário<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="?page=listar">Listar Usuários</a>  
                    <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="?page=ponto">Registrar Ponto</a>
                    <?php else : ?>
                    <a class="nav-item nav-link" href="?page=ponto">Registrar Ponto</a>
                    <?php endif;?> 
                    <a href="?page=logout" class="btn btn-outline-danger" color="red">Sair</a>  
                    </div>       
                    </div>
                </div>
        </nav>

        <div class="container">
            <div class="row">
              <div class="col mt-5">
                       
<?php
                        include("config.php");
                    switch(@$_REQUEST["page"]){
                        case"novo":
                            include("novo-usuario.php");
                        break;
                        case"listar":
                            include("listar-usuario.php");
                        break;
                        case"salvar":
                            include("salvar-usuario.php");
                        break;
                        case"editar":
                            include("editar-usuario.php");
                        break;
                        case"logout":
                            include("logout.php");
                        break;
                        case"ponto":
                            include("ponto.php");
                        break;
                        default:
                        echo "<h2>Bem-vindo!</h2>";
                        echo "<p>Hoje é " . date("d/m/Y") . " - Agora são " . date("H:i") . ".</p>";
                        break;
                      
                    }
                    
                ?>
               </div>          
             </div>      
         </div>

        <script src="js/bootstrap.bundle.min.js" ></script>
  </body>
</html>