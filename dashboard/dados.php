<?php 
    session_start();
    include "../db/conexao.php";


    $lavoura = $_POST['lavoura'];
    $hectares = $_POST['hectares'];
    $cultura = $_POST['cultura'];

    $result  = mysqli_query($conexao, "INSERT INTO lavouras (nome, hectares, cultura, id_usuario) values('$lavoura', '$hectares', '$cultura', {$_SESSION['usuario_id']})");
    if ($result) {
        header('Location: ./listar_lavoura.php');
    } else {
        echo "Erro ao cadastrar lavoura";
    }
   
   
?>