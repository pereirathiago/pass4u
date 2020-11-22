<?php
session_start();
include('PHP/verifica_login.php');
include('PHP/conection.php');
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Google Analytics -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
                m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->
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
    <div class="container d-flex w-100 h-100 p-3 my-auto flex-column">
        <header class="masthead mb-auto mt-2">
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
            <h3 class="mt-3 font-weight-bold purple">Minhas senhas</h3>
            <?php
                // PHP MOSTRAR SENHAS / INICIO
                $id = $_SESSION['id'];
                $sql = mysqli_query($conn, "select plataforma, senhaGerada from usuarios, senhas where idUsuario = '$id' and UsuarioID = '$id'") or die(mysqli_error($conn));
                while($mostrar = mysqli_fetch_assoc($sql)) {
                    echo "<input class='senhas btn-lg bgpurple btn-block font-weight-bold mt-3' type='button' value='{$mostrar['plataforma']} - {$mostrar['senhaGerada']}'>";
                }
                // PHP MOSTRAR SENHAS / FIM
                ?>
            <!-- <input class="senhas btn-lg bgpurple btn-block font-weight-bold mt-3" type="button"value="Dd2@43Asfggg(35%hfas"> -->
        </main>
        <footer class="mastfoot mt-auto">
            <div class="inner" id="footerindex">
                <p>Feito por João Pedro, Thiago e Danilo</p>
            </div>
        </footer>
    </div>

</body>

</html>