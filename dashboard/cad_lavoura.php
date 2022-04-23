<?php 
    session_start();
    require "../db/conexao.php";
    require "../templates/header.php";
?>

<title>Cadastrar Lavouras</title>
<div class="container">
<h2 class="font-weight-bold mb-5">Cadastro de Lavouras</h2>
<form action='dados.php' method="POST" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Nome da Lavoura</label>
    <input type="text" class="form-control" id="nomeLavoura" name="lavoura">
  </div>
  <div class="col-md-6">
    <label class="form-label">Quantas Hectares possui a lavoura?</label>
    <input type="number" class="form-control" placeholder="Ex: 100" id="hectares" name="hectares">
  </div>
  <div class="col-6">
    <label class="form-label">Qual cultura vai ser cultivada na lavoura?</label>
    <input type="text" class="form-control" id="cultura" name="cultura" >
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Salvar</button>
  </div>
</form>
</div>

<?php require "../templates/footer.php" ?>

