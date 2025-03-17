<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Usuário:
    <br> <br>

    <?php
        if(isset($mensagem)){
            echo $mensagem . "<br><br>";
        }
    ?>

    <?php if($usuario) { ?>
        Nome: <?php echo $usuario['nome'] ?>
            <br>
            E-mail: <?php echo $usuario['email'] ?>
            <br>
    <?php
    } else{
    ?>
        Usuário não cadastrado.
    <?php
    }
    ?>


    <br><br>
    <a href="index.php?rota=usuarios&op=listar">Listar usuarios</a>
</body>
</html>