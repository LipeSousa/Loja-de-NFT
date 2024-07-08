<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre-se</title>
    <link rel="stylesheet" href="css/style.scss">
</head>
<body background="img/background-01.png">
    <div class="form-box">
    <div class="welcome">
        <center>
        <h2>Registre-se<h2>
        <img src="img/user-100.png">
        </center>
    </div>
    <form action="processarRegister.php" method="POST">
        <input placeholder="Nome" type="text" class="box" name="nome" required>

        <input placeholder="E-mail" type="text" class="box" name="email" required>

        <input placeholder="Senha" type="password" class="box" name="senha" required>

        <input placeholder="Confirma Senha" type="password" class="box" name="csenha" required>

        <input type="submit" value="Registre-se!" class="btn"><br><br>

        <a href="register.php">Sign Up</a><a href="login.php" class="lg-rg">Login</a>
    </form>
    </div>
</body>
</html>