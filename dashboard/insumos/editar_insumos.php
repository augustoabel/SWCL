<?php 
    session_start();
    require '../../db/conexao.php';
    require "../../templates/header.php";

    if (!isset($_GET['id'])) {
        header ("Location: ../index.php");
    }

    $id = $_GET['id'];
    $resultados = $conexao->query("SELECT * FROM insumos where id = $id");
    $row = $resultados->fetch_assoc();

?>

    <title>Editar Insumos</title>

<div class="container">
<h2 class="font-weight-bold mb-5">Editar Insumos</h2>
<form action='update.php?id=<?php echo $id ?>' method="POST" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Nome do insumo</label>
    <input type="text" class="form-control" id="nomeLavoura" name="nome" value="<?php echo $row['nome']?>">
  </div>
  <div class="col-md-6">
    <label class="form-label">Qual a unidade do insumo?</label>
    <input type="text" class="form-control" placeholder="" id="unidade" name="unidade" value="<?php echo $row['unidade']?>">
  </div>
  <div class="col-6">
    <label class="form-label">Qual o valor do insumo</label>
    <input type="text" class="form-control" id="valor" name="valor"value="<?php echo $row['valor']?>" >
  </div>
  <div class="col-6">
    <label class="form-label">Qual o múltiplo do insumo</label>
    <input type="text" class="form-control" id="multiplo" name="multiplo"value="<?php echo $row['multiplo']?>" >
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Salvar</button>
  </div>
</form>
</div>


<?php require "../../templates/footer.php" ?>