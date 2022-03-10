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
        <?php
        //caso esteja logado e seja operador...
          if( !empty($_SESSION['Login']) && $_SESSION['Perfil']=="Operador" ){ 
        ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cadastrar
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../cadastrar/usuario.blade.php">Cliente</a>
            <a class="dropdown-item" href="../cadastrar/categoria.blade.php">Categoria</a>
          </div>
        </li>

        <?php
          }
        ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Relatório
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../visualizar/usuario.blade.php">Cliente</a>
              <a class="dropdown-item" href="../visualizar/categoria.blade.php">Categoria</a>
            </div>
          </li>
      </ul>
      <div class="row justify-content-md-right">
        <?php
          if( !empty($_SESSION['Login']) ){ //caso esteja logado...
        ?>

        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['Login']; ?>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="../sessao/sair.php" type="button">Deslogar</a>
          </div>
        </div>
        
        <?php
          }else{
        ?>

        <a class="col-1 navbar-text" href="../sessao/login.blade.php">Login</a>

        <?php
          }
        ?>
      </div>
  </nav>
