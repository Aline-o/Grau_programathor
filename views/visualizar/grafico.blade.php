<?php

// CONEXÃO COM O BANCO
include_once('../../BD/config.php');

$condition	=	'';

$condition	.=	' AND Status = 1 ';
$userData	=	$db->getAllRecords('cliente','*',$condition,'ORDER BY idCliente DESC');

?>

<!DOCTYPE html>
<html>
  <?php include_once('../headers/head.blade.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

    <?php include_once('../headers/navbar.blade.php'); ?>
    <div class="col align-self-center col-sm-10  offset-md-1">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../home/inicio.blade.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gráfico Clientes por Categoria</li>
          </ol>
        </nav>
      </div>

    <?php 
    $Premio=0;
    $Gratis=0;
    $Normal=0;
    if(count($userData)>0){
      $s	=	'';
      foreach($userData as $val){
      $userdataCateg	=	$db->getAllRecords2('categoria',' idCategoria, NomeCategoria ','idCategoria ='.$val['Cliente_idCategoria'].' ');
      foreach($userdataCateg as $val2){
            
      }
        $s++;

        if($val2['NomeCategoria']=="Prêmio"){
        $Premio++;
        }elseif($val2['NomeCategoria']=="Grátis"){
        $Gratis++;
        }elseif($val2['NomeCategoria']=="Normal"){
        $Normal++;
        }
    ?>

    <?php
        
    }
    }
    ?>
    

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Prêmio", "Grátis", "Normal"];

var yValues = [<?php echo $Premio;?>, <?php echo $Gratis; ?>, <?php echo $Normal; ?>];
var barColors = [
  "#f0ad4e",
  "#5cb85c",
  "#0275d8",
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "QTDE de Clientes por Categoria"
    }
  }
});
</script>

</body>
</html>
