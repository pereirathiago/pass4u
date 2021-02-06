<?php
session_start();
include('PHP/verifica_login.php');
include('PHP/conection.php');
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
    <title>Pass4u | Minha conta</title>
    <script src="./scripts/scripts.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
</head>

<body class="text-center naoSelecionavel">
    <!-- alertas -->
        <div class="alert alert-success fixed-top w-50 ml-auto mr-auto mt-3 none animate__animated animate__fadeIn" style="z-index: 10;" id="sucess" role="alert">
            Senha copiada com sucesso!
        </div>
        <div class="alert alert-danger fixed-top w-50 ml-auto mr-auto mt-3 none animate__animated animate__fadeIn" style="z-index: 10;" role="alert" id="errorCopy">
            Falha ao copiar a senha, tente novamente!
        </div>

    <div class="container d-flex w-100 h-100 p-3 my-auto flex-column">
        <header class="masthead mt-2 mb-auto" >
            <div class="inner" id="header">
                <h3 class="masthead-brand font-weight-bold purple mb-3">Pass4u</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="gerar">Gerar Senha</a>
                    <a class="nav-link active" href="conta"><?php echo $_SESSION['usuario'] ?></a>
                    <a class="nav-link" href="PHP/sair">Sair</a>
                </nav>
            </div>
        </header>
        <main role="main" class="inner mb-5 mt-5">
            <h3 class="mt-3 mb-3 font-weight-bold purple">Minhas senhas</h3>
            <?php
                // PHP MOSTRAR SENHAS / INICIO
                $id = $_SESSION['id'];
                $sql = mysqli_query($conn, "select plataforma, senhaGerada, senhaId from usuarios, senhas where idUsuario = '$id' and UsuarioID = '$id'") or die(mysqli_error($conn));
                while($mostrar = mysqli_fetch_assoc($sql)) {
                    echo "  <div class='row'>
                                <h3 class='labelmostra' style='margin:0 auto;'>{$mostrar['plataforma']}</h3>
                                <input class='senhas btn-lg bgpurple btn-block font-weight-bold mt-1 mb-3 senhamostra  senha2{$mostrar['senhaId']}' type='button' value='{$mostrar['senhaGerada']}' onclick='copiar()'>
                                <input id='passwordsenha' value='{$mostrar['senhaGerada']}'>
                            </div>";
                }
                // PHP MOSTRAR SENHAS / FIM
            ?> 

        </main>
        <footer class="mastfoot mt-auto">
            <div class="inner" id="footerindex">
                <p>Feito por João Pedro, Thiago e Danilo</p>
            </div>
        </footer>
    </div>

    <script>
        function copiar2(senha) {
            try {
                var senha = document.getElementsByClassName('passwordsenha')
                senha.select()
                var ok = document.execCommand('copy')
                alert(ok)
                if (ok) {
                    document.getElementById('sucess').classList.remove('none')  
                    let sucess = setTimeout(function() {
                        document.getElementById('sucess').classList.add('animate__fadeOut')
                        let quit = setTimeout(() => {
                            document.getElementById('sucess').classList.add('none')
                        }, 1000)
                    }, 3000)
                    document.getElementById('sucess').classList.remove('animate__fadeOut')
                }
            
            } catch (e) {
                console.log(e)
                document.getElementById('errorCopy').classList.remove('none')  
                let errorCopy = setTimeout(function() {
                    document.getElementById('errorCopy').classList.add('animate__fadeOut')
                    let quit = setTimeout(() => {
                        document.getElementById('errorCopy').classList.add('none')
                    }, 1000)
                }, 3000)
                document.getElementById('errorCopy').classList.remove('animate__fadeOut')
            }
        }
    </script>

</body>

</html>