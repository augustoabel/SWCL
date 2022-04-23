<?php 
    session_start();
    require "../db/conexao.php";
    require "../templates/header.php";
?>

<div class="container">

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nº</th>
      <th scope="col">Nome</th>
      <th scope="col">Hectare</th>
      <th scope="col">Cultura</th>
      <th scope="col">Ações</th>
      <th><a class=" btn btn-outline-dark" href="./cad_lavoura.php" role="button">Cadastrar Lavoura</a></th>
    </tr>
  </thead>
  <tbody>
    <?php 

    $resultados = $conexao->query("SELECT * FROM lavouras WHERE id_usuario = {$_SESSION['usuario_id']}");
    while ($row = $resultados->fetch_assoc()):   

    ?>

    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['nome']?></td>
      <td><?php echo $row['hectares']?></td>
      <td><?php echo $row['cultura']?></td>
      <td>
        <a class="btn btn-primary" href="editar_lavoura.php?id=<?php echo $row['id']?>">Editar</a>
        <a class="btn btn-warning" href="./insumos-lavouras/insumos_lavouras.php?id_lavoura=<?php echo $row['id']?>">Insumos</a>
        <a class="btn btn-success" href="./relatorios/relatorios.php?id_lavoura=<?php echo $row['id']?>">Relatorios</a>
        <button class="btn btn-danger" onclick="deletar(<?php echo $row['id']?>)">Excluir</button>
      </td>
    </tr>
      <?php endwhile; ?>
  </tbody>
</table>


</div>

<script> 
    function deletar(id) {
        if (window.confirm('Deseja excluir a lavoura?')) {
          window.location.assign('./delete.php?id=' + id)
      }
    }
</script>

<?php require "../templates/footer.php" ?>