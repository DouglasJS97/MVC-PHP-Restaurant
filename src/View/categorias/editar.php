<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Editar categorias:
    <br> <br>

    <?php
        if(isset($mensagem)){
            echo $mensagem . "<br><br>";
        }
    ?>

    <?php if($categoria) { ?>
        <form action="" method="POST">
            Nome:
            <br>
            <input type="hidden" name="id" value="<?php echo $categoria['id'] ?>" />
            <input type="text" name="nome" value="<?php echo $categoria['nome'] ?>" />
            <br><br>
            <input type="submit" value="Editar" />
        </form>
    <?php
    } else{
    ?>
        Categoria não cadastrado.
    <?php
    }
    ?>


    <br><br>
    <a href="index.php?rota=categorias&op=listar">Listar Categorias</a>
</body>
</html>