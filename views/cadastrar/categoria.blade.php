<?php 
// CONEXÃO COM O BANCO
include_once('../../BD/config.php');                    

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
  extract($_REQUEST);
  if($NomeCategoria==""){
    // mensagem de campo obrigatorio
    header('location:'.$_SERVER['PHP_SELF'].'?msg=robr');
    exit;
  }else{
    // se pá pode apagar, não testei sem
    $userCount	=	$db->getQueryCount('categoria','idCategoria');
    // colunas da tabela
    $data	=	array(
      'NomeCategoria'=> $NomeCategoria, //colunas                        
    );
    $insert	=	$db->insert('categoria',$data);
    if($insert){
      // mensagem add com sucesso
      header('location: ../visualizar/categoria.blade.php?msg=radd');
      exit;
    }else{
      // mensagem erro
      header('location: ../visualizar/categoria.blade.php?msg=rerr');
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
      <?php include_once('../headers/navbar.blade.php'); 
      
      //caso não esteja logado ou não seja operador...
      if( empty($_SESSION['Login']) || $_SESSION['Perfil']!="Operador" ){
        header("Location: ../sessao/accessdenied.blade.php");
        }
      ?>
            

        <main class="col-12 col-md-12 col-xl-12 py-md-3 pl-md-1 bd-content" role="main">
          
          <div class="col align-self-center col-sm-10  offset-md-1">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../home/inicio.blade.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastrar Categoria</li>
              </ol>
            </nav>
          </div>

              <!-- mensagens de alerta, ex: adicionado com sucesso, deletado com sucesso, etc -->
              <?php include_once('../../include/alertMsg.php');?>
              
              <form method="POST">
                <div class="row justify-content-md-center">
                  <div class="form-group col-sm-10">
                    <label class="font-weight-bold" for="NomeCategoria">Categoria</label>
                    <input type="text" class="form-control" name="NomeCategoria" placeholder="Insira o nome da Categoria"required autofocus>
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