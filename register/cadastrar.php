<?php 
    session_start();
    include "../db/conexao.php";
    // trim serve pra retirar o espaço no inicio e no final da string
    $nome = mysqli_real_escape_string($conexao, trim($_POST["nome"]));
    $usuario = mysqli_real_escape_string($conexao, trim($_POST["usuario"]));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST["senha"])));

    $sql = "select count(*) as total from usuario where usuario = '$usuario'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1) {
        $_SESSION['usuario_existe'] = true;
        header("Location: cadastro.php");
        exit;
    }
    // funcao NOW() é do mysql que retora data e hora
    $sql = "INSERT INTO usuario (nome, usuario, senha, data_cadastro) values ('$nome', '$usuario', '$senha', NOW())";

    if ($conexao->query($sql) === true) {
        $_SESSION['status_cadastro'] = true;
    }

    $conexao->close();

    header('Location: cadastro.php');
    exit;
?>