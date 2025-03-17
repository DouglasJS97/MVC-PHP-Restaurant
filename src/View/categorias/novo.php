<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Nova categoria:
    <br> <br>

    <?php
        if(isset($mensagem)){
            echo $mensagem . "<br><br>";
        }
    ?>

    <form action="" method="POST">
        Nome:
        <br>
        <input type="text" name="nome" />
        <br><br>
        <input type="submit" value="Adicionar" />
    </form>

    <br><br>
    <a href="index.php?rota=categorias&op=listar">Listar Categorias</a>
</body>
</html>