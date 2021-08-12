<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php if($this->logado) { ?>
        Olá <?php echo $_SESSION['nome'] ?>, bem vindo ao sistema do restaurante!
    <?php } else { ?>
        Bem-vindo ao sistema do restaurante!
    <?php } ?>
    <br>

    <?php if($this->logado) { ?>
        <a href="index.php?rota=categorias&op=listar">Listar Categorias</a>
        <br>
        <a href="index.php?rota=pratos&op=listar">Listar Pratos</a>
        <br>
        <a href="index.php?rota=usuarios&op=listar">Listar Usuários</a>
        <br>
        <a href="index.php?rota=logout">Logout</a>
    <?php } else { ?>
        <a href="index.php?rota=login">Login</a>
    <?php } ?>

</body>
</html>