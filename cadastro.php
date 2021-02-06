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
    <title>Pass4u | Cadastro</title>
    <script src="./scripts/scripts.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
</head>

<body class="text-center naoSelecionavel">
    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto mt-2  animate__animated animate__fadeInDown" style="margin-bottom:13vh !important;">
            <div class="inner">
                <h3 class="masthead-brand font-weight-bold purple mb-3">Pass4u</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="index.html">Início</a>
                    <a class="nav-link" href="sobre.html">Sobre</a>
                    <a class="nav-link active" href="entrar.php">Entre / Cadastre-se</a>
                </nav>
            </div>
        </header>

        <!-- alertas -->
        <div class="alert alert-danger fixed-top w-50 ml-auto mr-auto mt-3 animate__animated animate__fadeIn none" id="jacadastro" role="alert">
            Email já cadastrado!
        </div>

        <div class="alert alert-danger fixed-top w-50 ml-auto mr-auto mt-3 none animate__animated animate__fadeIn" id="senhaPequena" role="alert">
            A senha deve ter mais de 6 caracteres!
        </div>

        <main role="main" class="inner animate__animated animate__zoomIn">
            <form class="form-signin" id="formSingIn" method="POST">
                <h1 class="h1 mb-4 font-weight-bold">Cadastre-se</h1>
                <input onkeyup="validaSenha()" type="text" maxlength="25" name="login" id="login" placeholder="Nome"
                    class="form-control mb-4" autofocus>
                <input onkeyup="validaSenha()" type="email" name="email" maxlength="43" id="email" placeholder="E-mail"
                    class="form-control mb-4">
                <input onkeyup="validaSenha()" type="password" maxlength="20" name="password" id="senha"
                    placeholder="Senha" class="form-control mb-1">
                <div class="text-right"><a onclick="mostrarSenha()" class="hpurple pointer mr-2">Revelar senha</a></div>
                <input type="submit" class="btn btn-lg bgpurple btn-block font-weight-bold mt-4" id="enviar" type="submit" value="Cadastre-se">
                <p class="mt-3">Já possui uma conta? <a href="entrar" class="hpurple">Entrar</a></p>
            </form>
            
            <!-- VERIFICAR DADOS DO REGISTRO | INICIO -->
            <?php
                include_once('PHP/conection.php');
                include('PHP/segurança.php');
                if(isset($_POST['login'])) {

                $email = safe($_POST['email']);
                $senha = safe($_POST['password']);
                $login = safe($_POST['login']);

                if(!empty($email) && !empty($senha) && !empty($login))  {
                    $sql = "INSERT INTO usuarios (Login, Pass, Email) VALUES ('$login', md5('$senha'), '$email')";
                    $query = "SELECT * FROM usuarios WHERE Email = '$email'";

                    $result = mysqli_query($conn, $query);

                    $row = mysqli_num_rows($result);
                    $tamanho = strlen($senha);
                    if($tamanho > 6 and $tamanho <= 20 and strlen($email) <= 43 and strlen($login) <= 25){
                        if($row == 0) {
                            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                mysqli_query($conn, $sql);
                                header('Location: ../entrar');
                                exit();
                            } else {
                                echo "Preencha o E-mail corretamente!";
                                exit();
                            }
                            } else {
                                echo '<script>
                                document.getElementById("formSingIn").classList.add("animate__headShake")                                  
                                document.getElementById("jacadastro").classList.remove("none")
                                let jacadastro = setTimeout(function() {
                                    document.getElementById("jacadastro").classList.add("animate__fadeOut")
                                    let quit = setTimeout(() => {
                                        document.getElementById("jacadastro").classList.add("none")
                                    }, 1000)
                                }, 3000)
                                document.getElementById("jacadastro").classList.remove("animate__fadeOut")
                                </script>';
                                exit();
                        }} else {
                            echo '<script>
                            document.getElementById("formSingIn").classList.add("animate__headShake")                                  
                            document.getElementById("senhaPequena").classList.remove("none") 
                            let senhaPequena = setTimeout(function() {
                                document.getElementById("senhaPequena").classList.add("animate__fadeOut")
                                let quit = setTimeout(() => {
                                    document.getElementById("senhaPequena").classList.add("none")
                                }, 1000)
                            }, 3000)
                            document.getElementById("senhaPequena").classList.remove("animate__fadeOut")
                            </script>';
                        }
                    } else {
                        echo "Preencha todos os campos!";
                    }}
            ?>
            <!-- VERIFICAR DADOS DO REGISTRO | FIM -->
        </main>
        
    </div>


</body>

</html>