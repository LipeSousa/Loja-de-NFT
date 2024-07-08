<?php
session_start();
require_once 'protect.php';
require_once 'conexao.php'; // Inclua seu script de conexão ao banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['id'])) {
        echo "Erro: ID do usuário não encontrado na sessão.";
        exit;
    }

    $userId = $_SESSION['id'];
    $name = $_POST['name'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $totalAmount = $_POST['totalAmount'];
    $items = $_POST['items'];

    if ($connect->connect_error) {
        die("Conexão falhou: " . $connect->connect_error);
    }

    foreach ($items as $item) {
        $stmt = $connect->prepare("INSERT INTO pedidos (idUsuario, nome, cpf, email, item_title, item_price, item_quantity) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            echo "Erro ao preparar o statement: " . $connect->error;
            exit;
        }
        $stmt->bind_param("isssssi", $userId, $name, $cpf, $email, $item['title'], $item['price'], $item['quantity']);

        if (!$stmt->execute()) {
            echo "Erro ao registrar o pedido: " . $stmt->error;
            exit;
        }
    }

    header("Location: pedidoRegistrado.php");

    $stmt->close();
    $connect->close();
} else {
    echo "Método de requisição inválido.";
}
?>
