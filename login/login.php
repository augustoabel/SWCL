<?php 
    session_start();
    include "../db/conexao.php";

    if(empty($_POST['usuario']) || empty($_POST['senha'])) {
        header('Location: index.php');
        exit();
    }

    // PROTETOR CONTRA ATAQUE MYSQL INJECTION
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query = "select usuario, nome, usuario_id from usuario where usuario like '$usuario' and senha like md5('$senha')";
    $found = mysqli_query($conexao, $query);
    $row = $found->num_rows;
     

    if ($row == 1) {
        $usuario = $found->fetch_object();
        $_SESSION['usuario']= $usuario->usuario;
        $_SESSION['nome'] = $usuario->nome;
        $_SESSION['usuario_id'] = $usuario->usuario_id;
        header('Location: ../dashboard/index.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] =  true;
        header('Location: ./index.php');
        exit();
    }
 
    

?>