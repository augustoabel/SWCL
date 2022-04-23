<?php 
    session_start();
    require "../../db/conexao.php";
    require "../../templates/header.php";
?>

<title>Relatórios</title>

<?php 
if (!isset($_GET['id_lavoura'])) {
  header("Location: ../index.php");
}

$id_lavoura = $_GET['id_lavoura'];
$resultados = $conexao->query("SELECT * FROM lavouras where id = $id_lavoura");
$lavoura = $resultados->fetch_assoc();
?>
<style>
  .div1 {
    height: 2px;
    width: 100%;
    background-color: black;
  }
</style>
<div class="container">
<h1 class="font-weight-bold text-center mb-5">Relatórios</h1>
<div class="div1 mb-5"></div>
<h2 class="font-weight-bold">Lavoura: <?php echo $lavoura['nome']?></h2>
<h3 class="font-weight-bold mt-3">Hectares: <?php echo $lavoura['hectares']?></h2>

    <form action='./relatorio_final.php' method="POST" class="row g-3 mt-5">
      <div class="col-md-6 ">
        <label class="form-label">Qual a estimativa de produção de <?php echo $lavoura['cultura']?> por hectares nessa lavoura?</label>
        <input type="number" class="form-control" id="producao" name="producao">
      </div>
      <div class="col-md-6">
        <label class="form-label">Qual a cotação do <?php echo $lavoura['cultura']?></label>
        <input type="number" class="form-control" id="cotacao" name="cotacao">
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit" name="id_lavoura" value="<?php echo $id_lavoura; ?>">Continuar</button>
      </div>
    </form>
  <div class="div1 mt-5"></div>
</div>

<?php require "../../templates/footer.php" ?>
