<?php 
// CONEXÃO COM O BANCO
include_once('../../BD/config.php');

$condition	=	'';
if(isset($_REQUEST['Nome']) and $_REQUEST['Nome']!=""){
  $condition	.=	' AND Nome LIKE "%'.$_REQUEST['Nome'].'%" ';
}
if(isset($_REQUEST['Login']) and $_REQUEST['Login']!=""){
  $condition	.=	' AND Login LIKE "%'.$_REQUEST['Login'].'%" ';
}
if(isset($_REQUEST['Perfil']) and $_REQUEST['Perfil']!=""){
  $condition	.=	' AND Perfil LIKE "%'.$_REQUEST['Perfil'].'%" ';
}
$condition	.=	' AND Status = 1 ';
$userData	=	$db->getAllRecords('usuario','*',$condition,'ORDER BY idUsuario DESC');
?>
        
<!doctype html>
<html lang="pt-br">

  <?php include_once('../headers/head.blade.php'); ?>

  <body>

    <div class="container-fluid">
      <?php include_once('../headers/navbar.blade.php'); ?>
      <div class="row flex-xl-nowrap">
        
        <main class="col-12 col-md-12 col-xl-12 py-md-3 pl-md-1 bd-content" role="main">   
            <div class="col align-self-center col-sm-10  offset-md-1">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../home/inicio.blade.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Relatório de Usuários</li>
                  </ol>
                </nav>
              </div>

              
          <div class="card border-light align-self-center col-sm-10  offset-md-1">
            <div class="card-body">

              <?php include_once('../../include/alertMsg.php');?>

              <div class="card-title">
                <!-------- Barra de pesquisa -------->
                <form method="get">
                  <div class="row">
                    <div class="form-group col-sm-5">
                      <label for="Nome">Nome</label>
                      <input type="text" name="Nome" id="Nome" class="form-control" value="<?php echo isset($_REQUEST['Nome'])?$_REQUEST['Nome']:''?>" placeholder="Entra Nome">
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="Login">Login</label>
                      <input type="text" name="Login" id="Login" class="form-control" value="<?php echo isset($_REQUEST['Login'])?$_REQUEST['Login']:''?>" placeholder="Entra Login">
                    </div>
                    <div class="form-group col-sm-3">
                      <label for="Perfil">Perfil</label>
                      <input type="text" name="Perfil" id="Perfil" class="form-control" value="<?php echo isset($_REQUEST['Perfil'])?$_REQUEST['Perfil']:''?>" placeholder="Entra Perfil">
                    </div>
                  </div>
                  <div class="row">
                    <button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Pesquisar</button>
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger offset-md-1"><i class="fa fa-times"></i> Limpar</a>
                  </div>   
                </form>
              </div>
              
              <!-------- Tabela -------->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Qtde</th>
                    <th scope="col">Nome do Usuário</th>
                    <th scope="col">Login</th>
                    <th scope="col">Perfil</th>
                    <?php
                    //caso esteja logado e seja operador...
                      if( !empty($_SESSION['Login']) && $_SESSION['Perfil']=="Operador" ){ 
                    ?>
                    <th scope="col" class="text-center">Menu</th>
                    <?php
                      }
                    ?>  
                  </tr>
                </thead>
                <tbody>
                  
                  <?php 
                  if(count($userData)>0){
                    $s	=	'';
                    foreach($userData as $val){
                      $s++;
                  ?>
                  
                  <tr>
                    <td><?php echo $s;?></td>
                    <td><?php echo $val['Nome'];?></td>
                    <td><?php echo $val['Login'];?></td>
                    <td><?php echo $val['Perfil'];?></td>
                    <?php
                    //caso esteja logado e seja operador...
                      if( !empty($_SESSION['Login']) && $_SESSION['Perfil']=="Operador" ){ 
                    ?>
                    <td align="center">
                      <a href="../editar/usuario.blade.php?editId=<?php echo $val['idUsuario'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | 
                      <a href="../deletar/usuario.php?delId=<?php echo $val['idUsuario'];?>" class="text-danger" onClick="return confirm('Tem certeza que deseja excluir?');"><i class="fa fa-fw fa-trash"></i> Deletar</a>
                    </td>
                    <?php
                      }
                    ?>
                  </tr>
                  
                  <?php 
                    }
                  }else{
                  ?>
                  
                  <tr><td colspan="3" align="center">No Record(s) Found!</td></tr>
                  
                  <?php 
                  }
                  ?>
                
                </tbody>
              </table>
            </div>
          </div>            
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>