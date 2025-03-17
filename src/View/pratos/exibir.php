<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Prato:
    <br> <br>

    <?php
        if(isset($mensagem)){
            echo $mensagem . "<br><br>";
        }
    ?>

    <?php if($prato) { 
        ?>
            Nome: <?php echo $prato['nome'] ?> 
            <br>
            Categoria: <?php echo $prato['categoria_nome'] ?> 
    <?php
    } else{
    ?>
        Prato não cadastrado.
    <?php
    }
    ?>


    <br><br>
    <a href="index.php?rota=pratos&op=listar">Listar Pratos</a>
</body>
</html>