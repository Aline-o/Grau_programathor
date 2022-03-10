<!doctype html>
<html lang="pt-br">

<?php include_once('headers/head.blade.php'); ?>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">CRM<span class="navbar-text">Clients</span></a>
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
            <a class="dropdown-item" href="cadastrar/categoria.blade.php">Categoria</a>
          </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Relatório
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Cliente</a>
              <a class="dropdown-item" href="visualizar/categoria.blade.php">Categoria</a>
            </div>
          </li>
      </ul>
      <div class="">
        <a class="navbar-text" href="#">usuario</a>
      </div>
  </nav>


  <div class="container-fluid">
    <div class="row flex-xl-nowrap">
      <main class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-1 bd-content" role="main">      
        <div class="card text-white bg-primary mb-3" style="border-left: 6px solid #2196F3;">
          <div class="card-body">
            <h5 class="card-title">Bem-vindo!</h5>
            <p class="card-text">Este sistema tem como função cadastrar os clientes matriculados na academia Força de Vontade.</p>
          </div>
        </div>
      </main>
    </div>
  </div>    


</body>
</html>

  

  