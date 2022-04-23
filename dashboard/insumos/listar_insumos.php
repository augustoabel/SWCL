<?php 
    session_start();
    require "../../db/conexao.php";
    require "../../templates/header.php";
?>
    <title>Listagem e Cadastro de Insumos</title>

    <style>
        .margin-esq {
            margin-left: 80%;
        }
    </style>


<body>
<div class="container">
<a class="margin-esq btn btn-outline-dark" href="./cad_insumos.php" role="button">Cadastrar insumos</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nº</th>
      <th scope="col">Nome</th>
      <th scope="col">Unidade</th>
      <th scope="col">Múltiplo</th>
      <th scope="col">Valor da embalagem</th>
      <th scope="col">Valor unitário</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php 

    $resultados = $conexao->query("SELECT * FROM insumos WHERE id_usuario = {$_SESSION['usuario_id']}");
    while ($row = $resultados->fetch_assoc()):   

    ?>

    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['nome']?></td>
      <td><?php echo $row['unidade']?></td>
      <td><?php echo $row['multiplo']?></td>
      <td><?php echo 'R$'; $numero = number_format($row['valor'],2,",","."); echo $numero?></td> 
      <td><?php echo 'R$'; $result = $row['valor']/$row['multiplo']; $numero = number_format($result,2,",","."); echo $numero?></td>
      <td>
        <a class="btn btn-primary" href="editar_insumos.php?id=<?php echo $row['id']?>">Editar</a>
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

<?php require "../../templates/footer.php" ?>
