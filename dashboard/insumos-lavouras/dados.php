<?php 
    session_start();
    include "../../db/conexao.php";


    $nome = $_POST['nome'];
    $unidade = $_POST['unidade'];
    $multiplo = $_POST['multiplo'];
    $valor = $_POST['valor'];

    $result  = mysqli_query($conexao, "INSERT INTO insumos (nome, unidade, valor, multiplo) values('$nome', '$unidade', '$valor', '$multiplo')");
    if ($result) {
        header('Location: ./listar_insumos.php');
    } else {
        echo "Erro ao cadastrar o insumo";
    }
   
?>