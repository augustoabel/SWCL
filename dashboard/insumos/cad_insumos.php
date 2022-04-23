<?php 
    session_start();
    require '../../db/conexao.php';
    require "../../templates/header.php";

?>

    <title>Cadastro de Insumos</title>


<div class="container">
<h2 class="font-weight-bold mb-5">Cadastro de Insumos</h2>
<form action='dados.php' method="POST" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Nome do Insumo</label>
    <input type="text" class="form-control" id="nome" name="nome">
  </div>
  <div class="col-md-6">
    <label class="form-label">Qual a unidade do insumo?</label>
    <input type="text" class="form-control" placeholder="" id="unidade" name="unidade">
  </div>
  <div class="col-md-6">
    <label class="form-label">Qual o múltiplo da embalagem?</label>
    <input type="text" class="form-control" placeholder="" id="multiplo" name="multiplo">
  </div>
  <div class="col-6">
    <label class="form-label">Qual o valor da embalagem do insumo?</label>
    <input type="number" class="form-control" id="valor" name="valor" >
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Salvar</button>
  </div>
</form>
</div>



<?php require "../../templates/footer.php" ?>