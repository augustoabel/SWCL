<?php 
    session_start();
    require "../../db/conexao.php";
    require "../../templates/header.php";
?>

<body>
<div class="container">
<h1 class="text-center m-1">Insumos que será utilizado na lavoura</h1>
<?php 

    $custototal = 0;

    if (!isset($_GET['id_lavoura'])) {
      header("Location: ../index.php");
    }

    $id_lavoura = $_GET['id_lavoura'];
    $resultados = $conexao->query("SELECT * FROM lavouras where id = $id_lavoura");
    $lavoura = $resultados->fetch_assoc();

?>

  <h4>Lavoura: <?php echo $lavoura['nome'] ?></h4>
  <h5>Hectares: <?php echo $lavoura['hectares'] ?></h4>
  <h5>Cultura: <?php echo $lavoura['cultura'] ?></h4>

<form action="salvar_insumos.php" method="post">
<input type="hidden" id="id_lavoura" name="id_lavoura" value="<?php echo $id_lavoura?>">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Nº</th>
        <th scope="col">Descrição</th>
        <th scope="col">Valor Unitário</th>
        <th scope="col">Quantidade por hectares</th>
        <th scope="col">Custo do insumo</th>
      </tr>
    </thead>
    <tbody>
      <?php 

      $resultados = $conexao->query("SELECT * FROM insumos");
      while ($row = $resultados->fetch_assoc()):  
         
        $id_insumo = $row['id'];
        $resultados2 = $conexao->query("SELECT qnt FROM insumos_lavouras WHERE id_lavoura = $id_lavoura AND id_insumo = $id_insumo;");
        $q = $resultados2->fetch_assoc();

        if(empty($q)) {
          $qnt = 0;
        } else {
          $qnt = $q['qnt'];
        }
        
      ?>

      <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['nome']?></td>
        <td>R$<?php $numero = $row['valor'] / $row['multiplo']; echo $vlu = number_format($numero,2,",","."); ?></td>
        <td><input class="text-center" name="qnt_<?php echo $row['id']?>" value="<?php echo $qnt;?>"></input><?php echo " ", $row['unidade']?></td>
        <td>R$ <?php $custInusmo = $lavoura['hectares'] * $qnt * ($row['valor'] / $row['multiplo']); $numero = number_format($custInusmo,2,",","."); echo $numero?></td>
        <?php $custototal = $custototal + $lavoura['hectares'] * $qnt * ($row['valor'] / $row['multiplo']); ?>
      </tr>

      <?php endwhile; ?>
    </tbody>
  </table>
  <span class="btn btn-success mb-4" >Custo total: R$<?php $numero = number_format($custototal,2,",","."); echo $numero?></span>
  <br>
  <button type="submit" class='margin-esq btn btn-outline-dark'>Salvar</button>
</form> 

</div>

<script>
    function deletar(id) {
        if (window.confirm('Deseja excluir a lavoura?')) {
          window.location.assign('./delete.php?id=' + id)
      }
    }
</script>

<?php require "../../templates/footer.php" ?>
