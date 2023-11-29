<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar informações</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/5cff0a8232.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require "base_header.php";?>
    <?php   require "db/conectarBase.php";?>  

    <section class="container d-flex justify-content-center">

        <div class="row">
            <div class="md-col-6">
                <?php
                
                    $id = $_GET["id"];
                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error){
                        die("<strong>Falha de conexão</strong>".$conn->connect_error);
                    }

                    $sql = "select id, nome_completo, cfmv, nome_usuario from veterinarios where id = $id";

                    if ($result = $conn->query($sql)){
                        if($result->num_rows == 1){
                            $row = $result->fetch_assoc();
                            $nome = $row["nome_completo"];
                            $cfmv = $row["cfmv"];
                            $nome_usuario = $row["nome_usuario"];
                ?>  
                    <div class="rounded mt-5 p-2 border">
                        <h2 class="d-flex justify-content-center">Altere os dados do veterinário cód = [<?php echo $id; ?>]</h2>
                    </div>

                    <form action="vetAtualizar_exe.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">

                        <label class="mt-4" for="nome_completo">Nome completo</label>
                        <input class="form-control" type="text" id="nome_completo" name="nome_completo" placeholder="Nome de 10 a 100 caracteres" value="<?php echo $nome ?>" pattern="[a-zA-Z\u00C0-\u00FF ]{10,100}$" required>

                        <label class="mt-4" for="cfmv">Nome Usuário</label>
                        <input class="form-control" type="text" id="nome_usuario" name="nome_usuario" placeholder="0.0000/0" value="<?php echo $nome_usuario ?>" required>

                        <label class="mt-3" for="cfmv">CFMV</label>
                        <input class="form-control" type="text" id="cfmv" name="cfmv" placeholder="0.0000/0" value="<?php echo $cfmv ?>" required>

                        <div class="mt-4">
                            <span>
                                <input style="width:49.5%;" class="btn" type="submit" value="Alterar" >
                            </span>
                            <span>
                                <input style="width:49.5%;" class="btn" type="button" value="Cancelar" onclick="window.location.href='funcoes.php'">
                            </span>
                        </div>
                    </form>
                    <?php
					} else { ?>
						<div class="w3-container w3-theme">
							<h2>Médico inexistente</h2>
						</div>
						<br>
                    <?php
					}
				} else {					
					echo "<p style='text-align:center'>Erro executando UPDATE: " . $conn->connect_error . "</p>";
				}
				$conn->close();
				?>
            </div>
        </div>

    </section>
</body>
</html>