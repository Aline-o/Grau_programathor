<?php

session_start();
unset( $_SESSION['idUsuario'], 
$_SESSION['Senha'], 
$_SESSION['Login'], 
$_SESSION['Status'],
$_SESSION['Perfil']
);

//deslogado com sucesso
header('location: login.blade.php?msg=ldes');