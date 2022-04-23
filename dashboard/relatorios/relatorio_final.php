<?php 
    session_start();
    require "../../db/conexao.php";
    require "../../templates/header.php";
    
    $custo_total = 0;


    if (!isset($_POST['id_lavoura']) || (empty($_POST['cotacao']) && $_POST['cotacao'] != 0) || (empty($_POST['producao']) && $_POST['producao'] != 0)) {
        header("Location: ../index.php");
        exit();
      }
      
        $producao = $_POST['producao'];
        $cotacao = $_POST['cotacao'];
        $id_lavoura = $_POST['id_lavoura'];
      
        $resultados = $conexao->query("SELECT * FROM insumos_lavouras where id_lavoura = $id_lavoura AND qnt > 0");

        $lavoura = $conexao->query("SELECT * FROM lavouras WHERE id = $id_lavoura");
                            
        $lavoura = $lavoura->fetch_object();
   
?>
    <div class="container" >

        <h1 class="font-weight-bold text-center mb-5">Relatório Final</h1>
        <div class="div1 mb-5"></div>
        <h3 class="font-weight text-center mb-5">
            Na lavoura <?php echo $lavoura->nome?> aonde possui <?php echo $lavoura->hectares?> hectares, a estimativa de produção foi <?php echo $producao?> sacos por hectare,
            totalizando <?php echo $producao * $lavoura->hectares?> sacos na área total. Com o preço do <?php echo $lavoura->cultura?> a <?php echo $cotacao?> reais, totaliza um faturamento de <?php $faturamento = $producao * $lavoura->hectares * $cotacao; 
            echo "R$ " . number_format($faturamento,2,",","."); ?> reais.
        </h3>

        <table class="table table-light table-striped" id="tabela_relatorio_final">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Insumos Utilizados</th>
                <th scope="col">Qnt por Hectare</th>
                <th scope="col">Valor unitário</th>
                <th scope="col">Quantidade Total</th>
                <th scope="col">Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($insumos = $resultados->fetch_object()):?>
                <tr>
                    <?php 
                    
                        $insumo = $conexao->query("SELECT * FROM insumos WHERE id = {$insumos->id_insumo}");
                    
                        $insumo = $insumo->fetch_object();
                    
                        $lavoura = $conexao->query("SELECT hectares FROM lavouras WHERE id = $id_lavoura");
                        
                        $lavoura = $lavoura->fetch_object();
                        
                    ?>
                <th scope="row"></th>
                    <td><?php echo $insumo->nome ?></td>
                    <td><?php echo $insumos->qnt ?></td>
                    <td><?php echo $insumo->valor/$insumo->multiplo?></td>
                    <td><?php echo $lavoura->hectares * $insumos->qnt?></td>
                    <td><?php $numero = $lavoura->hectares * $insumos->qnt * ($insumo->valor/$insumo->multiplo); $custo_total += $numero; $numero1 = number_format($numero,2,",","."); echo "R$ " .  $numero1?></td>
                </tr>
                <?php endwhile; ?>
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Custo Total</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <?php

                                     $custo_total1 = number_format($custo_total,2,",","."); 
                                     echo "R$ " . $custo_total1;

                                ?>
                            </td>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Faturamento Estimado</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <?php 
                                    $faturamento = $producao * $lavoura->hectares * $cotacao; 
                                    echo "R$ " . number_format($faturamento,2,",","."); 

                                ?>
                            </td>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Lucro Líquido</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            
                            <?php  
                                $lucro = $faturamento - $custo_total;
                                if($lucro < 0) $cor = 'danger';
                                elseif($lucro == 0) $cor = 'warning';
                                else $cor = 'success';
                            ?>

                            <td class="text-<?php echo $cor;?>">   
                                
                                <?php 
                                    echo "R$ " . number_format($lucro,2,",","."); 
                                ?>
                        </td>
                    </tr>
                </thead>
                
        </tbody>
        </table>
        <button id="btn_rlf" class="btn btn-primary">Clique para imprimir</button>
    </div>

    <script>

        document.getElementById('btn_rlf').onclick = function() {
                window.print();
                };

    </script>

<?php require "../../templates/footer.php" ?>