<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .message-box {
            background-color: transparent;
            backdrop-filter: blur(20px);
            border: 1px solid white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-icon {
            font-size: 64px;
            color: #28a745;
        }

        .message {
            font-size: 20px;
            margin-top: 10px;
            color: #ffffff;
        }

        .close-btn {
            background-color: #28a745;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .close-btn:hover {
            background-color: #218838;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body background="img/background-01.png">
    <div class="message-box">
        <div class="success-icon">&#10003;</div>
        <div class="message">Pedido registrado com sucesso!</div>
        <button class="close-btn"><a href="home.php">Voltar</a></button>
    </div>
</body>

</html>