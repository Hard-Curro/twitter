<?php
session_start();
require_once("../connection/Connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Usuario = $_POST['username'];
    $Password = $_POST['password'];

    $result = $connect->query("SELECT * FROM users WHERE username=('$Usuario')");


    $row = $result->fetch(PDO::FETCH_ASSOC);

    if (password_verify($Password, $row['password'])) {
        $_SESSION['usuario'] = $row;
        echo "Has iniciado sesion";
        sleep(3);
        header("Location: ../index.php");
        exit;

    } else {
        header("Location: ../controller/LoginController.php");
        exit;
    }
    $connect = null;
}

/* 
$result = $connect->prepare("SELECT * FROM users WHERE username='$Usuario'");
$result->execute();
$result->bindParam(1,$variable); 
*/
?>
