<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

#menu {
    height: 100vh;
    grid-area: menu;
}

#conteudo {
    grid-area: conteudo;
}

body {
    display: grid;
    grid-template: 'menu conteudo' / 290px 1fr;
}

.cor1 {
    background-color: #04d361;
  }
  .cor2 {
    background-color: #8257e6;
  }
  .cor3 {
    background-color: #121214;
  }
  .redondo {
    border-radius: 0px 55px 55px 0px;
  }

  @media print {
    body * {
      visibility: hidden;
    }

    .section-to-print, .section-to-print * {
      visibility: visible;
    }

    .section-to-print {
      position: absolute;
      left: 0;
      top: 0;
    }

    @page { size: landscape; }
    #tabela_relatorio_final {
      width: 100vw;
    }
    #btn_rlf {
      visibility: hidden;
    }
  }
  
    </style>
</head>
<body>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sticky-top" id="menu">
    <a href="/tcc/dashboard/index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <i class="bi bi-person-badge fs-4"></i>
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
       <span class="fs-6">Bem vindo no SWCL <?php echo $_SESSION['nome'];?>!</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/tcc/dashboard/listar_lavoura.php" class="nav-link text-white" aria-current="page">
        <i class="bi bi-columns-gap"></i>
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Lavouras
        </a>
      </li>
      <li>
        <a href="/tcc/dashboard/insumos/listar_insumos.php"class="nav-link text-white">
          <i class="bi bi-menu-button-wide-fill"></i>
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Insumos
        </a>
      </li>
      <li>
        <a href='/tcc/login/logout.php' class="nav-link link-light">
            <i class="bi bi-box-arrow-left"></i>
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Sair
        </a>
      </li>
    </ul>
  </div>
    <div id="conteudo" class="section-to-print">