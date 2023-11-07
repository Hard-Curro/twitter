<?php
session_start();
require_once("../connection/Connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Usuario = $_SESSION['usuario']['id'];
    $Mensaje = $_POST['text'];
    $CreateDate = date("Y-m-d H:i:s");



    try { 
        $result = $connect->prepare("INSERT INTO publications (userId, text, createDate) VALUES ( (?) , (?), now())");
    
        $result->bindParam(1,$Usuario); 
        $result->bindParam(2,$Mensaje); 
        $result->execute();

        echo "Enviado";
        header("Location: ../index.php");

    } catch (PDOException $e) {
        header("Location: ../errors/error.php");
        exit;
    }

    $connect = null;
}

/* 
$result = $connect->prepare("INSERT INTO publications (userId, text, createDate) VALUES ('$Usuario', '$Mensaje', now())");
$result->execute();
$result->bindParam(1,$variable); 
*/
?>