<?php 

    session_start();
    require 'db/conectarBase.php';

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<strong>Falha de conexão: </strong>".$conn->connect_error);
    }

    $nome = $conn->real_escape_string($_POST["nome_usuario"]); #Define a variavel obtida no cadastro da index como um formato aceitavel para o MySQL
    $senha = $conn->real_escape_string($_POST["senha"]);

    $sql = "select id, nome_completo from veterinarios where nome_usuario = '$nome' and
    senha = md5('$senha')";

    if ($result = $conn->query($sql)){
        if ($row = $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['login'] = $nome;
            $_SESSION['id_usuario'] = $row['id'];
            $_SESSION['nome'] = $row['nome_completo'];
            unset($_SESSION['nao_autenticado']);
            unset($_SESSION ['mensagem_header'] ); 
            unset($_SESSION ['mensagem'] ); 
            header('location: /projetos/projeto_puc_fullstack/index.php');
            exit();
        }else{
            $_SESSION ['nao_autenticado'] = true;
            $_SESSION ['mensagem_header'] = "Login";
            $_SESSION ['mensagem']        = "ERRO: Login ou Senha inválidos.";
            header('location: /projetos/projeto_puc_fullstack/index.php');
            exit();
        }
    }
    else {
        echo "Erro ao acessar o BD: " . mysqli_error($conn);
    }
    $conn->close();  //Encerra conexao com o BD
?>