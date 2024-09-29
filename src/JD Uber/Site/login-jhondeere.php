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
    
    <div class="conteudo-pagina-login">

        <div class="col-imagem">

            <div class="imagem-pagina-login">
               <img src="imagens/imagem-cadastro.jpg" alt="Trabalhamos para o planeta que nos sustenta." width="100%">
            </div>

        </div>

        <div class="col-form-login">

            <div class="form-ogin-content">

                <div class="login-title-content">
                    
                    <div class="login-title">
                        <p>Entrar</p>
                    </div>

                    <div class="btn-pagina-login-para-cadastro">
                        <a href="cadastro-jhondeere.php">Cadastre-se</a>
                    </div>

                </div>


                <div class="form-login">

                    <form action="testelogin.php" method="POST">

                        <div class="form-login-email">
                            <label for="email">Digite o seu email</label>
                            <br>
                            <input type="email" name="email" placeholder="E-mail" required>
                        </div>

                        <div class="form-login-password">
                            <label for="password">Digite a sua senha</label>
                            <br>
                            <input type="password" name="senha" placeholder="Senha" required>
                        </div>

                    

                    <div class="btn-login-continuar">

                        <input type="submit" name="submit" value="Enviar">

                    </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

</body>
</html>