<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

</body>
</html>