<?php 
    session_start();
    include "../../db/conexao.php";


    $nome = $_POST['nome'];
    $unidade = $_POST['unidade'];
    $multiplo = $_POST['multiplo'];
    $valor = $_POST['valor'];

    $result  = mysqli_query($conexao, "INSERT INTO insumos (nome, unidade, valor, multiplo, id_usuario) values('$nome', '$unidade', '$valor', '$multiplo', {$_SESSION['usuario_id']})");
    if ($result) {
        header('Location: ./listar_insumos.php');
    } else {
        echo "Erro ao cadastrar lavoura";
    }
   
   
?>