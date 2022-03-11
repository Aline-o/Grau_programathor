<?php 
// CONEXÃO COM O BANCO
include_once('../../BD/config.php');

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
  extract($_REQUEST);
  if($Nome==""){
    // mensagem de campo obrigatorio
    header('location:'.$_SERVER['PHP_SELF'].'?msg=robr');
    exit;
  }if($Cliente_idCategoria==""){
    // mensagem de campo obrigatorio
    header('location:'.$_SERVER['PHP_SELF'].'?msg=robr');
    exit;
  }else{
    $userCount	=	$db->getQueryCount('cliente','idCliente');
    // colunas da tabela
    $data	=	array(
      'Nome'=> $Nome, //colunas   
      'Cliente_idCategoria'=> $Cliente_idCategoria, //colunas   
    );
    $insert	=	$db->insert('cliente',$data);
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
                <li class="breadcrumb-item"><a href="../home/inicio.blade.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastrar Cliente</li>
              </ol>
            </nav>
          </div>

              <!-- mensagens de alerta, ex: adicionado com sucesso, deletado com sucesso, etc -->
              <?php include_once('../../include/alertMsg.php');?>
              
              <form method="POST">
                <div class="row justify-content-md-center">
                  <div class="form-group col-sm-10">
                    <label class="font-weight-bold" for="Nome">Nome do cliente</label>
                    <input type="text" class="form-control" name="Nome" placeholder="Insira seu nome completo"required autofocus>
                  </div>

                  <div class="form-group col-sm-10">
                    <label for="Cliente_idCategoria">Categoria</label>
                    <select class="form-control" name="Cliente_idCategoria" id="Cliente_idCategoria" required>
                      <option selected disabled value="">Escolha uma opção...</option>

                      <?php 
                      $condition	=	'';
                      if(isset($_REQUEST['NomeCategoria']) and $_REQUEST['NomeCategoria']!=""){
                        $condition	.=	' AND NomeCategoria LIKE "%'.$_REQUEST['NomeCategoria'].'%" ';
                      }
                      if(isset($_REQUEST['idCategoria']) and $_REQUEST['idCategoria']!=""){
                        $condition	.=	' AND idCategoria LIKE "%'.$_REQUEST['idCategoria'].'%" ';
                      }
                      // Status 1 para valores não "deletados" pelo usuario
                      $condition	.=	' AND Status = 1 ';
                      $userData	=	$db->getAllRecords('categoria','*', $condition,'ORDER BY idCategoria DESC');
                    
                      if(count($userData)>0){
                        $s	=	'';
                        foreach($userData as $val){
                          $s++;
                      ?>
                      
                      <option value="<?php echo (int)$val['idCategoria'];?>"> <?php echo $val['NomeCategoria'];?> </option>
                      
                      <?php 
                        }
                      }
                      ?>

                    </select>
                  
                  </div>
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