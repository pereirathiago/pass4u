<?php
    $host = "sql212.epizy.com";
    $user = "epiz_27189229";
    $password = "TfAm0z4Eyd6q5Hq";
    $database = "epiz_27189229_pass4u";


    // Criar conexão
    $conn = mysqli_connect($host, $user, $password, $database);
    mysqli_set_charset($conn,"utf8");

    // Checar conexão
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>