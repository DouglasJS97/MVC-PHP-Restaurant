<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <a href="index.php"> Home </a>
    <br><br>

    <?php
        if(isset($mensagem)){
            echo $mensagem . "<br><br>";
        }
    ?>

    <a href="index.php?rota=categorias&op=novo">
        Nova categoria 
    </a>

    <br><br>

    Categorias cadastradas: 
    <br><br>

    <?php
        if($categorias){
            ?>
            <table>
            <?php
            foreach($categorias as $categoria){
                ?>
                <tr>
                    <td><a href="index.php?rota=categoria&op=exibir&id=<?php echo $categoria['id'] ?>">
                        <?php echo $categoria['id'] . " - " . $categoria['nome']; ?> 
                    </a></td>
                    <td><a href="index.php?rota=categorias&op=editar&id=<?php echo $categoria['id'] ?>">editar</a></td>
                    <td><a href="index.php?rota=categorias&op=deletar&id=<?php echo $categoria['id'] ?>">excluir</a></td>
                </tr>
                <?php
            }
            ?>
            </table>
            <?php
        }else{
            ?>
                Nenhuma categoria cadastrada.
            <?php
        }
    ?>
</body>
</html>