<?php 

    if(isset($_POST['submit']))
    {
        //print_r('Nome: ' . $_POST['nome']);
        //print_r('<br>');
        //print_r('Email: ' . $_POST['email']);
        //print_r('<br>');
        //print_r('Senha: ' . $_POST['senha']);

        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha)
        VALUES ('$nome','$email','$senha')");

        header('Location: login-jhondeere.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Página de cadastro</title>
</head>

<header>
    <?php include 'menu-nao-logado.php'; ?>
</header>

<body>
    
    <div class="conteudo-pagina-cadastro">

        <div class="col-imagem">

            <div class="imagem-pagina-cadastro">
               <img src="imagens/imagem-cadastro.jpg" alt="Trabalhamos para o planeta que nos sustenta." width="100%">
            </div>

        </div>

        <div class="col-form-cadastro">

            <div class="form-cadastro-content">

                <form action="cadastro-jhondeere.php" method="POST">

                <div class="cadastro-title-content">
                    
                    <div class="cadastro-title">
                        <p>Cadastre-se</p>
                    </div>

                    <div class="btn-pagina-cadastro-para-login">
                        <a href="login-jhondeere.php">Entrar</a>
                    </div>

                </div>


                <div class="form-cadastro">

                    

                        <div class="form-cadastro-nome">
                            <label for="name">Digite o seu nome</label>
                            <br>
                            <input type="text" name="nome" placeholder="Nome" required>
                        </div>

                        <div class="form-cadastro-email">
                            <label for="email">Digite o seu email</label>
                            <br>
                            <input type="email" name="email" placeholder="E-mail" required>
                        </div>

                        <div class="form-cadastro-password">
                            <label for="password">Digite uma senha</label>
                            <br>
                            <input type="password" name="senha" placeholder="Senha" required>
                        </div>

                        <div class="form-cadastro-password-confirm">
                            <label for="password-confirm">Digite a senha novamente</label>
                            <br>
                            <input type="password" name="senha" placeholder="Senha" required>
                        </div>

                    </form>

                    <div class="btn-cadastro-continuar">

                        <input type="submit" name="submit" value="Enviar">

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>