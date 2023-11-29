
<?php

    session_start();
    if(!isset($_SESSION['login'])){
        unset($_SESSION ['nao_autenticado']);
        unset($_SESSION ['mensagem_header'] ); 
        unset($_SESSION ['mensagem'] ); 
        header('location: /projetos/projeto_puc_fullstack/index.php');    // Vai para a página inicial
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">  
</head>
<body>
    <header>
            <nav class="navbar navbar-expand-sm navbar-light bg-success">
                <div class="container">

                    <a href="" class="navbar-brand">
                        <span>Controle de equipe</span>
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="nav-principal"    >
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="" class="nav-link"><button class="btn"><?php echo"Usuário: ".   $_SESSION["nome"]?></button></a>
                            </li>
                            <li>
                                <a href="logout.php" class="nav-link"><button class="btn">Sair</button></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
    </header>
</body>
</html>