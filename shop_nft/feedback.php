<?php require_once 'conexao.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se as variáveis foram enviadas pelo formulário
    if (isset($_POST['comentario']) && isset($_POST['id']) && isset($_POST['name'])) {
        $comentario = $_POST['comentario'];
        $id = $_POST['id'];
        $name = $_POST['name'];

        // Insere os dados no banco de dados
        $sql = "INSERT INTO `feedback` (idUsuario, nome, comentario) VALUES ('$id', '$name', '$comentario')";
        $resultado = mysqli_query($connect, $sql);

        // Verifica se a inserção foi bem-sucedida
        if ($resultado) {
            echo "Dados adicionais registrados com sucesso!";
        } else {
            $erro = mysqli_error($connect);
            echo "Erro ao registrar dados adicionais: $erro";
        }
    } else {
        echo "Erro: Algumas variáveis do formulário estão ausentes.";
    }
}
?>