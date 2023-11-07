<?php 

function connection($host, $user, $pass, $bd) {
    return new PDO("mysql:host=$host;dbname=$bd", $user, $pass);
}

try {
    $host = "localhost:3306";
    $user = "root";
    $pass = "root";

    $bd = "social_network";

    $connect = connection($host, $user, $pass, $bd);
}  catch (PDOException $e) {
    var_dump ($e);
 #   header("Location: ../errors/error.php"); 
}

?>