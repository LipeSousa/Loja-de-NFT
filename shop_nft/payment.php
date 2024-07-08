<?php require_once 'protect.php'; ?>
<?php
$nomeCompleto = $_SESSION['name'];
$partesNome = explode(' ', $nomeCompleto);
$primeiroNome = $partesNome[0];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <link rel="stylesheet" href="css/style.scss">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .main {
            border-radius: .5rem .5rem 0 0;
            min-height: 40vh;
        }

        main .page-title {
            padding: 10px;
            text-align: center;
            font-size: 1.5rem;
        }

        main input {
            background-color: transparent;
            border: none;
            font-weight: bold;
        }

        main input:focus {
            outline: none;
            border: none;
        }

        .orderContainer {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 90%;
            min-height: 20vh;
            left: 3.5%;
            border-radius: 0 0 .5rem .5rem;
            padding: 0 30px;
            background-color: #eee;
        }

        .orderContainer form {
            border: 1px solid black;
            width: 30%;
            padding: 20px;
            border-radius: .5rem;
            margin-bottom: 30px;
        }

        .orderContainer input {
            margin-top: 10px;
            width: 100%;
            background-color: transparent;
            border: none;
            border-bottom: 1px solid black;
        }

        .orderContainer input:focus {
            outline: none;
            border: none;
            border-bottom: 1px solid black;
        }

        .orderContainer button {
            margin-top: 10px;
            color: white;
            padding: 15px 0;
            background: green;
            display: block;
            width: 100%;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.05rem;
            cursor: pointer;
        }

        .orderContainer button:hover {
            background: rgb(63, 122, 63);
        }
    </style>
</head>

<body style="background-image: url(img/background.png); background-size: cover;">
    <?php require_once 'header.php'; ?>
    <br><br><br><br>
    <main class="main" id="main">
        <div class="page-title">Bem-Vindo a confirmação de compra <span
                style="font-weight: bold;"><?php echo $primeiroNome; ?></span></div>
        <div class="page-title">Resumo do Pedido</div>
        <div class="content">
            <section>
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody id="cartItemsBody"></tbody>
                </table>
            </section>
            <aside>
                <div class="box">
                    <div class="box-header">Total</div>
                    <div class="info">
                        <div><span>Total</span><span id="totalAmount">0.00 ETH</span></div>
                    </div>
                </div>
            </aside>
        </div>
    </main>
    <div class="orderContainer">
        <form id="orderForm" action="registrarPedido.php" method="POST">
            <div id="hiddenFields"></div>
            <div>
                <input type="text" id="name" name="name" placeholder="Nome" value="<?php echo $_SESSION['name']; ?>"
                    required>
            </div>
            <div>
                <input type="text" id="cpf" name="cpf" placeholder="CPF" value="<?php echo $_SESSION['cpf']; ?>"
                    required>
            </div>
            <div>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>"
                    placeholder="E-mail" required>
            </div>
            <button type="submit">Finalizar Pedido</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cartItems = JSON.parse(localStorage.getItem('cartItems'));
            const totalAmount = localStorage.getItem('totalAmount');
            const cartItemsBody = document.getElementById('cartItemsBody');
            const hiddenFields = document.getElementById('hiddenFields');

            cartItems.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><input type="text" name="title[]" value="${item.title}" readonly></td>
                    <td><input type="text" name="price[]" value="${item.price}" readonly></td>
                    <td><input type="text" name="quantity[]" value="${item.quantity}" readonly></td>
                `;
                cartItemsBody.appendChild(row);

                hiddenFields.innerHTML += `
                    <input type="hidden" name="items[${index}][title]" value="${item.title}">
                    <input type="hidden" name="items[${index}][price]" value="${item.price}">
                    <input type="hidden" name="items[${index}][quantity]" value="${item.quantity}">
                `;
            });

            hiddenFields.innerHTML += `<input type="hidden" name="totalAmount" value="${totalAmount}">`;
            document.getElementById('totalAmount').innerText = totalAmount;
        });
    </script>
</body>

</html>