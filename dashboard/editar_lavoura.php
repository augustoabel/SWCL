<?php 
    session_start();
    require '../db/conexao.php';
    require "../templates/header.php";


    if (!isset($_GET['id'])) {
        header ("Location: index.php");
    }

    $id = $_GET['id'];
    $resultados = $conexao->query("SELECT * FROM lavouras where id = $id");
    $row = $resultados->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <!-- BootStrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Lavouras</title>
</head>

<body> 
<div class="container">
<h2 class="font-weight-bold mb-5">Editar Lavouras</h2>
<form action='update.php?id=<?php echo $id ?>' method="POST" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Nome da Lavoura</label>
    <input type="text" class="form-control" id="nomeLavoura" name="nome" value="<?php echo $row['nome']?>">
  </div>
  <div class="col-md-6">
    <label class="form-label">Quantas Hectares possui a lavoura?</label>
    <input type="number" class="form-control" placeholder="Ex: 100" id="hectares" name="hectares" value="<?php echo $row['hectares']?>">
  </div>
  <div class="col-6">
    <label class="form-label">Qual cultura vai ser cultivada na lavoura?</label>
    <input type="text" class="form-control" id="cultura" name="cultura"value="<?php echo $row['cultura']?>" >
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Salvar</button>
  </div>
</form>
</div>



<?php require "../templates/footer.php" ?>