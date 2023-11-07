<?php 
    session_start();
    require_once("../connection/Connection.php");
    require("../model/Usuario.php");

    $usuario = $_GET['nombre'];
    $id = $_SESSION['usuario']['id'];

    $query = $connect->query("SELECT p.text, u.username FROM publications p JOIN users u ON p.userId = u.id WHERE u.username = '$usuario' ORDER BY p.createDate DESC");
    $query2 = $connect->query("SELECT description FROM users WHERE username = '$usuario'");


    if (isset($_POST['seguir'])) {
        require_once("../connection/Connection.php");

        $query3 = $connect->query("INSERT INTO follows (users_id, userToFollowId) SELECT u.id, f.id FROM users u, users f WHERE u.id = $id AND f.username = '$usuario'");
    } elseif (isset($_POST['noSeguir'])) {
        require_once("../connection/Connection.php");

        $query4 = $connect->query("DELETE FROM follows WHERE users_id = $id AND userToFollowId = (SELECT id FROM users WHERE username = '$usuario')");
    }
?>