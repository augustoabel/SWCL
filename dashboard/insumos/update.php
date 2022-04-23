<?php 
    session_start();
    require '../../db/conexao.php';

    if (!isset($_GET['id']) || !isset($_POST)) {
        header('Location: ../index.php');
    }

    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $unidade = $_POST['unidade'];
    $valor = $_POST['valor'];
    $multiplo = $_POST['multiplo'];

    $conexao->query("UPDATE insumos SET nome = '$nome', unidade = '$unidade', valor = '$valor', multiplo = '$multiplo' WHERE id = $id");
    header('Location: listar_insumos.php');


?>