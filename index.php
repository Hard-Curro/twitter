<?php
session_start();
// Verificar si el usuario NO ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // El usuario NO ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: controller/LoginController.php");
    exit;
}

require_once("connection/Connection.php");

$query = $connect->query("SELECT p.text, u.username FROM publications p JOIN users u ON p.userId = u.id ORDER BY p.createDate DESC");


if (isset($_POST['btn1'])) {
    require_once("connection/Connection.php");
    $query = $connect->query("SELECT p.text, u.username FROM publications p JOIN users u ON p.userId = u.id ORDER BY p.createDate DESC");
} elseif (isset($_POST['btn2'])) {
    require_once("connection/Connection.php");
    $Usuario = $_SESSION['usuario']['id'];
    $query = $connect->query("SELECT p.text, u.username FROM publications p JOIN users u ON p.userId = u.id JOIN follows f ON f.userToFollowId = p.userId WHERE f.users_id = '$Usuario'");
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
        defer></script> 
        
    <link rel="icon" href="img/icono.png" type="image/png">
    <title>CURRITER</title>
</head>
<body>
    <nav>
    <form action="" method="post">
        <button type="submit" name="btn1">Todos</button>
    </form>
    <form action="" method="post">
        <button type="submit" name="btn2">Seguidos</button>
    </form>
        <a href="model/LogoutDAO.php"><button>Logout</button></a>
    </nav>
    <div class="container">
       <div id="card_usuario">
             <p><strong>USUARIO: </strong><?php print_r($_SESSION['usuario']['username'])?></p>
             <p><strong>DESCRIPCION: </strong><?php print_r($_SESSION['usuario']['description'])?></p>
            <a href="controller/EditarController.php"><button class="botones">Editar</button></a>
       <h1>Crear Mensaje</h1>
        <form action="model/EnviarDAO.php" method="post">
         <textarea id="tamaño" name="text" rows="4" cols="50"></textarea>
         <input class="botones" type="submit" value="Crear Mensaje">
        </form>
        </div>
        <div id="card_mensajes">
        <?php 
        while ($row = $query->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="card" id="mensajes" style="width: 18rem;">
                <div class="card-body">
                <a href="controller/UsuarioController.php?nombre=<?php echo $row['username'] ?>"><h5 class="card-title"><?= $row['username'] ?></h5></a>
                    <p class="card-text"><?= $row['text'] ?></p>                                                        
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</body>
</html>


<!-- Si sigo 2 veces peta, tendria que quitar el boton de seguir si ya lo sigue
     No deberias poder seguirte a ti mismo   -->