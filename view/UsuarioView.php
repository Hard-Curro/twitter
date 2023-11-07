<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
        defer></script> 
        
        <link rel="icon" href="img/icono.png" type="image/png">
        <title>CURRITER</title>
</head>

<body>
<div class="container">
    <div>
<div id="card_usuario">
        <p><strong>USUARIO: </strong><?php print_r($usuario) ?></p>
        <p><strong>DESCRIPCION: </strong><?php $_SESSION['usuario']['description']?></p>
        <?php 
        while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)): ?>
                    <p class="card-text"><?= $row2['description'] ?></p>                                                        
        <?php endwhile; ?>
        
        <form action="" method="post">
        <button class="botones" type="submit" name="seguir">Seguir</button>
    </form>
    <form action="" method="post">
        <button class="botones" type="submit" name="noSeguir">Dejar de seguir</button>
    </form>
    
    </div>
    <div><a href="../index.php" class="botones">Volver</a></div> 
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