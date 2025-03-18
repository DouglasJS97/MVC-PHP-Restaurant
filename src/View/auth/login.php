<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Restaurante</title>
</head>
<body>
    Entrar no sistema do restaurante!
    <br> <br>

    <?php
        if(isset($mensagem)){
            echo $mensagem . "<br><br>";
        }
    ?>

   <form action="" method="POST">
       E-mail <br>
       <input type="email" name="email" required />
       <br><br>
       Senha: <br>
       <input type="password" name="senha" required />
       <br><br>
       <input type="submit" value="Entrar" />
    </form>

    <div>
        <p>Ainda não tem uma conta? <a href="index.php?rota=usuarios&op=novo">Cadastre-se</a></p>
    </div>
</body>
</html>