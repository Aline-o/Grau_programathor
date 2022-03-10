<?php
session_start();
?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="../home/inicio.blade.php">CRM<span class="navbar-text">Clients</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cadastrar
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Cliente</a>
            <a class="dropdown-item" href="../cadastrar/categoria.blade.php">Categoria</a>
          </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Relatório
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Cliente</a>
              <a class="dropdown-item" href="../visualizar/categoria.blade.php">Categoria</a>
            </div>
          </li>
      </ul>
      <div class="">
        <?php
          if( !empty($_SESSION['Login']) ){ //caso esteja logado...
        ?>

        <a class="navbar-text" href="#"><?php echo $_SESSION['Login']; ?></a>
        
        <?php
          }else{
        ?>

        <a class="navbar-text" href="../sessao/login.blade.php">Login</a>

        <?php
          }
        ?>
      </div>
  </nav>
