<?php
session_start();
require_once("../connection/Connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Usuario = $_SESSION['usuario']['id'];
    $Descripcion = $_POST['text'];

    try {
        $result = $connect->prepare("UPDATE `social_network`.`users` SET `description` = (?) WHERE `id` = $Usuario");

        $result->bindParam(1,$Descripcion); 
        $result->execute();

        $_SESSION['usuario']['description'] = $Descripcion;
        header("Location: ../index.php");
    } catch (PDOException $e) {
        header("Location: ../errors/error.php");
        exit;
    }

    $connect = null;
}

/* 
$result = $connect->prepare("UPDATE `social_network`.`users`
    SET `description` = '$Descripcion'
    WHERE `id` = $Usuario");
$result->execute();
$result->bindParam(1,$variable); 
*/
?>