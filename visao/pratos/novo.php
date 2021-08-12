<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Novo prato:
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
        Categoria:
        <br>
        <select name="categoria">
        <?php
            foreach($categorias as $categoria){
                ?>
                <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nome'] ?></option>
                <?php
            }
        ?>
        </select>
        <br><br>
        <input type="submit" value="Adicionar" />
    </form>

    <br><br>
    <a href="index.php?rota=pratos&op=listar">Listar Pratos</a>
</body>
</html>