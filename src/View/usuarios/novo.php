<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Novo Usuário:
    <br> <br>

    <?php
        if(isset($mensagem)){
            echo $mensagem . "<br><br>";
        }
    ?>

    <form action="" method="POST">
        Nome:
        <br>
        <input type="text" name="nome" required/>
        <br>
        E-mail:
        <br>
        <input type="email" name="email" required/>
        <br>
        Senha:
        <br>
        <input type="password" name="senha" />
        <br><br>
        <input type="submit" value="Adicionar" />
    </form>

    <br><br>
    <a href="index.php?rota=usuarios&op=listar">Listar usuarios</a>
</body>
</html>