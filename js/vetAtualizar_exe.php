<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        require "db/conectarBase.php";

    ?>

    <section class="container">
        <div class="row">
            <div class="md-col-6">
                <?php
                
                    $id = $_POST["id"];
                    $nome = $_POST["nome_completo"];
                    $usuario = $_POST["nome_usuario"];
                    $cfmv = $_POST["cfmv"];

                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die ("<strong> Falha de conexão </strong>". $conn->connect_error);
                    }

                ?>
                <?php
                
                    $sql = "update veterinarios set nome_completo = '$nome', cfmv = '$cfmv',  nome_usuario = '$usuario' where id = $id";


                    echo "<div>";
                    if ($result = $conn->query($sql)) {
                        echo "<p> Registro alterado com sucesso! </p>";
                    } else {
                        echo "<p> Erro executando UPDATE:".$conn->connect_error. "</p>";
                    }
                    echo "</div>";
                    header("location: /projetos/projeto_puc_fullstack/funcoes.php");
                    $conn->close();
                ?>
            </div>
        </div>
    </section>
</body>
</html>