<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Editar Usuário:
    <br> <br>

    <?php
        if(isset($mensagem)){
            echo $mensagem . "<br><br>";
        }
    ?>

    <?php if($usuario) { ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['id'] ?>" />

            Nome:
            <br>
            <input type="text" name="nome" value="<?php echo $usuario['nome'] ?>" required />
            <br>
            E-mail:
            <br>
            <input type="email" name="email" value="<?php echo $usuario['email'] ?>"required/>
            <br>
            Senha:
            <br>
            <input type="password" name="senha" />
            <br><br>
            <input type="submit" value="Editar" />
        </form>
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