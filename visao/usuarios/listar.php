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

    <a href="index.php?rota=usuarios&op=novo">
        Novo usuário 
    </a>

    <br><br>

    Usuários cadastrados: 
    <br><br>

    <?php
        if($usuarios){
            ?>
            <table>
            <?php
            foreach($usuarios as $usuario){
                ?>
                <tr>
                    <td><a href="index.php?rota=usuarios&op=exibir&id=<?php echo $usuario['id'] ?>">
                        <?php echo $usuario['id'] . " - " . $usuario['nome']; ?> 
                    </a></td>
                    <td><a href="index.php?rota=usuarios&op=editar&id=<?php echo $usuario['id'] ?>">editar</a></td>
                    <td><a href="index.php?rota=usuarios&op=deletar&id=<?php echo $usuario['id'] ?>">excluir</a></td>
                </tr>
                <?php
            }
            ?>
            </table>
            <?php
        }else{
            ?>
                Nenhum usuário cadastrado.
            <?php
        }
    ?>
</body>
</html>