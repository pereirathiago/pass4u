<?php
    session_start();
    include("conection.php");

    if(empty($_POST['login']) || empty($_POST['password'])) {
        header('Location: ../entrar.php');
        exit();
    }

    $usuario = mysqli_real_escape_string($conn ,$_POST['login']);
    $senha = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT idUsuario, Login FROM usuarios WHERE Login = '{$usuario}' and Pass = md5('{$senha}')";

    $result = mysqli_query($conn, $query);

    $row = mysqli_num_rows($result);

    if($row == 1) {
        $_SESSION['usuario'] = $usuario;
        header('Location: ../gerar.php');
        exit();
    } else {
        header('Location: ../entrar.php');
        exit();
    }
?>