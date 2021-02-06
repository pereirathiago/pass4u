<?php
session_start();
include('PHP/verifica_login_logado.php');
?>


<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Pass4u | Entrar </title>
    <script src="./scripts/scripts.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
</head>

<body class="text-center naoSelecionavel">
    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto mt-2 animate__animated animate__fadeInDown" style="margin-bottom:13vh !important;">
            <div class="inner">
                <h3 class="masthead-brand font-weight-bold purple mb-3">Pass4u</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="index.html">Início</a>
                    <a class="nav-link" href="sobre.html">Sobre</a>
                    <a class="nav-link active" href="cadastro.php">Entre / Cadastre-se</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner animate__animated animate__zoomIn">
            <form class="form-signin animate__animated" id="formSingIn" method="POST">
                <h1 class="h1 mb-4 font-weight-bold">Entrar</h1>
                <input type="email" name="login" id="login" maxlength="43" placeholder="E-mail" class="form-control mb-4" required>
                <input type="password" id="senha" name="password" maxlength="20" class="form-control mb-1" placeholder="Senha" required>
                <div class="text-right"><a onclick="mostrarSenha()" class="hpurple pointer mr-2">Revelar senha</a></div>
                <input class="btn btn-lg bgpurple btn-block font-weight-bold mt-4" type="submit" value="Entrar">
                <p class="mt-3">Não possui uma conta ainda? <a href="cadastro" class="hpurple">Cadastre-se</a></p>
            </form>
        </main>

            <!-- alertas -->
            <div class="alert alert-danger fixed-top w-50 ml-auto mr-auto mt-3 none animate__animated animate__fadeIn" style="z-index: 10;" id="errorSenha" role="alert">
                Senha ou e-mail incorreto!
            </div>

           <!-- VERIFICAR DADOS DO LOGIN | INICIO -->
            <?php
                include_once('PHP/conection.php');
                include('PHP/segurança.php');
                if(isset($_POST['login'])) {

                    $senha = safe($_POST['password']);
                    $email = safe($_POST['login']);

                    if(!empty($email) && !empty($senha))  {
                            $query = "SELECT * FROM usuarios WHERE Email = '$email' and Pass = md5('$senha')";

                            $result = mysqli_query($conn, $query);

                            $row = mysqli_num_rows($result);

                            if($row == 1) {
                                    $sql = "SELECT Login, idUsuario FROM usuarios WHERE Email = '$email'";
                                    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
                                    $registro = mysqli_fetch_array($resultado);
                                    $nome = $registro['Login'];
                                    $idUsuario = $registro['idUsuario'];
                                    $_SESSION['usuario'] = $nome;
                                    $_SESSION['id'] = $idUsuario;
                                    header("Location: gerar");
                                } else {
                                    echo '<script>                                 
                                    document.getElementById("errorSenha").classList.remove("none") 
                                    let errorSenha = setTimeout(function() {
                                        document.getElementById("errorSenha").classList.add("animate__fadeOut")
                                        let quit = setTimeout(() => {
                                            document.getElementById("errorSenha").classList.add("none")
                                        }, 1000)
                                    }, 3000)
                                    document.getElementById("errorSenha").classList.remove("animate__fadeOut")
                                    document.getElementById("formSingIn").classList.add("animate__headShake") 
                                    </script>';
                                }
                            } else {
                        echo "Preencha todos os Campos!";
                    }
                }
            ?>
            <!-- VERIFICAR DADOS DO LOGIN | FIM -->
    </div>


</body>

</html>