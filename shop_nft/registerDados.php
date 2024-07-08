<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Adicionais</title>
    <link rel="stylesheet" href="css/style.scss">
</head>
<body background="img/background-01.png">
    <div class="form-box">
    <div class="welcome">
        <center>
        <h2>Dados Adicionais<h2>
        <img src="img/user-100.png">
        </center>
    </div>
    <form action="registrarDados.php" method="POST" class="dados">
        <input placeholder="Telefone: Ex: (61) 98203-5563" type="text" class="box" name="telefone" required>

        <input placeholder="CPF: Ex: 123.123.123-12" type="text" class="box" name="cpf" required>

        <input placeholder="Data de Nascimento" type="date" class="box" name="data" required>

        <select name="genero" id="genero" required>
         <option value="Masculino">Masculino</option>
         <option value="Feminino">Feminino</option>
         <option value="Outro">Outro</option>
        </select><br><br>

        <input type="submit" value="Faça Login" class="btn"><br><br>

        <a href="register.php">Sign Up</a><a href="login.php" class="lg-rg">Login</a>
    </form>
    </div>
</body>
</html>