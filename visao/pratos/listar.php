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

    <a href="index.php?rota=pratos&op=novo">
        Novo prato 
    </a>

    <br><br>

    Pratos cadastrados: 
    <br><br>

    <?php
        if($pratos){
            ?>
            <table>
            <?php
            foreach($pratos as $prato){
                ?>
                <tr>
                    <td><a href="index.php?rota=pratos&op=exibir&id=<?php echo $prato['id'] ?>">
                        <?php echo $prato['id'] . " - " . $prato['nome']; ?> 
                    </a></td>
                    <td><a href="index.php?rota=pratos&op=editar&id=<?php echo $prato['id'] ?>">editar</a></td>
                    <td><a href="index.php?rota=pratos&op=deletar&id=<?php echo $prato['id'] ?>">excluir</a></td>
                </tr>
                <?php
            }
            ?>
            </table>
            <?php
        }else{
            ?>
                Nenhum prato cadastrado.
            <?php
        }
    ?>
</body>
</html>