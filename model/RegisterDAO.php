<?php
require_once("../connection/Connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Usuario = $_POST['username'];
    $Gmail = $_POST['email'];
    $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $Descripcion = $_POST['description'];
    $CreateDate = date("Y-m-d H:i:s");

    try {
        $result = $connect->prepare("INSERT INTO users (username, email, password, description ,createDate) VALUES ( (?) , (?), (?), (?) , (?) )");

        $result->bindParam(1,$Usuario); 
        $result->bindParam(2,$Gmail); 
        $result->bindParam(3,$Password); 
        $result->bindParam(4,$Descripcion); 
        $result->bindParam(5,$CreateDate); 
        $result->execute();

        echo "Registrado con exito";
        sleep(3);
        header("Location: ../index.php");
    } catch (PDOException $e) {
        header("Location: ../errors/error.php");
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