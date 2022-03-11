<?php 
// CONEXÃO COM O BANCO
include_once('../../BD/config.php');

$condition	=	'';
$NomeCategoriaCont= -1; //neutro
if(isset($_REQUEST['Nome']) and $_REQUEST['Nome']!=""){
  $condition	.=	' AND Nome LIKE "%'.$_REQUEST['Nome'].'%" ';
}

##################################################################
//chave estrangeira, então necessita de tratamento diferenciado...

/*
esse bloco é para a pesquisa.
como é tabela diferente e usa-se chave estrangeira, se feito da mesma forma que o nome,
teria que pesquisar o id da categoria, mas isso não e viável, portanto, há um primeiro
select para achar o nome da categoria na tabela, e depois é buscado na cliente com o id correspondente
*/
if(isset($_REQUEST['NomeCategoria']) and $_REQUEST['NomeCategoria']!=""){
  $condition5='';
  $condition5	.=	' AND NomeCategoria LIKE "%'.$_REQUEST['NomeCategoria'].'%" ';
  $userData5	=	$db->getAllRecords('categoria','*',$condition5,'ORDER BY idCategoria DESC');
  
  //se retornar algum valor do select...
  if(count($userData5)>0){ 
    $contador=0;
    //para cada valor encontrado...
    foreach($userData5 as $valMod){ 
      //primeira vez, primeiro resultado da pesquisa
      if($contador == 0) 
      {
        $condition	.=	' AND Cliente_idCategoria LIKE '.$valMod['idCategoria'].' ';
        $condition	.=	' AND Status = 1 ';
        $contador++;
      }else{
        $condition	.=	' OR Cliente_idCategoria LIKE '.$valMod['idCategoria'].' ';
        $NomeCategoriaCont=1; //tem pelo menos 1 resultado confirmado.
      }
    }
  }else{
    $NomeCategoriaCont=0; //veio nada
  }
}

$condition	.=	' AND Status = 1 ';
$userData	=	$db->getAllRecords('cliente','*',$condition,'ORDER BY idCliente DESC');
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
                    <li class="breadcrumb-item active" aria-current="page">Relatório de clientes</li>
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
                    <div class="form-group col-sm-7">
                      <label for="Nome">Cliente</label>
                      <input type="text" name="Nome" id="Nome" class="form-control" value="<?php echo isset($_REQUEST['Nome'])?$_REQUEST['Nome']:''?>" placeholder="Entra cliente">
                    </div>
                    <div class="form-group col-sm-5">
                      <label for="NomeCategoria">Categoria</label>
                      <input type="text" name="NomeCategoria" id="NomeCategoria" class="form-control" value="<?php echo isset($_REQUEST['NomeCategoria'])?$_REQUEST['NomeCategoria']:''?>" placeholder="Entra categoria">
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
                    <th scope="col">Nome do cliente</th>
                    <th scope="col">Categoria</th>
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
                    $userdataCateg	=	$db->getAllRecords2('categoria',' idCategoria, NomeCategoria ','idCategoria ='.$val['Cliente_idCategoria'].' ');
                    foreach($userdataCateg as $val2){}
                      $s++;
                  ?>
                  
                  <tr>
                    <td><?php echo $s;?></td>
                    <td><?php echo $val['Nome'];?></td>
                    <?php
                      if($val2['NomeCategoria']=="Prêmio"){
                        $CorTexto="text-warning";
                      }elseif($val2['NomeCategoria']=="Grátis"){
                        $CorTexto="text-success";
                      }elseif($val2['NomeCategoria']=="Normal"){
                        $CorTexto="text-primary";
                      }else{
                        $CorTexto="text-dark";
                      }
                    ?>

                    <td class="<?php echo $CorTexto; ?>"><?php echo $val2['NomeCategoria'];?></td>
                    
                    <?php
                    //caso esteja logado e seja operador...
                      if( !empty($_SESSION['Login']) && $_SESSION['Perfil']=="Operador" ){ 
                    ?>
                    <td align="center">
                      <a href="../editar/cliente.blade.php?editId=<?php echo $val['idCliente'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | 
                      <a href="../deletar/cliente.php?delId=<?php echo $val['idCliente'];?>" class="text-danger" onClick="return confirm('Tem certeza que deseja excluir?');"><i class="fa fa-fw fa-trash"></i> Deletar</a>
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