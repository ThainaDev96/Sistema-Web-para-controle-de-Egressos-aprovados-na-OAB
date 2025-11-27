<?php
//Verifica se o usuário está logado
//Se não estiver vai para login.php
//Se sim carrega a página normalmente 
session_start();
if (empty($_SESSION["valida"])) { 
    header("Location: login.php");
    exit;
}

?>
