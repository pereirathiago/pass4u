<?php
    $host = "localhost";
    $user = "pass4u";
    $password = "vertrigo";
    $database = "pass4u";


    // Criar conexão
    $conn = mysqli_connect($host, $user, $password, $database);
    mysqli_set_charset($conn,"utf8");

    // Checar conexão
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>