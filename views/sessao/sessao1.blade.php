<?php

session_start();

?>

<!doctype html>
<html lang="en">
  <?php include_once('../headers/head.blade.php'); ?>

  <body>


    <div class="container-fluid">
     
        <div class="tab-content">
          <?php include_once('../headers/navbar.blade.php'); ?>

          <div id="cadSerie" class="container tab-pane active"><br>
          <div class="mx-auto" style="width: 600px;">

            <div class="card border-light center" >


              <?php
              if( empty($_SESSION['Login']) ){ //caso não esteja logado
              ?>
                
              <h4 class="card-header text-center">VC NAO ESTA LOGADO</h4>

              <?php

              }else{ //caso esteja logado
                if($_SESSION['Perfil_idPerfil']==1) //se for perfil de adm...
                {
                ?>
                
              <h4 class="card-header text-center">VC ESTA LOGADO, <?php echo $_SESSION['Login']; ?> </h4>

              <?php
                }else{ //se nao for adm...
					        header("location: accessdenied.blade.php");

              ?>

              <h4 class="card-header text-center">VC NAO TEM PERMISSAO DE ACESSO, <?php echo $_SESSION['Login']; ?></h4>
              <p> A senha q coloquei eh 
                
                <?php 
                  
                  $senhaaa = '1k';
                  $dado['senha'] = password_hash($senhaaa, PASSWORD_DEFAULT);
                  echo '  ';
                  echo $senhaaa ;
                  ?>

 e ela criptografada ficou como 
 
                <?php
                  echo '  ';
                  echo $dado['senha'];
                  ?>
                
                </p>

              <?php
                }
              }
              ?>
              
              
              
              <div class="card-body text-center">                
                <div class="card-title">Ainda estamos trabalhando nesta página! </div>
                <div class="col-sm-12">
                  <p>Clique <a href="login.blade.php">aqui</a> para logar.</p>
                </div>
              </div>
              </div>
            </div>
          </div>

        </div>
     
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