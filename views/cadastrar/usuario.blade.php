<?php 
// CONEXÃO COM O BANCO
include_once('../../BD/config.php');

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
  extract($_REQUEST);
  if($Nome==""){
    // mensagem de campo obrigatorio
    header('location:'.$_SERVER['PHP_SELF'].'?msg=robr');
    exit;
  }if($Perfil==""){
    // mensagem de campo obrigatorio
    header('location:'.$_SERVER['PHP_SELF'].'?msg=robr');
    exit;
  }if($Login==""){
    // mensagem de campo obrigatorio
    header('location:'.$_SERVER['PHP_SELF'].'?msg=robr');
    exit;
  }if($Senha==""){
    // mensagem de campo obrigatorio
    header('location:'.$_SERVER['PHP_SELF'].'?msg=robr');
    exit;
  }else{
    // se pá pode apagar, não testei sem
    $userCount	=	$db->getQueryCount('usuario','idUsuario');
    // colunas da tabela
    $data	=	array(
      'Nome'=> $Nome, //colunas   
      'Perfil'=> $Perfil, //colunas   
      'Login'=> $Login, //colunas   
      'Senha'=> $Senha, //colunas                    
    );
    $insert	=	$db->insert('usuario',$data);
    if($insert){
      // mensagem add com sucesso
      header('location: ../visualizar/usuario.blade.php?msg=radd');
      exit;
    }else{
      // mensagem erro
      header('location: ../visualizar/usuario.blade.php?msg=rerr');
      exit;
    }
  }
}
?>

<!doctype html>
<html lang="pt-br">
  
  <?php include_once('../headers/head.blade.php'); ?>

  <body>
  
    <?php //include_once('../header.blade.php'); ?>

    <div class="container-fluid">
      <?php include_once('../headers/navbar.blade.php'); ?>

      

        <main class="col-12 col-md-12 col-xl-12 py-md-3 pl-md-1 bd-content" role="main">
          
          <div class="col align-self-center col-sm-10  offset-md-1">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastrar Usuário</li>
              </ol>
            </nav>
          </div>

              <!-- mensagens de alerta, ex: adicionado com sucesso, deletado com sucesso, etc -->
              <?php include_once('../../include/alertMsg.php');?>
              
              <form method="POST">
                <div class="row justify-content-md-center">
                  <div class="form-group col-sm-10">
                    <label class="font-weight-bold" for="Nome">Nome completo</label>
                    <input type="text" class="form-control" name="Nome" placeholder="Insira seu nome completo"required autofocus>
                  </div>
                  <div class="form-group col-sm-10">
                    <label class="font-weight-bold" for="Login">Login</label>
                    <input type="text" class="form-control" name="Login" placeholder="Insira seu login"required autofocus>
                  </div>
                  <div class="form-group col-sm-10">
                    <label class="font-weight-bold" for="Senha">Senha</label>
                    <input type="password" class="form-control" name="Senha" placeholder="Insira sua senha"required autofocus>
                  </div>

                  <div class="form-group col-sm-10">
                    <label for="Perfil">Perfil</label>
                    <select class="form-control" name="Perfil" id="Perfil" required>
                      <option selected disabled value="">Escolha uma opção...</option>
                      <option value="Visualizador"> Visualizador </option>
                      <option value="Operador"> Operador </option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4 offset-md-1">
                    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-success">Salvar Registro</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </main>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>