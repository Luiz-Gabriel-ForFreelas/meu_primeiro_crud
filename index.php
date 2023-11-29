<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logar-se</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">    
</head>
<body>
    <?php
        session_start();                     #Inicia a sessão
        if (isset($_SESSION['login'])) {     #Verifica se o login da sessão já está definido
            header("location: /projetos/projeto_puc_fullstack/funcoes.php");           #Se estiver, o usuário é redirecionado as utilidades da plataforma
            exit();                          #Finaliza a sessão
        }
    ?>  

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
                            <span href="" class="nav-link"><button class="btn" onclick="mostrarLogin()">Login</button></span>
                        </li>
                        <li class="nav-item">
                            <span href="" class="nav-link"><button class="btn" onclick="mostrarCadastrar()">Cadastrar-se</button></span>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <?php           
    
        $msg = "";
        $msg_header = "";
        if(isset($_SESSION['nao_autenticado'])) {
            $msg = $_SESSION['mensagem'];
            $msg_header = $_SESSION['mensagem_header'];
        }

    ?>
    <?php
    
        if($msg != ""){
            echo '<div class="container mt-3 d-flex justify-content-center">';
            if(substr($msg, 0, 4) == 'Seja'){
                echo '<div class="bg-warning p-3 btn">';
            } else {
                echo '<div class="bg-danger p-3 btn">';
            }
                echo '<span style="color: white;">';
                    echo $msg;
                echo '</span>';
            echo '</div></div>';   
        } else { 
            echo "";
        }
    
    ?>

    <div>
        <section class="d-flex justify-content-center mt-5" id="aba_principal">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Seja bem vindo(a) ao nosso sistema de gerência de equipes</h5>
                    <p class="card-text">Para começar a realizar alterações no seu sistema de equipes, realize login ou o cadastro dentro do sistema.</p>
                </div>
            </div>
        </section>
    </div>

    <section class="d-flex justify-content-center" id="aba_login">
        <div class="row position-absolute">
            <div class="md-col-4 align-self-center mt-5">
                <div class="card">
                    <div class="card-body">
                        <form class="input-group mb-3" action="login.php" method="POST">
                            <div class="card-text">
                                
                                    <label for="nome_usuario">Nome de usuário</label><br>
                                    <input class="form-control"  type="text" name="nome_usuario" id="nome_usuario">
                                    <label class="mt-3" for="senha" id="senha">Senha</label>
                                    <input class="form-control" type="password" id="senha_login" name="senha">
                                    <input class="mt-3" type="checkbox" id="mostrar_senha_login" onclick="mostrarSenhaLogin()"><b>Mostrar senha</b>
                                    <input style="color: white;" type="submit" value="Logar-se" class="light bg-success border-0 btn btn-success form-control mt-3">

                            </div>
                        </form>
                    </div>
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
                                    <input style="color: white;" type="submit" value="Cadastrar-se" class="light bg-success border-0 btn btn-success form-control mt-3">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="js/funcoes_index.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>