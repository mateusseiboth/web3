<?php
$_SESSION['tema'] == 'white' ? $tema = "text-black bg-white" : $tema = 'text-white bg-dark';
$_SESSION['tema'] == 'white' ? $img = "url('../img/light-theme.jpg')" : $img = "url('../img/dark-theme.jpg')";      
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>Carrinhos maravilhosos v0.3</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    body {
      min-height: 75rem;
      padding-top: 4.5rem;
      background-image: <?php echo $img ?>;
    }

    #border-main {
      border-radius: 10px;
    }
    
    .border-primary {
      border-radius: 20px;
    }
  </style>
</head>

<!-- Definindo a classe do corpo com base no tema selecionado -->
<body class="<?php echo $tema ?>">

  <!-- Barra de navegação fixa na parte superior com fundo azul -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">

    <!-- Container principal -->
    <div class="container-fluid">
      <!-- Link da marca "CutuCar" que redireciona para a página inicial -->
      <a class="navbar-brand" href="<?php echo APP . 'index/index' ?>">CutuCar</a>

      <!-- Botão para o menu responsivo -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- Itens do menu -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <!-- Link para listar vagas -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo APP . 'vagas/listar' ?>">Vagas</a>
          </li>
          <!-- Link para listar tickets -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo APP . 'ticket/listar' ?>">Tickets</a>
          </li>
          <!-- Link para o painel do administrador -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo APP . 'admin/listar' ?>">Painel admin</a>
          </li>
          <!-- Link para listar carros -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo APP . 'carro/listar' ?>">Carros</a>
          </li>
          <!-- Link para listar clientes -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo APP . 'cliente/listar' ?>">Clientes</a>
        </ul>

        <!-- Itens do menu à direita -->
        <ul class="navbar-nav ms-auto">
          <!-- Link para alternar entre temas claro e escuro -->
          <li class="nav-item">
            <a class="nav-link active" href='<?php $pathTrocar = APP . "index/trocar/";
            echo "$pathTrocar" ?>'>
              <?php
              // Exibição do ícone do sol ou da lua dependendo do tema selecionado
              echo ($_SESSION['tema'] == 'black' ? "<i class='bi bi-brightness-high'></i>" : "<i class='bi bi-brightness-high-fill'></i>")
                ?>
            </a>
          </li>

          <!-- Link para deslogar caso usuário esteja logado -->
          <li class="nav-item">
            <?php
            $pathDeslogar = APP . 'login/deslogar';
            echo (isset($_SESSION['logado']) ? "<a class='nav-link active' href='$pathDeslogar'>Deslogar</a>" : "");
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container">
    <div class="p-5 border border-primary <?php echo $tema ?>" id="border-main">
      <?php
      require_once $arquivo;
      ?>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
</body>

</html>