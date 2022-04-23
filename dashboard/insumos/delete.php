<?php 
    session_start();
    require '../../db/conexao.php';
    $id = $_GET['id'];
    
    $conexao->query("DELETE FROM insumos WHERE id = $id");
    header('Location: ./listar_insumos.php');
?>