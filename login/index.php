<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <link rel="stylesheet" href="./login.css">
    
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
 <!-- BootStrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
<body>
    <div class="container">
        <div class="row">
            <div class="box">
                <form action='login.php' method="POST" class="col s12">
                    <div class="row">
                        <h4 class="mt-5 mb-4 text-center">BEM VINDO</h1>
                        <div class="input-field col s12">
                                <?php 
                                    if(isset($_SESSION['nao_autenticado'])):
                                ?>
                                <div class="alert-danger">
                                    <p>ERRO: Usuário ou senha inválidos.</p>
                                </div>
                                <?php 
                                    endif;
                                    unset($_SESSION['nao_autenticado']);
                                 ?>
                                <div class="input-group  mb-3">
                                    <i class="bi bi-person-badge" style="font-size: 1.5rem;"></i>
                                    <input type="text" class="form-control" placeholder="Usuário" aria-label="Username" aria-describedby="basic-addon1" name='usuario' id="nome">
                                </div>
                                <div class="row">
                                    <div class="input-group mt-3">
                                        <i class="bi bi-file-lock text-center" style="font-size: 1.5rem;"></i>
                                        <input type="password" class="form-control" placeholder="Senha" name="senha" id='password'>
                                    </div>
                            </div>
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <button class="btn btn-outline-dark mt-5" type="submit" name="action">Login <i class="bi bi-box-arrow-in-right" style="font-size: 1rem;"></i></button>
                                <a class="btn btn-outline-dark mt-5" href="../register/cadastro.php">Registrar<i class="bi bi-box-arrow-in-right" style="font-size: 1rem;"></i></a>
                            </div>
                            </form>
                        </div>
                    </div>
                </form>
                <div class="div1"></div>
                <div class="div2"></div>
            </div>   
        </div>


<script>


</script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>

