<?php 
    session_start();
    require '../db/conexao.php';

    if (!isset($_GET['id']) || !isset($_POST)) {
        header('Location: index.php');
    }

    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $hectares = $_POST['hectares'];
    $cultura = $_POST['cultura'];

    $conexao->query("UPDATE lavouras SET nome = '$nome', hectares = '$hectares', cultura = '$cultura' WHERE id = $id");
    header('Location: listar_lavoura.php');


?>