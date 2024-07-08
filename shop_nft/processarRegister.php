<?php require_once 'conexao.php'; ?>
<?php require_once 'Registrar.php'; ?>
<?php require_once 'bancoRegister.php'; ?>
<?php 

$regis = new Registrar();

$regis->nome = $_POST['nome'];
$regis->email = $_POST['email'];
$regis->senha = $_POST['senha'];
$regis->csenha = $_POST['csenha'];

if ($regis->senha !== $regis->csenha) {
    echo "A senha e a confirmação de senha não coincidem. Por favor, tente novamente.";
    exit(); 
}

if (emailExiste($regis->email, $connect)) {
    echo "Este email já está em uso. Por favor, escolha outro.";
    exit(); // Sair do script se o email já estiver em uso
}

if(insereRegistro($regis, $connect)){
    echo "Cadastrado com sucesso<br>";
    header("Location: registerDados.php");
    exit();
}else{
    $erro = mysqli_error($connect);
    echo $erro;
}

?>