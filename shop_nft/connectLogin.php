<?php

$usuario = 'root';
$senha = '';
$database = 'shop_db';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM users WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if($sql_query->num_rows == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(password_verify($senha, $usuario['password'])) {
                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['name'] = $usuario['name'];
                $_SESSION['email'] = $usuario['email'];

                // Agora, vamos buscar os dados adicionais do usuário na outra tabela
                $sql_dados_adicionais = "SELECT telefone, cpf, dataNasc, genero FROM `user-info` WHERE id = " . $usuario['id'];
                $sql_query_dados = $mysqli->query($sql_dados_adicionais) or die("Falha na execução do código SQL: " . $mysqli->error);

                if($sql_query_dados->num_rows == 1) {
                    $dados_adicionais = $sql_query_dados->fetch_assoc();

                    // Armazenar os dados adicionais na sessão
                    $_SESSION['telefone'] = $dados_adicionais['telefone'];
                    $_SESSION['cpf'] = $dados_adicionais['cpf'];
                    $_SESSION['dataNasc'] = $dados_adicionais['dataNasc'];
                    $_SESSION['genero'] = $dados_adicionais['genero'];
                }

                header("Location: home.php");
                exit();
            } 
        }

        echo '<span style="color: #fff">Falha ao logar! E-mail ou senha incorretos!</span>';
    }

}

?>