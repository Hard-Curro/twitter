<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">

    <title>Document</title>
</head>

<body>
    <div class="credenciales">
        <form class="formularios_credenciales" action="../model/RegisterDAO.php" method="post">
            <p>Usuario</p>
            <input type="text" name="username">
            <p>Correo</p>
            <input class="imp_espaciado" type="email" name="email">
            <p>Contraseña</p>
            <input class="imp_espaciado" type="password" name="password">
            <p>Descripción</p>
            <input class="imp_espaciado" type="text" name="description">
            <input class="botones" id="centrar_boton2" type="submit" value="Registrarse">
        </form>
        <div><a href="../controller/LoginController.php" class="botones">Login</a></div>
    </div>
</body>

</html>