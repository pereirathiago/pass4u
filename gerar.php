<?php
session_start();
include('PHP/verifica_login.php');
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="yI8joXIF161KhTGDZ0LX6xBjo691MQRZ5h1_vKLkOL0" />

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Pass4u | Gerar Senha</title>
    <script src="scripts/scripts.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
</head>

<body class="text-center naoSelecionavel" id="bodyroxo">
    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto mt-2">
            <div class="inner" id="header">
                <h3 class="masthead-brand font-weight-bold purple mb-3">Pass4u</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="gerar.php">Gerar Senha</a>
                    <a class="nav-link" href="conta.php"><?php echo $_SESSION['usuario']; ?></a>
                    <a class="nav-link" href="PHP/sair.php">Sair</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner">
            <!-- opções para gerar a senha -->
            <div class="form-signin" id="form">
                <h1 class="h1 mb-4 font-weight-bold">Gerar senha</h1>
                <div class="text-left">
                    <p class="mb-2">Número de caracteres</p>
                </div>
                <input type="number" name="lenght" id="lenght" class="form-control mb-3"
                    placeholder="Número de caracteres" required autofocus min="6" max="40" re>
                <div class="text-left">
                    <p class="mb-1">Caracteres especiais</p>
                </div>
                <div class="radio-group">
                    <label class="radio">
                        <input type="radio" name="caractEsp" id="sim" value="1" checked>
                        <span></span>
                        <p>Sim</p>
                    </label>
                    <label class="radio">
                        <input type="radio" name="caractEsp" id="nao" value="0">
                        <span></span>
                        <p>Não</p>
                    </label>
                </div>
                <input class="btn btn-lg bgpurple btn-block font-weight-bold mt-3" type="button" value="Gerar"
                    onclick="gerar()">
            </div>

            <!-- alertas -->
            <div class="alert alert-success fixed-top w-50 ml-auto mr-auto mt-3 none animate__animated animate__fadeIn" style="z-index: 10;" id="sucess" role="alert">
                Senha copiada com sucesso!
            </div>
            <div class="alert alert-danger fixed-top w-50 ml-auto mr-auto mt-3 none animate__animated animate__fadeIn" style="z-index: 10;" role="alert" id="errorCopy">
                Falha ao copiar a senha, tente novamente!
            </div>
            <div class="alert alert-danger fixed-top w-50 ml-auto mr-auto mt-3 none animate__animated animate__fadeIn" style="z-index: 10;" id="errorNumber" role="alert">
                Digite um número de caracteres entre 6 e 40!
            </div>
            <!-- senha gerada -->
            <form class="none text-center " id="formpass">
                <h3 class="mt-5" id="passw"></h3>
                <input class="btn btn-lg bgwhite btn-block font-weight-bold mt-3 ml-auto mr-auto" type="button"
                    value="Copiar e salvar" style="width:200px;" onclick="copiar()">
                <input id="passwordsenha" value="">
            </form>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner" id="footer">
                <p>Feito por João Pedro, Thiago e Danilo</p>
            </div>
        </footer>
    </div>

</body>

</html>