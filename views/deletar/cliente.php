<?php 
// CONEXÃO COM O BANCO
include_once('../../BD/config.php');

//caso não esteja logado ou não seja operador...
if( empty($_SESSION['Login']) || $_SESSION['Perfil']!="Operador" )
header("Location: ../sessao/accessdenied.blade.php");

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$data	=	array(
    	// Status 1 são valores não "deletados" pelo usuario
		'Status'=>0,
	);
	$update	=	$db->update('cliente',$data,array('idCliente'=>$_REQUEST['delId']));
	// mensagem deletado
	header('location: ../visualizar/cliente.blade.php?msg=rdel');
	exit;
}
?>