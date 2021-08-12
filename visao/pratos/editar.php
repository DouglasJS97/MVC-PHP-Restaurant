<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Editar prato:
    <br> <br>

    <?php
        if(isset($mensagem)){
            echo $mensagem . "<br><br>";
        }
    ?>

    <?php if($prato) { ?>
        <form action="" method="POST">
            Nome:
            <br>
            <input type="hidden" name="id" value="<?php echo $prato['id'] ?>" />
            <input type="text" name="nome" value="<?php echo $prato['nome'] ?>" />
            <br><br>
            Categoria:
            <br>
            <select name="categoria">
            <?php
                foreach($categorias as $categoria){
                    ?>
                    <option value="<?php echo $categoria['id'] ?>" <?php echo ($categoria['id'] == $prato['categoria_id']) ? "selected" : "" ?> ><?php echo $categoria['nome'] ?></option>
                    <?php
                }

                //exemplo
                /*
                if($categoria['id'] == $prato['categoria_id']){
                    echo "selected";
                }else{
                    echo "";
                }
            
                echo ($categoria['id'] == $prato['categoria_id']) ? "selected" : ""
                */

            ?>
            </select>
            <br><br>
            <input type="submit" value="Editar" />
        </form>
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