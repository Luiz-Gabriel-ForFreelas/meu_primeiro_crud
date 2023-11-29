<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require "db/conectarBase.php";
    ?>

    <h2>Exclusão de veterinário</h2>

    <?php
    
        $conn = new mysqli($servername, $username, $password, $database);
        $id = $_POST["id"];

        if (!$conn){
            die("Falha de conexão".mysqli_connect_error());
        }

        $sql = "delete from veterinarios where id = $id";
    ?>

    <div>
        <?php
        
            if($result = $conn->query($sql)) {
                header("location: /projetos/projeto_puc_fullstack/funcoes.php");
            } else {
                echo "<p>Erro executando DELETE:". $conn->connect_error;
            }
            $conn->close();
        ?>
    </div>
</body>
</html>