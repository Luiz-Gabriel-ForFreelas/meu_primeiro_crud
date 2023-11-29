<?php

    session_start();
    require "db/conectarBase.php"; #Executa o código inteiro da pagina conectarBase.php

    $conn = new mysqli($servername, $username, $password, $database); #Cria uma conexão com o banco de dados de acordo com as informações passadas

    if ($conn->connect_error) { #Verifica se houve algum erro de conexão
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error); #Caso haja, a sessão será encerrda e o erro mostrado.
    }

    $nome = $conn->real_escape_string($_POST["nome_completo"]); #Define a variavel obtida no cadastro da index como um formato aceitavel para o MySQL
    $cfmv = $conn->real_escape_string($_POST["cfmv"]);
    $nome_user = $conn->real_escape_string($_POST["nome_user"]);
    $senha = $conn->real_escape_string($_POST["senha"]);

    $sql = "insert into veterinarios (cfmv, nome_completo, nome_usuario, senha) values
    ('$cfmv','$nome','$nome_user', md5('$senha'))"; #Cria um string com o comando SQL, como se fosse no prompt do servidor.

    if($result = $conn->query($sql)) { #Executa o código SQL com a função query e verifica se a função pode ser executada.
        $msg = "Seja bem vindo a nossa equipe! Faça login para verificar a ficha dos pacientes"; 
        $_SESSION['nao_autenticado'] = true;
        $_SESSION['mensagem_header'] = "Cadastro";
        $_SESSION['mensagem'] = $msg;
        header("location: /projetos/projeto_puc_fullstack/index.php"); #Redireciona o usuário para a página index
        exit();
    } else {
        $msg = "Erro executando INSERT:" . $conn->connect_error . " Tente novamente.";
        $_SESSION['nao_autenticado'] = true;
        $_SESSION['mensagem_header'] = "Cadastro";
        $_SESSION['mensagem'] = $msg;
        header("location: /projetos/projeto_puc_fullstack/index.php");
        exit();
    }   
    

    $conn->close(); #Finaliza a conexão com o servidor. !
    
?>