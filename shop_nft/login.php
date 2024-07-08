<?php require_once 'connectLogin.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.scss">
</head>
<body background="img/background-01.png">
    <div class="form-box">
    <div class="welcome">
        <center>
        <h2>Faça Login<h2>
        <img src="img/user-100.png">
        </center>
    </div>
    <form method="POST" class="login">
        <input placeholder="E-mail" type="text" class="box" name="email" required>

        <input placeholder="Senha" type="password" class="box" name="senha" required>

        <input type="submit" name="submit" value="Login!" class="btn"><br><br>

        <a href="register.php" class="lg-rg">Sign Up</a><a href="login.php">Login</a>
    </form>
    </div>            
</body>
</html>