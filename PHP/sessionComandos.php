<?php
    session_start();
    include_once('PHP/conection.php');
    $id = $_SESSION['id'];
    // $sql = "select plataforma, senhaGerada from usuarios, senhas where idUsuario = '$id' and UsuarioID = '$id'";
    $sql = "select plataforma, senhaGerada from usuarios, senhas where idUsuario = '$id' and UsuarioID = '$id'";
    while($exibe = mysqli_fetch_array($sql)) {
        echo "Plataforma = ".$exibe['plataforma']"; Senha = ".$exibe['senhaGerada'];
    }
    // $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
    // $registro = mysqli_fetch_array($resultado);
    //$plataforma = $registro['plataforma'];
    //$senha = $registro['senhaGerada'];
    //$_SESSION['plataforma'] = $plataforma;
    //$_SESSION['senha'] = $senha;
?>