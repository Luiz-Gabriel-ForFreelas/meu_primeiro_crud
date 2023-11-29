<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/5cff0a8232.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php require "base_header.php";?>
    <?php   require "db/conectarBase.php";?>

    <?php

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("<strong> Falha de conexão: </strong>".$conn->connect_error);
        }

        $id = $_GET['id'];

        $sql = "select id, cfmv, nome_completo, nome_usuario from veterinarios where id = $id";
    ?>
    <?php
        if($result = $conn->query($sql)){
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
    
    ?>
        <section class="container">
                    <div class="rounded mt-5 p-2 border">
                        <h2 class="d-flex justify-content-center">Excluír o registro do veterinário cód = [<?php echo $id; ?>]</h2>
                    </div>

                    <form  action="vetExcluir_exe.php" method="POST" onsubmit="return check(this.form)">
                        <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">

                        <label class="mt-4" for="nome_completo">Nome completo</label>
                        <input class="form-control"value="<?php echo $row['nome_completo'] ?>" readonly>

                        <label class="mt-4" for="cfmv">Nome Usuário</label>
                        <input class="form-control" value="<?php echo $row['nome_usuario'] ?>" readonly>

                        <label class="mt-3" for="cfmv">CFMV</label>
                        <input class="form-control" value="<?php echo $row['cfmv'] ?>" readonly>

                        <div class="mt-4">
                            <span>
                                <input style="width:49.5%;" class="btn" type="submit" value="Confirmar exclusão" >
                            </span>
                            <span>
                                <input style="width:49.5%;" class="btn" type="button" value="Cancelar" onclick="window.location.href='funcoes.php'">
                            </span>
                        </div>
                    </form>
        </section>
    <?php
    
        } else { ?>
        <div>
            <h2>Tentativa inexistente</h2>
        </div><br>
    <?php }
    
        } else {
            echo "<p style='text-align:center'>Erro executando DELETE: " . $conn->connect_error . "</p>";
        }

        $conn->close();
    ?>
</body>
</html>