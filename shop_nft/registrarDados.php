<?php require_once 'conexao.php'; ?>
<?php 

$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$genero = $_POST['genero'];

$id_usuario = mysqli_insert_id($connect);

$sql = "INSERT INTO `user-info` (telefone, cpf, dataNasc, genero) VALUES ('$telefone', '$cpf', '$data','$genero')";
$resultado = mysqli_query($connect, $sql);

if ($resultado) {
    echo "Dados adicionais registrados com sucesso!";
    header("Location: login.php");
} else {
    $erro = mysqli_error($connect);
    echo "Erro ao registrar dados adicionais: $erro";
}
?>