<?php
    header('Content-Type: text/html; charset=utf-8');
    include_once("conection.php");
    $user = $_POST['login'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (Login, Pass, Email) VALUES ('$user', md5('$pass'), '$email')";

    if (mysqli_query($conn, $sql)) {
        header('Location: logar');
        exit();
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }

?>