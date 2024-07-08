<?php require_once 'conexao.php'; ?>
<?php 

session_start();

$deletar = $_GET['deletar'];

if(deletarUser($connect, $deletar)){
    header("location: register.php");
} else {
    $erro=mysqli_error($connect);
    echo $erro;
    echo "Você pode está tentando deletar uma conta que não e sua, ou errou seu id!";
}

function deletarUser($connect, $deletar) {
    // Verifica se o usuário está tentando excluir sua própria entrada
    $sql_check = "SELECT id FROM `users` WHERE id = $deletar AND id = {$_SESSION['id']}";
    $resultado_check = mysqli_query($connect, $sql_check);
    $row_check = mysqli_fetch_assoc($resultado_check);

    if (!$row_check) {
        // Se o usuário não tem permissão para excluir esta entrada, retorna false
        return false;
    }

    // Inicia uma transação
    mysqli_begin_transaction($connect);

    // Query para deletar da tabela user-info
    $sql_user_info = "DELETE FROM `user-info` WHERE id = $deletar";
    $resultado_user_info = mysqli_query($connect, $sql_user_info);

    // Query para deletar da tabela users
    $sql_users = "DELETE FROM `users` WHERE id = $deletar";
    $resultado_users = mysqli_query($connect, $sql_users);

    // Verifica se ambas as operações foram bem-sucedidas
    if ($resultado_users && $resultado_user_info) {
        // Confirma a transação
        mysqli_commit($connect);
        return true;
    } else {
        // Desfaz a transação em caso de falha
        mysqli_rollback($connect);
        return false;
    }
}
?>

?>