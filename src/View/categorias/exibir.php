<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Categoria:
    <br> <br>

    <?php
        if(isset($mensagem)){
            echo $mensagem . "<br><br>";
        }
    ?>

    <?php if($categoria) { ?>
            Nome: <?php echo $categoria['nome'] ?>
            <br>
    <?php
    } else{
    ?>
        Categoria não cadastrado.
    <?php
    }
    ?>


    <br><br>
    <a href="index.php?rota=categorias&op=listar">Listar Pratos</a>
</body>
</html>