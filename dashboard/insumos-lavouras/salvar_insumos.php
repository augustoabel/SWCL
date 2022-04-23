<?php 
    session_start();
    include "../../db/conexao.php";


    $id_lavoura = $_POST['id_lavoura'];
    $conexao->query("DELETE FROM insumos_lavouras WHERE id_lavoura = $id_lavoura");
    
    $resultados = $conexao->query("SELECT * FROM insumos");

    while ($row = $resultados->fetch_assoc()) {
         
        $id_insumo = $row['id'];
        $qnt = $_POST['qnt_'.$id_insumo];
        $result  = mysqli_query($conexao, "INSERT INTO insumos_lavouras (id_lavoura, id_insumo, qnt) values('$id_lavoura', '$id_insumo', '$qnt')");
    }
    
    header("location: insumos_lavouras.php?id_lavoura=" . $id_lavoura);
   
   
?>