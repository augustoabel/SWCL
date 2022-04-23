<?php 
    session_start();
    require '../db/conexao.php';
    $id = $_GET['id'];
    
    $conexao->query("DELETE FROM lavouras WHERE id = $id");
    header('Location: ../dashboard/listar_lavoura.php');
?>