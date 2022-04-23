<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="./style.css">
    <title>Cadastrar</title>
</head>
<body>
<div class="container">
<div class="row">
    <div class="box">
            <?php 
                if(isset($_SESSION['status_cadastro'])):
            ?>
            <div class="alert alert-success" role="alert">
                <p>Cadastro efetuado</p>
                <p>Faça <a href="../login/login.php">login</a></p>
            </div>
            <?php 
                endif; 
                unset($_SESSION['status_cadastro']);
            ?>
            <?php 
                if(isset($_SESSION['usuario_existe'])):
            ?>
            <div class="alert alert-warning" role="alert">
                <p>O usuário escolido já existe. Informe outro e tente novamente. </p>
            </div>
            <?php 
                endif;
                unset($_SESSION['usuario_existe']);
            ?>
            
        <form action="cadastrar.php" method="POST" class="col s12">
        <h4 class="mt-5 mb-5 text-center">Cadastro de usuário</h1>
        <div class="row mt-5">
            <div class="input-field col s6">
                <input class="form-control" placeholder="Nome" id="nome" name="nome" type="text" class="validate">
            </div>
            <div class="input-field col s6">
                <input id="usuario" placeholder="Usuário" class="form-control" name="usuario"type="text" class="validate">
            </div>
                </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="senha" placeholder="Senha" class="form-control mt-3" name="senha" type="password" class="validate">
                            <label for="password"></label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                        <a href="../login/index.php" class="btn btn-outline-dark">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>


<!-- JavaScript bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>