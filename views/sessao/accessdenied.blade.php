<!doctype html>
<html lang="en">
  <?php include_once('../headers/head.blade.php'); ?>
  
  <body>

    <div class="container-fluid">
     
        <div class="tab-content">
          <?php include_once('../headers/navbar.blade.php'); ?>

          <div id="cadSerie" class="container tab-pane active"><br>
          <div class="mx-auto" style="width: 600px;">

            <div class="card border-danger center" >
              <h4 class="card-header text-danger text-center">ACESSO NEGADO!</h4>
              <div class="card-body text-danger text-center">                
                <div class="card-title">Você não tem permissão para acessar essa página!</div>
                <div class="col-sm-12">
                  <p class="text-secondary">Clique <a href="login.blade.php">aqui</a> para voltar.</p>
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