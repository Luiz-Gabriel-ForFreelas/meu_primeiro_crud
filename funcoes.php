<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/5cff0a8232.js" crossorigin="anonymous"></script>
</head>
<body>

    
    <?php require "base_header.php";?>
    <?php   require "db/conectarBase.php";?>  

    <section class="container d-flex justify-content-center" id="aba_principal">
        <div class="row">
            <div class="md-col-12">
                <div>
                    <?php 
                    
                        date_default_timezone_set("America/Sao_Paulo");
                        $data = date("d/m/Y H:i:s", time());
                    
                    ?>

                    <div class="rounded mt-5 p-2 border">
                        <h2 class="d-flex justify-content-center">Listagem de profissionais</h2>
                    </div>

                    <?php
                    
                        $conn = new mysqli($servername, $username, $password, $database);

                        if ($conn->connect_error) {
                            die("<strong> Falha de conexão: </strong>".$conn->connect_error);
                        }

                        $sql = "select id, cfmv, nome_completo, nome_usuario from veterinarios";

                        $result = $conn->query($sql);

                        echo "<table class='table mt-4'>";

                            if($result->num_rows>0){

                            echo "<thead class=''>";
                                echo "<tr class='bg-light'>";
                                echo "<th scope='col'>ID</th>";
                                echo "<th scope='col'>CFMV</th>";
                                echo "<th scope='col'>Imagem</th>";
                                echo "<th scope='col'>Nome Completo</th>";
                                echo "<th scope='col'></th>";
                                echo "<th scope='col'></th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                while($row = $result->fetch_assoc()){
                                    $cod = $row["id"];
                                    echo "<tr>";
                                    echo "<th scope='row'>";
                                        echo $row["id"];
                                    echo "</th>";
                                    echo "<th scope='row'>";
                                        echo $row["cfmv"];
                                    echo "</th>";
                                    echo "<th scope='row' class='d-flex justify-content-center'>";
                                        echo "<img class='rounded-circle' width='30' src='img/default-image.png' alt=''>";
                                    echo "</th>";
                                    echo "<th scope='row'>";
                                        echo $row["nome_completo"];
                                    echo "</th>";
                                    echo "<th scope='row'>";
                                        echo "<a href='vetAtualizar.php?id=$cod'><i style='color:black;' class='fa-solid fa-pencil'></i></a>";
                                    echo "</th>";
                                    echo "<th scope='row'>";
                                        echo "<a href='vetExcluir.php?id=$cod'><i style='color:black;' class='fa-solid fa-trash'></i></a>";
                                    echo "</th>";
                                }
                                echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p> Erro executando SELECT:".$conn->connect_error."</p>";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="d-flex justify-content-center" id="aba_cadastrar">
        <div class="row position-absolute">
            <div class="md-col-4 align-self-center mt-5">
                <div class="card">
                    <div class="card-body">
                        <form class="input-group mb-3" action="cadastrar.php" method="POST">
                            <div class="card-text">
                        
                                    <label for="cfmv">CFMV</label>
                                    <input class="form-control" type="text" id="cfmv" name="cfmv" placeholder="0.0000/0" pattern="^[0-9]{1}.[0-9]{4}/[0-9]{1}$" title="0.0000/0" required>
                                    <label class="mt-3" for="nome_completo">Nome completo</label>
                                    <input class="form-control" type="text" id="nome_completo" name="nome_completo" placeholder="Ex: Maria Eduarda Dos Santos Silva" required>
                                    <label class="mt-3" for="nome_user">Nome de usuário</label>
                                    <input class="form-control" type="text" id="nome_user" name="nome_user" placeholder="Ex: maria.eduarda" pattern="[a-zA-Z]{2,20}\.[a-zA-Z]{2,20}" title="nome.sobrenome" required>
                                    <label class="mt-3" for="senha">Senha</label>
                                    <input class="form-control" type="password" id="senha_cadastrar" name="senha" placeholder="Ex: minhasenha123" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 8 caracteres" required>
                                    <label class="mt-3" for="senha">Confirme a senha</label>
                                    <input class="form-control" type="password" id="confirmar_senha_cadastrar" name="senha" placeholder="Ex: minhasenha123" onkeyup="validarSenha()" required>
                                    <input class="mt-3" type="checkbox" id="mostrar_senha_cadastrar" onclick="mostrarSenhaCadastro()"><b>Mostrar senha</b>
                                    <input style="color: white;" type="submit" value="Cadastrar Usuário" class="light bg-success border-0 btn btn-success form-control mt-3">
                                    <a href=""><input style="color: black;" type="button" value="Cancelar" class="light bg-light border-0 btn btn-success form-control mt-3"></a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="d-flex justify-content-center" id="mais">
        <span>
            <i class="btn btn-light fa-solid fa-plus" onclick="mostrarCadastrar()"></i>
        </span>
    </section>
    <script src="js/funcoes_funcoes.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>


