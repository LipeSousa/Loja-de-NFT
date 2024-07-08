<?php require_once('Registrar.php'); ?>
<?php  

function emailExiste($email, $connect) {
    $query = "SELECT COUNT(*) FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    return $row[0] > 0;
}


function insereRegistro($regis, $connect){
    $senhaCriptografada = password_hash($regis->senha, PASSWORD_DEFAULT);
    $regis->senha = $senhaCriptografada;

    $sql = "INSERT INTO `users` (name, email, password) VALUES ('$regis->nome', '$regis->email','$senhaCriptografada')";

    $resultado = mysqli_query($connect,$sql);
    return $resultado;
}

?>